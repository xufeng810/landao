<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\phpstudy\WWW\project\public/../application/index\view\rule\ruleadd.html";i:1514900796;s:75:"E:\phpstudy\WWW\project\public/../application/index\view\public\header.html";i:1514900796;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/html5.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/respond.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/h-ui/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/h-ui/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/h-ui/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>系统后台</title>
<style type="text/css">
	.rulecheck{
		display: none;
	}
	.desc-style{
		margin-top:5px;color:#8B8A8A;
	}
</style>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" action="" method="post" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>权限名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['title'])?$data['title']:''; ?>" placeholder="" id="title" name="title" >
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限路由：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['name'])?$data['name']:''; ?>" placeholder="" id="name" name="name" >
		</div>
	</div>
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="status" type="radio" id="sex-1"  value="1"  <?php if($data['status']=='1'): ?> checked <?php endif; ?> >
					<label for="sex-1">启用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="status" value="0"   <?php if($data['status']=='0'): ?>checked<?php endif; ?> >
					<label for="sex-2">禁用</label>
				</div>
				
			</div>
		</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>排序</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['ord'])?$data['ord']:''; ?>" placeholder="" id="ord" name="ord">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>菜单项</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['left_nav'])?$data['left_nav']:'0'; ?>" placeholder="默认为0" id="left_nav" name="left_nav">
		</div>
	</div>
	
	<div class="row cl">
		<input  type="hidden" name='id' value="<?php echo !empty($data['id'])?$data['id']:''; ?>" id='hidden-id'>
		<input  type="hidden" name='pid' value="<?php echo !empty($param['pid'])?$param['pid']:'0'; ?>" id='hidden-pid'>
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript">
$(function(){
	
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			// title:{
			// 	required:true,
			// },
			// name:{
			// 	required:true,
			// },
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$.ajax({  
                        type: 'post',  
                        url: "<?php echo url('rule/ruleAdd'); ?>", 
                        data:{
                        	id:$('#hidden-id').val(),
                        	pid:$('#hidden-pid').val(),
                            title:$('#title').val(),
                            name:$('#name').val(),
                           	ord:$('#ord').val(),
                           	left_nav:$('#left_nav').val(),
                           	status:$('input:radio[name="status"]:checked').val(),
                        },
                        success:function(data){
                            if(data.status==1){
                            	layer.msg(data.msg,{icon: 1,time:1000});
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.href="<?php echo url('rule/rule_list'); ?>";
								parent.layer.close(index);
                            }else{
                            	layer.msg(data.msg,{icon: 2,time:1000});
                            }
                            
                        }   
                    }); 
                    return false; // 阻止表单自动提交事件


		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>