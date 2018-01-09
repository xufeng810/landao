<?php
namespace app\backend\controller;
use think\Controller;
use think\Session;
use think\Request;
use app\backend\model\AdminUser;
use app\backend\model\Order;
class Index extends Common
{   
    public function index()
    {	
    	$ausess=$this->ausess();
    	$this->assign('navlist',$ausess['navlist']);
        return $this->fetch();
    }
    //欢迎页的统计
     public function welcome()
    {  

        // $order=new Order();
        // $ausess=$this->ausess();
         $this->assign('breadcrumb',['0'=>'系统首页']);
        // $this->assign('udata',$order->ordercount());
        // $this->assign('rdata',$order->onecount($ausess['auid']));
        //var_dump($order->onecount($ausess['auid']));
        return $this->fetch();
    }
    //修改个人信息
    public function auinfo(){
        $ausess=$this->ausess();
        $auress=AdminUser::get($ausess['auid']);
        if(var_export(Request::instance()->isAjax(), true)==='true'){
            $staff=new AdminUser;
            $ress=$staff->save($this->dataAction(),['id'=>$ausess['auid']]);
            if($ress){
                return ['status'=>1,'msg'=>'信息修改成功'];
            }else{
                return ['status'=>0,'msg'=>'信息修改失败'];
            }
        }
        $this->assign('data',$auress);
        $this->assign('group',$auress->hasGroupone);
        return  $this->fetch();
    }
    //修改密码
    public function editpwd(){
        if(var_export(Request::instance()->isAjax(), true)==='true'){
            $au=new AdminUser;
            $ress=$au->pwdaction($this->dataAction(),$this->ausess());
            return $ress;
        }
        return  $this->fetch();
    }
}
