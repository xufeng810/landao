<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\phpstudy\WWW\project\public/../application/index\view\index\auinfo.html";i:1514900793;s:81:"E:\phpstudy\WWW\project\public/../application/index\view\public\header_layui.html";i:1514900796;}*/ ?>
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
      <label class="layui-form-label">部门<span style="color:red;">*</span></label>
      <div class="layui-input-block">
        <input type="text"   class="layui-input" value="<?php echo !empty($group['group_name'])?$group['group_name']:'未定义'; ?>" disabled>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">姓名<span style="color:red;">*</span></label>
      <div class="layui-input-block">
        <input type="text"   class="layui-input" value="<?php echo !empty($data['real_name'])?$data['real_name']:'未定义'; ?>" disabled>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">电话</label>
      <div class="layui-input-block">
        <input type="text" name="mobile" lay-verify="required|phone" autocomplete="on"  class="layui-input" value="<?php echo !empty($data['mobile'])?$data['mobile']:''; ?>">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">邮箱</label>
      <div class="layui-input-block">
        <input type="text" name="email" lay-verify="required|email" autocomplete="on"  class="layui-input" value="<?php echo !empty($data['email'])?$data['email']:''; ?>">
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
  ,layedit = layui.layedit
  //监听提交
  form.on('submit(demo1)', function(data){
    //alert(JSON.stringify(data.field));
    $.ajax({
        type: 'post',  
        url: "<?php echo url('index/auinfo'); ?>", 
        data:{
          email:$('input[name="email"]').val(),
          mobile:$('input[name="mobile"]').val(),
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