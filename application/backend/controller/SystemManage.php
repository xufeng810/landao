<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\backend\model\LoginLog;
class SystemManage  extends Common
{      

    //ip白名单列表界面
    public function ipWhiteList(){
        $param=input('param.');
        if(isset($param['ip']) && !empty($param['ip'])){
            $where['ip']=$param['ip'];
            $data=IpWhitelist::all($where);
        }else{
            $data=IpWhitelist::all();
        }
        $this->assign('param',$param);
        $this->assign('data',$data);
        $this->assign('breadcrumb',['0'=>'IP白名单列表']);
        return  $this->fetch();
    }
    //添加ip白名单
    public function ipWhiteAdd(){
        if(Request::instance()->isPost()===true){
            $data=$this->dataAction();
            $ipmodel=new IpWhitelist;
            if(empty($data['id'])){
                if($ipmodel->allowField(true)->validate(true)->save($data)) {
                    return ['status'=>1,'msg'=>'信息提交成功'];
               }else{
                   return ['status'=>2,'msg'=>$ipmodel->getError()];
               }
            }else{
                if($ipmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                    return ['status'=>1,'msg'=>'信息修改成功'];
                }else{
                   return ['status'=>2,'msg'=>$ipmodel->getError()];
                }
            }
        }
        return  $this->fetch();
    }
    //删除ip白名单
    public function ipWhiteDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
        $ress=$this->delete('ip_whitelist');
        return $ress;
       }
    }
    //登录日志显示
    public function loginloglist(){
        $admin_name=Request::instance()->get('admin_name');
        $where='';
        if(!empty($admin_name)){
            $this->assign('admin_name',$admin_name);
            $where['au.admin_name']=array('like',"%$admin_name%");
        }
        $data=Db::name('login_log')->alias('log')
            ->join('admin_user au','log.admin_id=au.id','LEFT')
            ->field('log.*,au.admin_name')
            ->where($where)
            ->order('log.id DESC')
            ->paginate(30,false, ['query' => request()->param()]);
        $this->assign('data',$data);
        $this->assign('breadcrumb',['0'=>'登录日志记录']);
        return  $this->fetch();
    }
    //民族列表
    public function minzu(){
        $data=Db::name('minzu')->select();
        $this->assign('data',$data);
        $this->assign('breadcrumb',['0'=>'民族列表']);
        return  $this->fetch();
    }
   
}
