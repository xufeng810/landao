<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\backend\model\AdminUser;
class AdminUsers  extends Common
{      

    //管理员列表界面
    public function adminList(){
        $data=AdminUser::all();
        $this->assign('data',$data);
        return  $this->fetch();
    }
    //管理员停用
    public function adminStatus(){
        $data=Request::instance()->post(); // 获取post变量
        $status=$data['status']==1?0:1;
        if($data['id']==140){
            return ['id'=>$data['id'],'txt'=>'禁止修改该管理员','status'=>2];
        }
        $ress= Db::name('admin_user')->where('id',$data['id'])->setField('status', $status);
        if($ress){
            return ['id'=>$data['id'],'txt'=>'操作成功！','status'=>200];
        }else{
            return ['id'=>$data['id'],'txt'=>'操作失败！','status'=>500];
        }
    }
    //添加和编辑管理员界面
    public function adminAdd(){
        if(Request::instance()->isPost()===true){
            $data=$this->dataAction();
            $pmodel=new AdminUser;
            $data['admin_password']=md5(md5($data['admin_password']));
            $data['password2']=md5(md5($data['password2']));
            if(empty($data['id'])){
                if ($pmodel->allowField(true)->validate(true)->save($data)) {
                    return ['status'=>1,'msg'=>'信息提交成功'];
               }else{
                   return ['status'=>2,'msg'=>$pmodel->getError()];
               }
            }else{
                if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                    return ['status'=>1,'msg'=>'信息修改成功'];
                }else{
                   return ['status'=>2,'msg'=>$pmodel->getError()];
                }
            }
           
        }
        $param=Request::instance()->get(); 
        if($param){
            $data= Db::name('admin_user')->where('id',$param['id'])->find();
        }else{
            $data['id']='';
            $data['status']=1;
            $data['sex']='2';
            $data['group_id']='';
        }
        $grouplist=Db::name('auth_group')->where(['status'=>1])->select();
        $this->assign('grouplist',$grouplist);
        $this->assign('data',$data);
        return  $this->fetch();
    }
    
    //删除管理员
     public function adminDelete(){
        if(Request::instance()->isPost()===true){
            $data=Request::instance()->post();
            $data= Db::name('article')->where('auid',$data['id'])->select();
            if(!empty($data)){
                return ['txt'=>'禁止删除！该员工已添加过文章！','status'=>2];
            }else{
                $ress=$this->delete('admin_user');
                return $ress;
            }
        }
    }
    //日志记录列表
    public function logList(){
        $admin_name=Request::instance()->get('admin_name'); // 获取查询条件
        $content=Request::instance()->get('content'); // 获取查询条件
        $where='';
        if(!empty($admin_name)){
            $this->assign('admin_name',$admin_name);
            $where['au.admin_name']=array('like',"%$admin_name%");
        }
        if(!empty($content)){
            $this->assign('content',$content);
            $where['log.content']=array('like',"%$content%");
        }
        $data=Db::name('entity_log')->alias('log')
            ->join('admin_user au','log.admin_id=au.id','LEFT')
            ->field('log.*,au.admin_name')
            ->where($where)
            ->order('log.id DESC')
            ->paginate(30,false, ['query' => request()->param()]);
        $this->assign('data',$data);
        $this->assign('breadcrumb',['0'=>'操作记录']);
        return  $this->fetch();
    }
    //员工管理列表
    public function staffList(){
        $data=Staff::all();
        $this->assign('data',$data);
        return  $this->fetch();
    }
    //编辑和添加员工
    public function staffAdd(){
      if(Request::instance()->isPost()===true){
          $ress=$this->staffAddAction();
            return $ress;
      }
      $param=input('param.');
      $data=[
        'sex'=>'男',
        'group_id'=>''
      ];
      $grouplist=Db::name('auth_group')->where(['status'=>1])->select();
      if(isset($param['id'])){
        $staff=Staff::get($param['id']);
        $data=$staff->toArray();
      }
      $this->assign('data',$data);
      $this->assign('grouplist',$grouplist);
      return  $this->fetch();
    }
    //删除员工
    public function staffDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
        $id=input('post.id');
        $rss=AdminUser::where('staff_id', $id)->value('id');
        if($rss){
            return ['msg'=>'删除失败，该员工绑定有管理员！','status'=>2];
        }
        $ress=$this->delete('staff');
        return $ress;
       }
    }
    //数据提交数据库处理
    protected function staffAddAction(){
        $data=$this->dataAction();
        $pmodel=new Staff;
        if(empty($data['id'])){
            if ($pmodel->allowField(true)->validate(true)->save($data)) {
                return ['status'=>1,'msg'=>'信息提交成功'];
           }else{
               return ['status'=>2,'msg'=>$pmodel->getError()];
           }
        }else{
            if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                $au=new AdminUser;
                $au->save(['group_id'=>$data['group_id']],['staff_id'=>$data['id']]);
                return ['status'=>1,'msg'=>'信息修改成功'];
            }else{
               return ['status'=>2,'msg'=>$pmodel->getError()];
            }
        }
    }
    




   /*这是test测试的页面程序111
    public function test(){
        return ['status'=>2,'msg'=>'信息修改成功'];
    }
    public function layer(){
        $param=input('get.');
        $this->assign('data',$param);
        return  $this->fetch();
    }
    public function layerlayer(){
        $data=Db::name('entity_log')->alias('log')
            ->join('admin_user au','log.admin_id=au.id','LEFT')
            ->field('log.*,au.admin_name')
            ->order('log.id DESC')
            ->paginate(30,false, ['query' => request()->param()]);
        $this->assign('data',$data);
        return  $this->fetch();
    }
    public function layerdel(){
        return ['status'=>1,'msg'=>'删除修改成功'];
    }
     **************/
}
