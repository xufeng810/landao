<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"E:\phpstudy\WWW\project\public/../application/backend\view\admin_users\adminlist.html";i:1515463689;s:77:"E:\phpstudy\WWW\project\public/../application/backend\view\public\header.html";i:1514900796;s:77:"E:\phpstudy\WWW\project\public/../application/backend\view\public\footer.html";i:1514968053;}*/ ?>
﻿<!DOCTYPE HTML>
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
<style type="text/css">
	.rulecheck{
		display: none;
	}
</style>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 员工管理 <span class="c-gray en">&gt;</span> 员工列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"  class="btn-refresh"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!-- <div class="text-c"> 日期范围：
		<input type="text" onfocus="" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div> -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><!-- <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius "><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> --> <a title="添加员工" href="javascript:;" onclick="admin_edit('添加员工','adminadd.html','1','800','550')"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加员工</a></span> <!-- <span class="r">共有数据：<strong>54</strong> 条</span> --> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="10">员工列表</th>
			</tr>
			<tr class="text-c">
				<!-- <th width="25"><input type="checkbox" name="" value=""></th> -->
				<th width="80">真实名称</th>
				<th width="80">账号</th>
				<th width="80">部门</th>
				<th width="100">邮箱</th>
				<th width="100">电话</th>
				<th width="100">注册时间</th>
				<th width="100">上次登录</th>
				<th width="50">是否锁定</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($data as $vo): ?>
			<tr class="text-c text-hidden-<?php echo $vo['id']; ?>">
				<td><?php echo $vo->real_name; ?></td>
				<td><?php echo $vo['admin_name']; ?></td>
				<td><?php echo $vo->hasGroupone->group_name; ?></td>
				<td><?php echo $vo->email; ?></td>
				<td><?php echo $vo->mobile; ?></td>
				<td><?php echo $vo['created_time']; ?></td>
				<td>
					<?php echo $vo['login_time']; ?>
				</td>
				<td class="td-status-<?php echo $vo['id']; ?>">
					<span class="label <?php echo !empty($vo['status'])?'label-success':'label-default'; ?>  radius"><?php echo !empty($vo['status'])?'已启用' : '已锁定'; ?></span>
				</td>
				<td>
					<span class='td-manage-<?php echo $vo['id']; ?> <?php echo ruleCheck("backend/AdminUsers/adminstatus");  ?>'>
					<?php if($vo['status']==1): ?> 
					<a style="text-decoration:none" onClick="admin_stop(this,<?php echo $vo['id']; ?>,<?php echo $vo['status']; ?>)" href="javascript:;" title="锁定"><i class="Hui-iconfont">&#xe631;</i></a> 
					<?php else: ?> 
					<a style="text-decoration:none" onClick="admin_stop(this,<?php echo $vo['id']; ?>,<?php echo $vo['status']; ?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a> 
					<?php endif; ?>
					</span>
					<?php if($vo['id']==140): else: ?> 
					<span class=' <?php echo ruleCheck("backend/AdminUsers/adminadd");  ?>'>
					<a title="编辑" href="javascript:;" onclick="admin_edit('编辑管理员','adminadd.html?id=<?php echo $vo['id']; ?>','1','800','550')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
					</span>
					<?php endif; ?>
					<span class=' <?php echo ruleCheck("backend/AdminUsers/admindelete");  ?>'>
					<a title="删除" href="javascript:;" onclick="admin_del(this,<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none"  ><i class="Hui-iconfont">&#xe6e2;</i></a>
					</span>
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

<script type="text/javascript" src="/public/static/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/public/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/

/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax(
		{
			type:"POST",
			url:"<?php echo url('adminUsers/adminDelete'); ?>",
			dataType:"json",
			data:{id:id},
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
				layer.msg('操作失败',{icon: 2,time:1000});
			}
		})

		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*管理员-停用*/
function admin_stop(obj,id,status){
	if(status==1){
		var title='确认要禁用吗？';
	}else{
		var title='确认要启用吗？';
	}
	layer.confirm(title,function(index){
		$.ajax(
		{
			type:"POST",
			url:"<?php echo url('adminUsers/adminStatus'); ?>",
			dataType:"json",
			data:{'id':id,'status':status},
			success:function (msg)
			{
				if (msg.status==200)
				{	
					if(status==1){
						$(".td-manage-"+msg.id).html('<a onClick="admin_stop(this,'+msg.id+',0)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
						$(".td-status-"+msg.id).html('<span class="label label-default radius">已禁用</span>');
					}else{
						$(".td-manage-"+msg.id).html('<a onClick="admin_stop(this,'+msg.id+',1)" href="javascript:;" title="禁用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');

						$(".td-status-"+msg.id).html('<span class="label label-success radius">已启用</span>');
					}
						layer.msg(msg.txt,{icon: 1,time:1000});
				}else
				{
					layer.msg(msg.txt,{icon: 2,time:1000});
				}
			},
			error:function (jqXHR)
			{
				layer.msg(msg.txt,{icon: 2,time:1000});
			}
		})
	});
}
/*批量删除管理员*/
function datadel(){
    var aa = document.getElementsByName("did");
    var ss = "";
    for (var i = 0; i < aa.length; i++) {
         if (aa[i].checked) {
            ss += aa[i].value+",";
         }
    }
	if(ss){
		layer.confirm('确认要删除吗？',function(index){
			//此处请求后台程序，下方是成功后的前台处理……
			$.ajax(
			{
				type:"POST",
				url:"<?php echo url('adminUsers/adminDelete'); ?>",
				dataType:"json",
				data:{'did':ss},
				success:function (msg)
				{
					if (msg.status==200)
					{	
						var s = msg.did;
						rs = s.split(",");// 在每个逗号(,)处进行分解。
						for (var i = 0; i < rs.length; i++) {
							$(".text-hidden-"+rs[i]).remove();    
					    }
						layer.msg(msg.txt,{icon:1,time:1000});
					}else
					{	
						layer.msg(msg.txt,{icon: 2,time:1000});
					}
				},
				error:function (jqXHR)
				{
					layer.msg(msg.txt,{icon: 2,time:1000});
				}
			})
		});
	}else{
		layer.msg('未选择数据',{icon: 2,time:1000});
	}
	
}


</script>
</body>
</html>