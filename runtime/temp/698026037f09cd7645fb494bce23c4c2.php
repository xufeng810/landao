<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\phpstudy\WWW\project\public/../application/index\view\config\config.html";i:1514966194;s:81:"E:\phpstudy\WWW\project\public/../application/index\view\public\header_layui.html";i:1514900796;s:79:"E:\phpstudy\WWW\project\public/../application/index\view\public\breadcrumb.html";i:1514900796;}*/ ?>
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
 
</style>
<div style="width:98%;margin:0 auto;margin-top: 20px; ">
    <div class="layui-tab layui-tab-card">
      <ul class="layui-tab-title">
        <li class="layui-this">基本设置</li>
       <!--  <li>管理</li>
        <li>分配</li>
        <li>管理</li>
        <li>管理</li> -->
      </ul>
      <div class="layui-tab-content" style="height: 500px;">
        <div class="layui-tab-item layui-show" style="margin-top:10px;">
            <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label" style="font-size:16px;">刷新决策:</label>
                <div class="layui-input-block">
                   
                </div>
            </div>
            <div class="layui-form-item" style="font-size:16px;">
                <label class="layui-form-label">IP登录限制</label>
                <div class="layui-input-block">
                 
                </div>
            </div>
        </div>
        <!-- <div class="layui-tab-item">2</div>
        <div class="layui-tab-item">3</div>
        <div class="layui-tab-item">4</div>
        <div class="layui-tab-item">5</div>
        <div class="layui-tab-item">6</div> -->
      </div>
    </div>
</div>
<script type="text/javascript">
//刷新信息
function refresh(obj,id){
    layer.confirm('确认要刷新吗？',function(index){
        $.ajax(
        {
            type:"POST",
            url:"<?php echo url('config/refresh'); ?>",
            dataType:"json",
            success:function (msg)
            {
                if (msg.status==1)
                {   
                    layer.msg(msg.msg,{icon:1,time:1000});
                }else
                {
                    layer.msg(msg.msg,{icon: 5,time:1000});
                }
            },
            error:function (jqXHR)
            {
                layer.msg(msg.msg,{icon: 2,time:1000});
            }
        })
    });
}
//
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form;
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    var status=this.checked?1:2;
    $.ajax(
    {
        type:"POST",
        url:"<?php echo url('config/iplimit'); ?>",
        dataType:"json",
        data:{
          status:status
        },
        success:function (msg)
        {
            if (msg.status==1)
            {   
                if(status==1){
                    layer.msg('IP登录限制已开启！',{icon:1,time:1500});
                }else{
                    layer.msg('IP登录限制已关闭！',{icon:4,time:1500});
                }
                
            }else
            {
                layer.msg(msg.msg,{icon: 5,time:1000});
            }
        },
        error:function (jqXHR)
        {
            layer.msg(msg.msg,{icon: 2,time:1000});
        }
    })
  });
});
</script> 
</body>
</html>
