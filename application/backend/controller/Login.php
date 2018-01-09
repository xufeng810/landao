<?php
namespace app\backend\controller;
use think\Request;
use think\Controller;
use think\Db;
use think\Session;
use app\backend\model\AdminUser;
class Login  extends Controller
{
    public function index(){
      return  $this->fetch();
    }

    public function notfound(){
        return  $this->fetch();
    }
    //登录的处理
    public function dologin(){
  
      $postdata=Request::instance()->post(); // 获取post变量1
      if($postdata['pwdcount']<4){
        if(!$this->check_verify($postdata['yzm'])){
            return  ['status'=>0,'msg'=>'验证码不正确,请刷新验证码！'];
        };
      }
      $adminu=new AdminUser;
      $ress=$adminu->loginAction($postdata);
      return $ress;
    }
    //退出登录
  	public function loginout(){
      Session::delete('ausess');
      echo '<script>location.href="http://'.$_SERVER['HTTP_HOST'].'/backend/index/login";</script>';
            die;
    }
  	public function check_error(){
  		 return $this->error("没有权限",U('backend/index/welcome'),2);
  	}
    //验证码
    public function captcha(){
      $config =    [
        'fontSize'    =>    20,    
        'length'      =>    4,   
        'useNoise'    =>    true, 
        'useCurve'=>    false, 
        'imageH'=>40
      ];        
      $captcha = new \think\captcha\Captcha($config);
      return $captcha->entry();
    }
    //检验验证码
    public function check_verify($code, $id = ''){
        $captcha = new \think\captcha\Captcha();
        return $captcha->check($code, $id);
    }

    
}
