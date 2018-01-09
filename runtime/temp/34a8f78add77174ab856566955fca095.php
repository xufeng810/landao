<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\phpstudy\WWW\project\public/../application/index\view\rule\groupadd.html";i:1514900796;s:75:"E:\phpstudy\WWW\project\public/../application/index\view\public\header.html";i:1514900796;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 权限控制 <span class="c-gray en">&gt;</span> 列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"  class="btn-refresh"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<article class="page-container" style="width:60%;">
    <form class="form form-horizontal" action="<?php echo url('rule/groupAdd'); ?>" method="post" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>部门名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
               <input type="text" class="input-text" value="<?php echo !empty($data['group_name'])?$data['group_name']:''; ?>" placeholder="" id="group_name" name="group_name" >
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">部门备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo !empty($data['desc'])?$data['desc']:''; ?>" placeholder="" id="desc" name="desc" >
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">操作权限：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php foreach($rulelist as $vo): ?>
                <dl class="permission-list">
                    <dt>
                        <label>
                            <input type="checkbox" value="<?php echo $vo['id']; ?>" name="rules[]" id="user-Character-0" <?php echo in_array($vo['id'],$data['rules'])?'checked':''; ?> >
                            <?php echo $vo['title']; ?></label>
                    </dt>
                     <?php  if(isset($vo['son'])){  foreach($vo['son'] as $vson): ?>
                    <dd>
                        <dl class="cl permission-list2">
                            <dt>
                                <label class="" style="color:#CD2626;">
                                    <input type="checkbox" value="<?php echo $vson['id']; ?>" name="rules[]" id="user-Character-0-1" <?php echo in_array($vson['id'],$data['rules'])?'checked':''; ?>>
                                    <?php echo $vson['title']; ?>
                                </label>
                            </dt>
                            <?php  if(isset($vson['son'])){  ?>
                            
                            <dd>
                                <?php foreach($vson['son'] as $pson): ?>
                                <label class="">
                                    <input type="checkbox" value="<?php echo $pson['id']; ?>" name="rules[]" id="user-Character-0-1-0" <?php echo in_array($pson['id'],$data['rules'])?'checked':''; ?>>
                                    <?php echo $pson['title']; ?>
                                </label>
                                <?php endforeach; ?>
                            </dd>
                             
                            <?php  } ?>
                            
                       
                        </dl>
                    </dd>
                    <?php endforeach;  } ?>
                </dl>
                <?php endforeach; ?>
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
    $(".permission-list dt input:checkbox").click(function(){
        $(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
    });
    $(".permission-list2 dd input:checkbox").click(function(){
        var l =$(this).parent().parent().find("input:checked").length;
        var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
        if($(this).prop("checked")){
            $(this).closest("dl").find("dt input:checkbox").prop("checked",true);
            $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
        }
        else{
            if(l==0){
                $(this).closest("dl").find("dt input:checkbox").prop("checked",false);
            }
            if(l2==0){
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
            }
        }
    });
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>