<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"E:\phpstudy\WWW\project\public/../application/backend\view\rule\grouplist.html";i:1515057432;s:77:"E:\phpstudy\WWW\project\public/../application/backend\view\public\header.html";i:1514900796;s:77:"E:\phpstudy\WWW\project\public/../application/backend\view\public\footer.html";i:1514968053;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 权限控制 <span class="c-gray en">&gt;</span> 部门管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"  class="btn-refresh"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<style type="text/css">

</style>
<div class="page-container">
   <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a title="添加部门" href="<?php echo url('rule/groupAdd'); ?>"   class="btn btn-success radius"><i class="Hui-iconfont">&#xe600;</i> 添加部门</a></span> </div>
    <table class="table table-border table-bordered table-bg">
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="6">部门管理</th>
            </tr>
            <tr class="text-c">
                <th width="200">部门</th>
                <th width="200">描述</th>
                <th width="40">状态</th>
                <th width="70">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $vo): ?>
            <tr class="text-c text-hidden-<?php echo $vo['id']; ?> ">
                <td class="text-left"><?php echo $vo['group_name']; ?></td>
                <td><?php echo $vo['desc']; ?></td>
                <td><span class="label <?php echo $vo['status']==1?'label-success':'label-default'; ?>  radius"><?php echo $vo['status']==1?'已启用' : '已禁用'; ?></span></td>
                <td>
                  <a href="<?php echo url('rule/groupAdd',array('id'=>$vo['id'])); ?>"  style="text-decoration:none;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i </a>&nbsp;<a title="删除" href="javascript:;" onclick="del(this,<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<footer class="footer mt-20" style="">
	<div class="container">
		欢迎使用 <?php echo lang('backend_name'); ?>
	</div>
</footer>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/h-ui/js/H-ui.admin.js"></script> 


<script type="text/javascript">
/*
    参数解释：
    title   标题
    url     请求的url
    id      需要操作的数据id
    w       弹出层宽度（缺省调默认值）
    h       弹出层高度（缺省调默认值）
*/

/*删除*/
function del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax(
        {
            type:"POST",
            url:"<?php echo url('rule/groupDelete'); ?>",
            dataType:"json",
            data:{'id':id},
            success:function (msg)
            {
                if (msg.status==1)
                {   
                    $(obj).parents("tr").remove();
                    layer.msg(msg.msg,{icon:1,time:1000});
                }else
                {
                    layer.msg(msg.msg,{icon: 2,time:1000});
                }
            },
            error:function (jqXHR)
            {
                layer.msg(msg.msg,{icon: 2,time:1000});
            }
        })

        
    });
}

/*编辑*/
function edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}





</script>
</body>
</html>