<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"E:\phpstudy\WWW\project\public/../application/backend\view\article_cate\catelist.html";i:1515131514;s:77:"E:\phpstudy\WWW\project\public/../application/backend\view\public\header.html";i:1514900796;s:77:"E:\phpstudy\WWW\project\public/../application/backend\view\public\footer.html";i:1514968053;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章分类 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"  class="btn-refresh"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<style type="text/css">
    .table .text-left{
        text-align: left!important;
    }
</style>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a title="添加一级分类" href="javascript:;" onclick="edit('添加一级分类','cateadd.html','1','600','350')"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加一级分类</a></span> <!-- <span class="r">共有数据：<strong>54</strong> 条</span> --> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="9">分类列表</th>
            </tr>
            <tr class="text-c">
                <th width="150">分类名</th>
                <th width="150">排序</th>
                <th width="150">状态</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $vo): ?>
            <tr class="text-c text-hidden-<?php echo $vo['id']; ?> ">
                <td class="text-left"><?php echo $vo['title']; ?></td>
                <td><?php echo $vo['ord']; ?></td>
                <td><span class="label <?php echo $vo['status']==1?'label-success':'label-default'; ?>  radius"><?php echo $vo['status']==1?'已启用' : '已禁用'; ?></span></td>
                <td>
                   <a href="javascript:;" onclick="edit('添加下级分类','cateadd.html?pid=<?php echo $vo['id']; ?>','1','600','350')"  style="text-decoration:none;" class="btn btn-primary-outline radius size-S"  >添加分类</a>
                   &nbsp;<a href="javascript:;" onclick="edit('修改分类','cateadd.html?id=<?php echo $vo['id']; ?>','1','600','350')"  style="text-decoration:none;" class="btn btn-success-outline radius size-S" >修改</a>
                   &nbsp;<a title="删除" href="javascript:;" onclick="del(this,<?php echo $vo['id']; ?>)"  style="text-decoration:none" class="btn btn-danger-outline radius size-S" > 删除</a>
                </td>
            </tr>
            <?php  if(isset($vo['son'])){  foreach($vo['son'] as $vson): ?>
            <tr class="text-c text-hidden-<?php echo $vo['id']; ?>">
                <td class="text-left">|——<?php echo $vson['title']; ?></td>
                <td><?php echo $vson['ord']; ?></td>
                <td><span class="label <?php echo $vson['status']==1?'label-success':'label-default'; ?>  radius"><?php echo $vson['status']==1?'已启用' : '已禁用'; ?></span></td>
                <td>
                   <a href="javascript:;" onclick="edit('添加下级分类','cateadd.html?pid=<?php echo $vson['id']; ?>','1','600','350')"  style="text-decoration:none;" class="btn btn-primary-outline radius size-S">添加分类</a>&nbsp;<a href="javascript:;" onclick="edit('修改分类','cateadd.html?id=<?php echo $vson['id']; ?>','1','600','350')"  style="text-decoration:none;" class="btn btn-success-outline radius size-S">修改</a>&nbsp;<a title="删除" href="javascript:;" onclick="del(this,<?php echo $vson['id']; ?>)"  style="text-decoration:none" class="btn btn-danger-outline radius size-S">删除</a>
                </td>
            </tr>
                <?php  if(isset($vson['son'])){  foreach($vson['son'] as $pson): ?>
                <tr class="text-c text-hidden-<?php echo $vo['id']; ?>">
                    <td class="text-left">|————<?php echo $pson['title']; ?></td>
                    <td><?php echo $pson['ord']; ?></td>
                    <td><span class="label <?php echo $pson['status']==1?'label-success':'label-default'; ?>  radius"><?php echo $pson['status']==1?'已启用' : '已禁用'; ?></span></td>
                    <td>
                       <a href="javascript:;" onclick="edit('修改分类','cateadd.html?id=<?php echo $pson['id']; ?>','1','600','350')"  style="text-decoration:none;" class="btn btn-success-outline radius size-S">修改</a>&nbsp;<a title="删除" href="javascript:;" onclick="del(this,<?php echo $pson['id']; ?>)"  style="text-decoration:none" class="btn btn-danger-outline radius size-S">删除</a>
                    </td>
                </tr>
                <?php endforeach;  } endforeach;  } endforeach; ?>
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

<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
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
            url:"<?php echo url('articleCate/cateDelete'); ?>",
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