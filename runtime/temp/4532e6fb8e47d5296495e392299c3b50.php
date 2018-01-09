<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\phpstudy\WWW\project\public/../application/backend\view\login\index.html";i:1514967041;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/html5.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/respond.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="<?php echo ADMIN_STATIC; ?>/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_STATIC; ?>/h-ui/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_STATIC; ?>/h-ui/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ADMIN_STATIC; ?>/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/layer/2.1/layer.js"></script>
<style type="text/css">
  .verify{
    display: none;
  }
</style>
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title><?php echo lang('backend_name'); ?>-登陆页面</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input  name="admin_name" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input  name="admin_password" type="password" placeholder="密码" class="input-text size-L" lay-verify="required">
        </div>
      </div>
      <div class="row cl verify"> 
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe63f;</i></label>
        <div class="formControls col-xs-8">
          <input  name="yzm" type="text" placeholder="验证码" class="input-text size-L" style="width:180px;">
          <img class="verify-image" src="<?php echo url('backend/login/captcha'); ?>" alt="验证码" title="点击换一张" onclick="this.src='<?php echo url('backend/login/captcha'); ?>?num='+Math.random()" id="verify-image"> 
        </div>
      </div>

      <div class="row cl">
       <!--  <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div> -->
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input type="hidden" name='pwdcount' value='5'>
          <input name="" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" onclick="login()">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 管理后台 by <?php echo lang('backend_name'); ?></div>
<script type="text/javascript">
   function login(){
      if($('input[name="admin_name"]').val()==''){
          layer.msg('账号不能为空！',{icon:3,time:1000});
          return false;
      }else if($('input[name="admin_password"]').val()==''){
          layer.msg('密码不能为空！',{icon:4,time:1000});
          return false;
      }

      $.ajax(
      {

        type:"POST",
        url:"<?php echo url('login/dologin'); ?>",
        dataType:"json",
        data:{
          admin_name:$('input[name="admin_name"]').val(),
          admin_password:$('input[name="admin_password"]').val(),
          yzm:$('input[name="yzm"]').val(),
          pwdcount:$('input[name="pwdcount"]').val(),
        },
        success:function (msg)
        {
          if (msg.status==1)
          { 
            layer.msg(msg.msg,{icon:1,time:1000});
            location.href="<?php echo url('index/index'); ?>";
          }else if(msg.status==2)
          {
            //alert(msg.count);
            if(msg.count<4){
              $('.verify').css('display','block');
            }
            $('input[name="pwdcount"]').val(msg.count),
            layer.msg(msg.msg,{icon: 2,time:1500});
          }else{
            layer.msg(msg.msg,{icon: 2,time:1500});
          }
        },
        error:function (jqXHR)
        {
          layer.msg('未知错误',{icon: 2,time:2000});
        }
      })
      return false;
    }
</script>
</body>

</html>
