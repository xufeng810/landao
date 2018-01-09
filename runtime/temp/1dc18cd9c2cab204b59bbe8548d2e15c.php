<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"E:\phpstudy\WWW\project\public/../application/index\view\orde\orderlist.html";i:1514900795;s:75:"E:\phpstudy\WWW\project\public/../application/index\view\public\header.html";i:1514900796;s:75:"E:\phpstudy\WWW\project\public/../application/index\view\public\footer.html";i:1514900796;}*/ ?>
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
<script   type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/layer-layui/layui-v2.2/layui.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/layer-layui/layui-v2.2/css/layui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/pagelist.css" />
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 工单管理 <span class="c-gray en">&gt;</span> 我的工单 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"  class="btn-refresh"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container"><form action="<?php echo url('orde/orderList'); ?>" method="get" class="layui-form">
	<div class="text-c">
		<div class="layui-inline">
	      <div class="layui-input-inline" style="width:150px;">
	        <input type="text"  name="starttime"  class="layui-input" id="test1" placeholder="开始时间" value="<?php echo !empty($param['starttime'])?$param['starttime']:''; ?>">
	      </div>
	    </div>
	    <div class="layui-inline">
	      <div class="layui-input-inline" style="width:150px;">
	        <input type="text" name="endtime" class="layui-input" id="test2" placeholder="结束时间" value="<?php echo !empty($param['endtime'])?$param['endtime']:''; ?>">
	      </div>
	    </div>
	    <div class="layui-input-inline" style="width:100px;">
	      <select name="status" >
	        <option value="" <?php if($param['status']==''): ?>selected<?php endif; ?>>状态</option>
	        <option value="1" <?php if($param['status']==1): ?>selected<?php endif; ?>>未发货</option>
	        <option value="2" <?php if($param['status']==2): ?>selected<?php endif; ?>>已发货</option>
	       
	      </select>
	    </div>
	   

		<input type="text" class="input-text" style="width:130px;height:38px;" placeholder="输入<?php echo lang('name'); ?>" id="" name="name" value="<?php echo !empty($param['name'])?$param['name']:''; ?>">
		<input type="text" class="input-text" style="width:130px;height:38px;" placeholder="<?php echo lang('phone'); ?>" id="" name="phone" value="<?php echo !empty($param['phone'])?$param['phone']:''; ?>">
		<input type="text" class="input-text" style="width:150px;height:38px;" placeholder="<?php echo lang('address'); ?>" id="" name="address" value="<?php echo !empty($param['address'])?$param['address']:''; ?>">
		<button type="submit" class="btn btn-success" id="" name="" style="height:38px;"><i class="Hui-iconfont">&#xe665;</i> 搜 索</button>
	</div></form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="<?php echo url('orde/orderDown',array('starttime'=>&$param['starttime'],'endtime'=>&$param['endtime'],'status'=>&$param['status'],'name'=>&$param['name'],'phone'=>&$param['phone'],'address'=>&$param['address'])); ?>"  class='btn btn-warning radius <?php echo ruleCheck("index/Order/orderdown");?>' ><i class="Hui-iconfont">&#xe640;</i> 批量导出</a> <a href="javascript:;" onclick="datadown()" class='btn  btn-success radius <?php echo ruleCheck("index/Order/orderdown");?>' ><i class="Hui-iconfont">&#xe603;</i> 操 作</a>  <a title="添加<?php echo lang('gongdan'); ?>" href="javascript:;" onclick="decision_edit('添加工单','orderAdd.html','1','800','600')"  class='btn btn-primary radius <?php echo ruleCheck("index/Order/orderadd");  ?>'><i class="Hui-iconfont">&#xe600;</i> 添加<?php echo lang('gongdan'); ?></a> </span> <span class="r">共有数据：<strong><?php echo $data->totalshow(); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg ">
		<thead>
			<tr class="text-c">
				<th width=""><input type="checkbox" name="" value=""></th>
				<th width="">工单编号</th>
				<th width=""><?php echo lang('name'); ?></th>
				<th width=""><?php echo lang('phone'); ?></th>
				<th width=""><?php echo lang('address'); ?></th>
				<th width=""><?php echo lang('express'); ?></th>
				<th width=""><?php echo lang('express_sn'); ?></th>
				<th width=""><?php echo lang('status'); ?></th>
				<th width=""><?php echo lang('beizhu'); ?></th>
				<th width="">录入时间</th>
				<th width="">ICCID号</th>
				<th width="">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($data as $vo): ?>
			<tr class="text-c text-hidden-<?php echo $vo['id']; ?>">
				<td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
				<td><?php echo $vo['id']; ?></td>
				<td><?php echo $vo['name']; ?></td>
				<td><?php echo $vo['phone']; ?></td>
				<td><?php echo $vo['address']; ?></td>
				<td><?php echo $express[$vo['express']]; ?></td>
				<td><?php echo $vo['express_sn']; ?></td>
				<td>
					<?php if($vo['status']==1): ?>
					<span class="label label-default radius"  >
						<?php echo $ostatus[$vo['status']]; ?>
					</span>
					<?php elseif($vo['status']==2): ?>
					<span class="label label-primary radius">
						<?php echo $ostatus[$vo['status']]; ?>
					</span>
					<?php elseif($vo['status']==3): ?>
					<span class="label label-success radius"  >
						<?php echo $ostatus[$vo['status']]; ?>
					</span>
					<?php elseif($vo['status']==4): else: endif; ?>
				</td>
				<td><?php echo $vo['desc']; ?></td>
				<td><?php echo date("Y-m-d H:i:s",$vo['ctime']); ?></td>
				<td>
					<div class="layui-btn-group">
					<span class='<?php echo ruleCheck("index/Decision/decisionrule");?>'>

						<a class='layui-btn layui-btn-sm layui-btn-warm ' title="添加" href="javascript:;" style="text-decoration:none;" onclick="iccidadd('<?php echo $vo['name']; ?>',<?php echo $vo['id']; ?>)">
					    添加
					  </a>
					  </span>
					  <span class='<?php echo ruleCheck("index/Decision/decisiondata");?>'>
					  <a class='layui-btn layui-btn-sm ' title="查看"  style="text-decoration:none;" href="javascript:;"  onclick="iccidlist('<?php echo $vo['name']; ?>',<?php echo $vo['id']; ?>)">
					    查看
					  </a>
					</span>
					 </div>
				</td>
				<td>
					<div class="layui-btn-group">
						<span class='<?php echo ruleCheck("index/Order/orderadd");?>'>
					  <button class='layui-btn layui-btn-sm  layui-btn-normal' title="编辑<?php echo lang('gongdan'); ?>" onclick="decision_edit('编辑工单','orderadd.html?id=<?php echo $vo['id']; ?>','1','800','600')">
					    <i class="layui-icon">&#xe642;</i>
					  </button>
					  </span>
					  <span class='<?php echo ruleCheck("index/Order/orderDelete");  ?>'>
					  <button class='layui-btn layui-btn-sm layui-btn-danger ' onclick="del(this,'<?php echo $vo['id']; ?>');" title="删除<?php echo lang('gongdan'); ?>"  >
					    <i class="layui-icon">&#xe640;</i>
					  </button>
					  </span>
					</div>
					
				</td>
					
			</tr>
		<?php endforeach; ?>
		</tbody>

	</table>
	<div class="pagelist">
	<?php echo $data->render(); ?>
	</div>
</div>
<footer class="footer mt-20" style="">
	<div class="container">
		欢迎使用客户管理后台系统
	</div>
</footer>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/h-ui/js/H-ui.admin.js"></script> 


<script type="text/javascript">
	layui.use(['form', 'layedit', 'laydate'], function(){
	  var form = layui.form
	  ,layer = layui.layer
	  ,layedit = layui.layedit
	  ,laydate = layui.laydate;

	 //时间选择器
	  laydate.render({
	    elem: '#test1'
	    ,type: 'datetime'
	  });
	  laydate.render({
	    elem: '#test2'
	    ,type: 'datetime'
	  });

	})
//添加iccid
	function iccidadd(name,id){
      layer.open({
          title: name+'-添加ICCID号',
          maxmin: true,
          type: 2,
          content: ["iccidadd.html?id="+id,'no'],
          area: ['400px', '250px']
      });
  	}
//查看iccid
	function iccidlist(name,id){
      layer.open({
          title: '查看-'+name+'-ICCID号',
          maxmin: true,
          type: 2,
          content: ["iccidorder.html?id="+id,'no'],
          area: ['600px', '800px']
      });
  	}
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/

/*删除*/
function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax(
		{
			type:"POST",
			url:"<?php echo url('orde/orderDelete'); ?>",
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

/*管理员-编辑*/
function decision_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*禁用*/
function decision_stop(obj,id,status){
	if(status=='1'){
		var title='确认要禁用吗？';
	}else{
		var title='确认要启用吗？';
	}
	layer.confirm(title,function(index){
		$.ajax(
		{
			type:"POST",
			url:"<?php echo url('decision/decisionStatus'); ?>",
			dataType:"json",
			data:{'id':id,'status':status},
			success:function (msg)
			{
				if (msg.status==200)
				{	
					if(status==1){
						$(".td-manage-"+msg.id).html('<button onClick="decision_stop(this,'+msg.id+',0)" href="javascript:;" title="启用" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon">&#xe605;</i></button>');

						$(".td-status-"+msg.id).html('<span class="label label-default radius">已禁用</span>');
					}else{
						$(".td-manage-"+msg.id).html('<button onClick="decision_stop(this,'+msg.id+',1)" href="javascript:;" title="禁用" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon">&#x1006;</i></button>');

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
/*批量导出*/
function datadown(){
    var aa = document.getElementsByName("id");//声明变量，只为所有name属性为sn的项
    var ss = "";
    for (var i = 0; i < aa.length; i++) {
         if (aa[i].checked) {
            ss += aa[i].value+",";
         }
    }

	if(ss){
		
			//此处请求后台程序，下方是成功后的前台处理……
			$.ajax(
			{
				type:"GET",
				url:"<?php echo url('orde/orderDown'); ?>",
				dataType:"json",
				data:{'allid':ss},
				success:function (msg)
				{
					if (msg.status==1)
					{	
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
		
	}else{
		layer.msg('未选择数据',{icon: 2,time:1000});
	}
	
}


</script>
</body>
</html>