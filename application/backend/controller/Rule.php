<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Config;
use think\Request;
use app\backend\model\AuthRule;
use app\backend\model\AuthGroup;
class Rule  extends Common
{
   public function rule_list(){
        $data=Db::name('auth_rule')->order('ord')->select();
        $this->assign('data',generateTree($data));
        return  $this->fetch();
   }

   //添加和编辑权限页面
    public function ruleAdd(){
    	if(var_export(Request::instance()->isAjax(), true)==='true'){
    		$ress=$this->addAction();
    		return $ress;
    	}
    	$this->add('auth_rule',['status'=>1]);
    	return  $this->fetch();
    }

    //删除
    public function ruleDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $where['pid']=input('post.id');
          $id=Db::name('auth_rule')->where($where)->find();
          if($id){
            return ['msg'=>'删除失败，请先删除下级权限','status'=>2];
          }
          $ress=$this->delete('auth_rule');
          return $ress;
       }
    }

    public function groupList(){
        $data=Db::name('auth_group')->select();
        $this->assign('data',$data);
        return  $this->fetch();
    }
    //添加和修改部门组
    public function groupAdd(){
      if(Request::instance()->isPost()===true){
          $data=input('post.');
          if(isset($data['rules'])){
            $data['rules']=implode(",",$data['rules']);
          }
          $pmodel=new AuthGroup;
              if(empty($data['id'])){
                  if ($pmodel->allowField(true)->validate(true)->save($data)) {
                        $this->redirect('rule/groupList');
                   }else{
                       $this->error('添加失败！原因为：'.$pmodel->getError());
                   }
              }else{
                    if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                         $this->redirect('rule/groupList');
                    }else{
                       $this->error('修改失败！原因为：'.$pmodel->getError());
                    }
              }
      }
      $param=input('param.');
      $data=[
        'status'=>1,
        'rules'=>array(),
      ];
      if(isset($param['id'])){
        $authgroup=AuthGroup::get($param['id']);
        $data=$authgroup->toArray();
        $data['rules']=explode(',',$data['rules']);
      }
      $rulelist=Db::name('auth_rule')->order('ord')->select();
      $this->assign('rulelist',generateTree($rulelist));
      $this->assign('data',$data);
      return  $this->fetch();
    }
    //删除部门
    public function groupDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $where['group_id']=input('post.id');
          $id=Db::name('admin_user')->where($where)->find();
          if($id){
            return ['msg'=>'删除失败，部门下存在员工','status'=>2];
          }
          $ress=$this->delete('auth_group');
          return $ress;
       }
    }

    //数据提交数据库处理
    protected function addAction(){
        $data=$this->dataAction();
        $pmodel=new AuthRule;
        if(empty($data['id'])){
            if ($pmodel->allowField(true)->validate(true)->save($data)) {
                return ['status'=>1,'msg'=>'信息提交成功'];
           }else{
               return ['status'=>2,'msg'=>$pmodel->getError()];
           }
        }else{
            unset($data['pid']);
            if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                return ['status'=>1,'msg'=>'信息修改成功'];
            }else{
               return ['status'=>2,'msg'=>$pmodel->getError()];
            }
        }
    }

   
}
