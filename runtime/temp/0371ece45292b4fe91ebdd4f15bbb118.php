<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"E:\phpstudy\WWW\project\public/../application/index\view\system_manage\loginloglist.html";i:1514900797;s:81:"E:\phpstudy\WWW\project\public/../application/index\view\public\header_layui.html";i:1514900796;s:79:"E:\phpstudy\WWW\project\public/../application/index\view\public\breadcrumb.html";i:1514900796;}*/ ?>
﻿<!DOCTYPE html>
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

<style type="text/css">
.breadcrumb {
    background-color: #f5f5f5;
    padding: 0 20px;
}
.breadcrumb {
    border-bottom: 1px solid #e5e5e5;
    line-height: 39px;
    height: 39px;
    overflow: hidden;
    padding: 0 15px;
}
.breadcrumb .btn-color {
    color: #fff;
    background-color: #5eb95e;
    border-color: #5eb95e;
    float: right;
    margin-top: 5px;
}
</style>
<nav class="breadcrumb">
  <span class="layui-breadcrumb" lay-separator=">">
  <a href="#" ><i class="layui-icon " style="font-weight: 600;margin-right: 3px;">&#xe68e;</i>首页</a>
  <a><cite><?php echo $breadcrumb['0']; ?></cite></a>
  </span>
  <a href="javascript:location.replace(location.href);" class="layui-btn layui-btn-normal  layui-btn-sm btn-color" title="刷新"><i class="layui-icon" style="">&#x1002;</i></a>
</nav>
<style type="text/css">
  .demotable{
    text-align:left;
  }
  .layui-table th{
    text-align: center!important;
  }
  .layui-table tbody{
    text-align: center!important;
  }
</style>
<div style="width:98%;margin:0 auto;margin-top: 20px; ">
    <div class="demotable">
      <form action="<?php echo url('SystemManage/loginloglist'); ?>" method="get" >
        <div class="layui-input-inline">
            <input type="text" name="admin_name" placeholder="输入账号" autocomplete="off" class="layui-input" value="<?php echo !empty($admin_name)?$admin_name:''; ?>" style="width:180px;">
        </div>
        <button class="layui-btn" data-type="reload">搜 索</button>
      
      </form>

    </div>
    <div class="layui-form">
      <table class="layui-table">
        <colgroup>
          <col width="50">
          <col width="200">
          <col width="150">
          <col width="100">
          <col>
        </colgroup>
        <thead>
          <tr>
            <th>ID</th>
            <th>管理员</th>
            <th>登录ip</th>
            <th>时间</th>
          </tr> 
        </thead>
        <tbody>
          <?php foreach($data as $v): ?>
          <tr>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['admin_name']; ?></td>
            <td><?php echo $v['ip']; ?></td>
            <td><?php echo date("Y-m-d H:i:s",$v['login_time']); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="pagelist">
      <?php echo $data->render(); ?>
    </div>
</div>
<script type="text/javascript">
//添加信息
function add(){
    layer.open({
        title: '添加白名单',
        maxmin: true,
        type: 2,
        content: ["ipWhiteAdd.html",'no'],
        area: ['450px', '260px']
    });
}
//删除信息
function del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax(
        {
            type:"POST",
            url:"<?php echo url('systemManage/ipWhiteDelete'); ?>",
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
</script> 
</body>
</html>
