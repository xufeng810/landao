<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"E:\phpstudy\WWW\project\public/../application/backend\view\index\editpwd.html";i:1514900794;s:83:"E:\phpstudy\WWW\project\public/../application/backend\view\public\header_layui.html";i:1514900796;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>系统后台</title>
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/layer-layui/layui-v2.2/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/pagelist.css" />
	<script   type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/layer-layui/layui-v2.2/layui.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/layer/2.1/layer.js"></script>
</head>
<script>
layui.use('element', function(){
});
</script>
<style type="text/css">
    .rulecheck{
        display: none;
    }
</style>
<body>

<form class="layui-form"  style="margin-top:50px;width:400px;">

    <div class="layui-form-item">
      <label class="layui-form-label">原密码<span style="color:red;">*</span></label>
      <div class="layui-input-block">
        <input type="password" name="admin_password" lay-verify="required"   class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">新密码<span style="color:red;">*</span></label>
      <div class="layui-input-block">
        <input type="password" name="pass" lay-verify="required|pass" placeholder="" autocomplete="off" class="layui-input" id="pass">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">确认密码<span style="color:red;">*</span></label>
      <div class="layui-input-block">
        <input type="password" name="repass" lay-verify="required|repass"   class="layui-input" id="repass">
      </div>
    </div>
    <div class="layui-form-item" style="text-align:center;">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit="" lay-filter="demo1">保 存</button>
      </div>
    </div>
</form>
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit;
  //自定义验证规则
  form.verify({
    pass: [/(.+){6,12}$/, '密码必须6到12位']
    ,repass: function(value){
      var repassvalue = $('#pass').val();
      if(value != repassvalue){
        return '两次输入的密码不一致!';
      }
    }
  });
  //监听提交
  form.on('submit(demo1)', function(data){
    //alert(JSON.stringify(data.field));
    $.ajax({
        type: 'post',  
        url: "<?php echo url('index/editpwd'); ?>", 
        data:{
          admin_password:$('input[name="admin_password"]').val(),
          pass:$('input[name="pass"]').val(),
          repass:$('input[name="repass"]').val(),
        },
        success:function(data){
            if(data.status==1){
                alert(data.msg);
                var index = parent.layer.getFrameIndex(window.name);
                parent.layer.close(index);
            }else{
                layer.msg(data.msg,{icon: 2,time:1000});
            }               
        }   
    }); 
    return false;
  });
});

</script>