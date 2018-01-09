<?php
namespace app\backend\controller;
use think\Request;
use think\Controller;
use think\Db;
use think\Session;
use app\backend\model\AdminUser;
class Common   extends Controller
{
    public function _initialize(){
        parent::_initialize(); 
        $ausess=$this->ausess();
        $this->authCheck();
        if(empty($ausess['auid'])){
            echo '<script>parent.location.href="http://'.$_SERVER['HTTP_HOST'].'/backend/login";</script>';
            die;
        }
    }
    public function writeLog($content){
        $ausess=$this->ausess();
        $data=array(
            'admin_id'=>$ausess['auid'],
            'content'=>$content,
            'created_t'=>time(),
            'ip'=>Request::instance()->ip()
        );
        Db::name('entity_log')->insert($data);
    }
    //数据提交处理移除空格
    public function dataAction(){
        $ress='';
        $data=input('post.');
        foreach ($data as $k => $v) {
            $ress[$k]=trim($v);
        }
        return $ress;
    }
    //数据新增或者编辑
    public function add($table,$data=null){

        $param=Request::instance()->param();
        if(isset($param['id'])){
            $data= Db::name($table)->where('id',$param['id'])->find();
        }
        $this->assign('param',$param);
        $this->assign('data',$data);
    }
    //ajax删除
    public function delete($table){
        $data=Request::instance()->post();
        if(!empty($data['did'])){
            $did=rtrim($data['did'],',');
            $ress=Db::name($table)->delete($did);
            if($ress){
                return ['did'=>$did,'msg'=>'删除成功！','status'=>1];
            }else{
                return ['msg'=>'删除失败！','status'=>2];
            }
        }else{
            $ress=Db::name($table)->delete($data['id']);
            if($ress){
                return ['msg'=>'删除成功！','status'=>1];
            }else{
                return ['msg'=>'删除失败！','status'=>2];
            }
        }
        return ['msg'=>'操作失败！','status'=>2];
    }
    protected function authCheck(){
        $ausess=$this->ausess();
        $request = Request::instance();
        $module=$request->module();
        $controller=$request->controller();
        $action=$request->action();
        $rulename=['name'=>"$module/$controller/$action"];
        $rule_ress=Db::name('auth_rule')->where($rulename)->find();
        if($rule_ress){
            if($rule_ress['status']==0){
                echo '<script>alert("权限被禁用！");location.href="'.url('backend/index/welcome').'"</script>';
            }
            $exit=in_array($rule_ress['id'], explode(',',$ausess['rules']));
            if(empty($exit)){
                echo '<script>alert("无权限访问！");location.href="'.url('backend/index/welcome').'"</script>';
            }
        }
    }
    protected function ausess(){
        return Session::get('ausess');
    }
    
}
