<?php
namespace app\backend\model;
use think\Model;
use think\Db;
use think\Session;
use think\Request;
use app\backend\model\AdminPwdcount;
class AdminUser extends Model
{   
	protected $type = array(
        'created_time' => 'timestamp:Y-m-d H:i:s',
        'login_time' => 'timestamp:Y-m-d H:i:s',
    );
    protected $insert = array(
       'created_time',

    );
    protected $update = array(
       'login_time',

    );
     protected function setcreatedTimeAttr()
    {
        return time();
    }
    protected function setloginTimeTAttr()
    {
        return time();
    }

   public function hasGroupone()
    {
        return $this->hasOne('AuthGroup','id','group_id')->field('group_name,rules');;
    }
    public function hasStaffone()
    {
        return $this->hasOne('Staff','id','staff_id');
    }
    
    public function pwdaction($data,$ausess){
        $adminu=new AdminUser;
        $auress=$adminu->where('id', $ausess['auid'])->find();
        if($auress['admin_password']!=md5(md5($data['admin_password']))){
            return ['status'=>0,'msg'=>'原密码错误！'];
        }
        if($data['pass']!=$data['repass']){
            return ['status'=>0,'msg'=>'两次输入的密码不一致！'];
        }
        $admin_password=md5(md5($data['repass']));
        if($adminu->save(['admin_password'=>$admin_password],['id'=>$ausess['auid']])){
            return ['status'=>1,'msg'=>'密码修改成功'];
        }else{
            return ['status'=>0,'msg'=>'密码修改失败'];
        }
    }
    //管理员登录的处理
    public function loginAction($postdata){
        //1.vip_droi管理员不验证ip
        //2.是否开启ip限制，非授权ip禁止登陆且邮件通知管理员
        $ip=Request::instance()->ip();
       
        //$ipress=$this->iplimit($ip,$postdata);
        // if($ipress){
        //     return ['status'=>0,'msg'=>"ip未授权，禁止登陆:$ip"];
        // }
        
        
        $ress= Db::name('admin_user')->where(['admin_name'=>$postdata['admin_name']])->find();
        if($ress){
            //账号被锁定提示
            if($ress['status']==0){
                return ['status'=>0,'msg'=>'账号被锁定，请联系管理员！'];
            }
            //密码错误
            if($ress['admin_password']!=md5(md5($postdata['admin_password']))){
                //密码错误次数处理
                $pwdstatus=$this->pwdcount($ip,$postdata['admin_name']);
                if($pwdstatus['status']=='off'){
                    return ['status'=>0,'msg'=>'登陆账号错误次数超过五次，账号被锁定！'];
                }elseif($pwdstatus['status']=='on'){
                    $msg='账号或密码错误！,剩余登陆次数 '.$pwdstatus['count'].'次';
                    return ['status'=>2,'msg'=>$msg,'count'=>$pwdstatus['count']];
                }
            }
            //处理session
            $this->ausess($ress['id']);
            $data['login_time']=time();
            $result=Db::name('admin_user')->where('id', $ress['id'])->update($data);
            if($result){
                //登陆日志
                $this->signinlog($ress['id']);
                AdminPwdcount::where('admin_name',$postdata['admin_name'])->delete();//删除错误登录次数信息
                return ['status'=>1,'msg'=>'登录成功！'];
            }else{
                return ['status'=>0,'msg'=>'登录失败！'];
            }
        }else{
            return ['status'=>0,'msg'=>'账号不存在！'];
        }
    }
    //ip登录设置
    public function iplimit($ip,$postdata){
        $redis = new \Redis();
        $rconfig=config('redis');
        $link=$redis->connect($rconfig['host'],$rconfig['port']);
        if($link){
            $redis->auth($rconfig['auth']);
            $iplimit=$redis->get('iplimit');
            if($iplimit==1){
                $ipress=Db::name('ip_whitelist')->where(['ip'=> $ip])->find();
                if(empty($ipress)){
                    $this->send($ip,$postdata,'尝试登陆后台');
                    return true;
                }
            }
            return false;
        }
        return false;
        
    }
    //登录session处理
    public function ausess($auid){
        $adminu=new AdminUser;
        $auress=$adminu->where('id', $auid)->find();
        $where['id']=array('in',$auress->hasGroupone->rules);
        $where['left_nav']=1;
        $nav=Db::name('auth_rule')->where($where)->order('ord')->field('id,pid,name,title,ord')->select();
        $navlist=generateTree($nav);
        $ausess=[
          'auid'=>$auress->id,
          'group_id'=>$auress->group_id,
          'admin_name'=>$auress->admin_name,
          'real_name'=>$auress->real_name,
          'group_name'=>$auress->hasGroupone->group_name,
          'rules'=>$auress->hasGroupone->rules,
          'navlist'=>$navlist
        ];
        Session::set('ausess',$ausess);
    }
    //非法登陆,发送邮件
    public function send($ip,$postdata,$type){
        $title="管理后台,非法操作通知！";
        $content="管理员，您好！在 ".date('Y-m-d H:i:s').",用户：".$postdata['admin_name'].", 使用非授权的ip:".$ip.",".$type." 请提高警惕！<br/>如允许该ip登陆后台，请登录后台设置：https://riskapi.yz314.com/s_admin/tt18youzhi";
        $stmp = config('smtp');
        send_email($stmp['recevier'],$title,$content);
    }
    
    //密码错误次数处理
    public function pwdcount($ip,$admin_name){
        $pwdress=AdminPwdcount::get(['admin_name' => $admin_name]);
        if($pwdress){
            if($pwdress['count_time']>4){
                $data['status']=0;
                Db::name('admin_user')->where('admin_name', $admin_name)->update($data);
                return ['status'=>'off'];
            }else{
                $pwdress->setInc('count_time',1);
                $count=5-$pwdress['count_time'];
                return ['count'=>$count,'status'=>'on'];
            }
        }else{
            AdminPwdcount::create([
                'login_ip'=>$ip,
                'admin_name' =>$admin_name,
                'count_time'=>1,
                'updated_t'=>time()
            ]);
            return ['count'=>4,'status'=>'on'];

        }
    }

    //登陆日志
    public function signinlog($auid,$content='登录后台操作！'){
        $data=array(
            'admin_id'=>$auid,
            'login_time'=>time(),
            'ip'=>Request::instance()->ip()
        );
        Db::name('login_log')->insert($data);
    }
}
 

