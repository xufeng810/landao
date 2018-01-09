<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\phpstudy\WWW\project\public/../application/index\view\orde\oiccidlist.html";i:1514900795;s:81:"E:\phpstudy\WWW\project\public/../application/index\view\public\header_layui.html";i:1514900796;s:79:"E:\phpstudy\WWW\project\public/../application/index\view\public\breadcrumb.html";i:1514900796;}*/ ?>
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
    text-align:center;
  }
  .layui-table th{
    text-align: center!important;
  }
  .layui-table tbody{
    text-align: center!important;
  }
  .layui-btn+.layui-btn {
    margin-left: 5px;
  }
</style>
<div style="width:98%;margin:0 auto;margin-top: 20px; ">
    <div class="demotable">
      <form action="<?php echo url('orde/oiccidList'); ?>" method="get" class="layui-form">
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
        <div class="layui-input-inline" style="width:110px;">
        <select name="status" >
          <option value="" <?php if($param['status']==''): ?>selected<?php endif; ?>>ICCID状态</option>
          <option value="1" <?php if($param['status']==1): ?>selected<?php endif; ?>>待收货</option>
          <option value="2" <?php if($param['status']==2): ?>selected<?php endif; ?>>已收货</option>
          <option value="3" <?php if($param['status']==3): ?>selected<?php endif; ?>>已充值</option>
        </select>
      </div>
        <div class="layui-input-inline">
            <input type="text" name="name" placeholder="客户姓名" autocomplete="off" class="layui-input" value="<?php echo !empty($param['name'])?$param['name']:''; ?>" style="width:130px;">
        </div>
        <div class="layui-input-inline">
            <input type="text" name="phone" placeholder="联系电话" autocomplete="off" class="layui-input" value="<?php echo !empty($param['phone'])?$param['phone']:''; ?>" style="width:130px;">
        </div>
        <div class="layui-input-inline">
            <input type="text" name="iccid" placeholder="ICCID号" autocomplete="off" class="layui-input" value="<?php echo !empty($param['iccid'])?$param['iccid']:''; ?>" style="width:130px;">
        </div>
        <button class="layui-btn" data-type="reload">搜 索</button>
        <!-- <span class='<?php echo ruleCheck("index/SystemManage/ipWhiteAdd");  ?>'>
          <a href="javascript:;" class="layui-btn layui-btn-normal" data-type="reload" onclick="add()"><i class="layui-icon">&#xe654;</i>添加白名单</a>
        </span> -->
      </form>
    </div>
    <div class="layui-form">

      <!-- <table class="layui-table" lay-even="" lay-skin="row">
        <colgroup>
          <col width="150">
          <col width="150">
          <col width="200">
          <col>
        </colgroup>
        <thead>
          <tr>
            <th>人物</th>
            <th>民族</th>
            <th>出场时间</th>
            <th>格言</th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <td>贤心</td>
            <td>汉族</td>
            <td>1989-10-14</td>
            <td>人生似修行</td>
          </tr>
        </tbody>
      </table>  --> 
      <table class="layui-table">
      
        <thead>
          <tr>
           
          <th width=""><?php echo lang('name'); ?></th>
          <th width=""><?php echo lang('phone'); ?></th>
          <th width=""><?php echo lang('address'); ?></th>
          <th width=""><?php echo lang('express'); ?></th>
         <!--  <th width="">快递状态</th> -->
        <th width=""><?php echo lang('express_sn'); ?></th>
        
        <th width="">ICCID号</th>
        
        <th width="">新手机号</th>
        <th width="">ICCID状态</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody>
          <?php  if(isset($data)){  foreach($data as $k=> $vo): ?>
          <tr data-index="<?php echo $k; ?>">
        
            <td><?php echo $vo['name']; ?></td>
        <td><?php echo $vo['phone']; ?></td>
        <td><?php echo $vo['address']; ?></td>
            <td><?php echo $express[$vo['express']]; ?></td>
           
        <td><?php echo $vo['express_sn']; ?></td>
        <td><?php echo $vo['iccid']; ?></td>
        
        <td><?php echo $vo['jh_phone']; ?></td>
        <td>
          
          <?php if($vo['status']==1): ?>
          <a href="javascript:;" onclick="iccidstatus(<?php echo $vo['id']; ?>)">
          <button class="layui-btn layui-btn-radius layui-btn-sm">
            <?php echo $iccstatus[$vo['status']]; ?>
          </button>
        </a>
          <?php elseif($vo['status']==2): ?>
          <a href="javascript:;" onclick="iccidstatus(<?php echo $vo['id']; ?>)">
          <button class="layui-btn layui-btn-normal layui-btn-radius layui-btn-sm"><?php echo $iccstatus[$vo['status']]; ?>
          </button>
          </a>
          <?php elseif($vo['status']==3): 
          $time=date('Y-m-d H:i:s',$vo['jh_time']);
          ?>
          <button class="layui-btn layui-btn-warm layui-btn-radius layui-btn-sm" onclick="alert('已充值 ! 充值时间：<?php echo $time; ?>');"><?php echo $iccstatus[$vo['status']]; ?>
          </button>
          <?php endif; ?>
          
        </td>
        
            <td>
             <!--  <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
              <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
              <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a> -->
              <div class="layui-btn-group">
                <span class='<?php echo ruleCheck("index/SystemManage/ipwhitedelete");  ?>'>
                <button class='layui-btn layui-btn-sm layui-btn-danger ' onclick="del(this,'<?php echo $vo['id']; ?>');" title="删除"  >
                  <i class="layui-icon">&#xe640;</i>
                </button>
                </span>
              </div>
            </td>
            </tr>
          <?php endforeach;  } ?>
        </tbody>
      </table>
      <div class="pagelist">
      共有数据：<strong><?php echo $data->totalshow(); ?></strong> 条 <?php echo $data->render(); ?>
  </div>
    </div>
</div>
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

//删除信息
function del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax(
        {
            type:"POST",
            url:"<?php echo url('orde/deliccidorder'); ?>",
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
//修改iccid状态
  function iccidstatus(id){
      layer.open({
          title: '修改ICCID状态',
          maxmin: true,
          type: 2,
          content: ["iccidstatus.html?id="+id,'no'],
          area: ['450px', '300px']
      });
    }
</script> 
</body>
</html>
