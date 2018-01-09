<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"E:\phpstudy\WWW\project\public/../application/index\view\admin_users\adminadd.html";i:1514900793;s:75:"E:\phpstudy\WWW\project\public/../application/index\view\public\header.html";i:1514900796;}*/ ?>
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
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['real_name'])?$data['real_name']:''; ?>" placeholder="" id="real_name" name="real_name" >
		</div>
	</div>
	

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>登录账户：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['admin_name'])?$data['admin_name']:''; ?>" placeholder="" id="admin_name" name="admin_name" <?php echo !empty($data['id'])?'disabled':''; ?>>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="admin_password" name="admin_password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
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
					<label for="sex-2">锁定</label>
				</div>
				
			</div>
		</div>
		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电话：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['mobile'])?$data['mobile']:''; ?>" placeholder="" id="mobile" name="mobile" >
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo !empty($data['email'])?$data['email']:''; ?>" placeholder="" id="email" name="email" >
		</div>
	</div>
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1"  value="1"  <?php if($data['sex']=='1'): ?> checked <?php endif; ?> >
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="2"   <?php if($data['sex']=='2'): ?>checked<?php endif; ?> >
					<label for="sex-2">女</label>
				</div>
				
			</div>
		</div>
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">部门：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="group_id" id='selecttype'>
					<?php if(is_array($grouplist) || $grouplist instanceof \think\Collection || $grouplist instanceof \think\Paginator): if( count($grouplist)==0 ) : echo "" ;else: foreach($grouplist as $key=>$v): if($v['id'] == $data['group_id']): ?>
		              <option value="<?php echo $v['id']; ?>" selected><?php echo $v['group_name']; ?></option>  
		              <?php else: ?>
		              <option value="<?php echo $v['id']; ?>"><?php echo $v['group_name']; ?></option>
		              <?php endif; endforeach; endif; else: echo "" ;endif; ?>
					
				</select>
				</span> </div>
		</div>


	
	<div class="row cl">
		<input  type="hidden" name='id' value="<?php echo !empty($data['id'])?$data['id']:''; ?>" id='hidden-id'>
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
			admin_name:{
				required:true,
				minlength:4,
				maxlength:16
			},
			admin_password:{
				required:true,
				minlength:6,
				maxlength:16
			},
			password2:{
				required:true,
				equalTo: "#admin_password"
			},
			// sex:{
			// 	required:true,
			// },
			// phone:{
			// 	required:true,
			// 	isPhone:true,
			// },
			// email:{
			// 	required:true,
			// 	email:true,
			// },
			// adminRole:{
			// 	required:true,
			// },
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			var options=$("#selecttype option:selected");  //获取选中的项
			$.ajax({  
                        type: 'post',  
                        url: "<?php echo url('adminUsers/adminAdd'); ?>", 
                        data:{
                        	id:$('#hidden-id').val(),
                        	staff_id:options.val(),
                            admin_name:$('#admin_name').val(),
                            admin_password:$('#admin_password').val(),
                           	password2:$('#password2').val(),
                           	status:$('input:radio[name="status"]:checked').val(),
                           	group_id:options.val(),
                        	real_name:$('#real_name').val(),
                            mobile:$('#mobile').val(),
                            email:$('#email').val(),
                           	sex:$('input:radio[name="sex"]:checked').val(),
                        },
                        success:function(data){
                            if(data.status==1){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.href="<?php echo url('adminUsers/adminlist'); ?>";
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