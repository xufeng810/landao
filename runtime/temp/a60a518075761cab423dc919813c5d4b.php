<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"E:\phpstudy\WWW\project\public/../application/backend\view\article_manage\articlelist.html";i:1515395180;s:83:"E:\phpstudy\WWW\project\public/../application/backend\view\public\header_layui.html";i:1514900796;s:81:"E:\phpstudy\WWW\project\public/../application/backend\view\public\breadcrumb.html";i:1514900796;}*/ ?>
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
  .layui-btn+.layui-btn {
    margin-left: 5px;
  }
</style>
<div style="width:98%;margin:0 auto;margin-top: 20px; ">
    <div class="demotable">
      <form action="<?php echo url('ArticleManage/articleList'); ?>" method="get" class="layui-form">
        <div class="layui-input-inline">
            <input type="text" name="title" placeholder="输入文章标题" autocomplete="off" class="layui-input" value="<?php echo !empty($data['param']['title'])?$data['param']['title']:''; ?>" style="width:180px;">
        </div>
        <div class="layui-input-inline">
            <input type="text" name="author" placeholder="作者" autocomplete="off" class="layui-input" value="<?php echo !empty($data['param']['author'])?$data['param']['author']:''; ?>" style="width:150px;">
        </div>
        <div class="layui-input-inline"  style="width:140px;">
            <select name="arcate_id">
              <option value="">文章分类</option>
              <?php  if(isset($catlist)){  foreach($catlist as $v): ?>
              <!-- 第一层 -->
              <?php if($v['id'] == $data['param']['arcate_id']): ?>
              <option value="<?php echo $v['id']; ?>" selected><?php echo $v['title']; ?></option>
              <?php else: ?>
              <option value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></option>
              <?php endif;  if(isset($v['son'])){  foreach($v['son'] as $vson): ?>
              <!-- 第二层 -->
              <?php if($vson['id'] == $data['param']['arcate_id']): ?>
              <option value="<?php echo $vson['id']; ?>" selected>|—<?php echo $vson['title']; ?></option>
              <?php else: ?>
              <option value="<?php echo $vson['id']; ?>">|—<?php echo $vson['title']; ?></option>
              <?php endif;  if(isset($vson['son'])){  foreach($vson['son'] as $pson): ?>
               <!-- 第三层 -->
              <?php if($pson['id'] == $data['param']['arcate_id']): ?>
              <option value="<?php echo $pson['id']; ?>" selected>|——<?php echo $pson['title']; ?></option>
              <?php else: ?>
              <option value="<?php echo $pson['id']; ?>">|——<?php echo $pson['title']; ?></option>
              <?php endif; endforeach;  } endforeach;  } endforeach;  } ?>
            </select>
        </div>
        <div class="layui-input-inline"  style="width:110px;">
            <select name="status">
              <option value="">文章状态</option>
              <?php  if(isset($data['art_status'])){  foreach($data['art_status'] as $k=>$v): if($k == $data['param']['status']): ?>
              <option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
              <?php else: ?>
              <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
              <?php endif; endforeach;  } ?>
            </select>
        </div>
        <button class="layui-btn " data-type="reload" style="background: #5FB878;">搜 索</button>
        <span class='<?php echo ruleCheck("index/articleManage/articleAdd");  ?>' style="float:right;">
          <a href="<?php echo url('articleManage/articleAdd'); ?>" class="layui-btn layui-bg-green" data-type="reload" ><i class="layui-icon">&#xe654;</i>添加文章</a>
        </span>
      </form>
    </div>
    <div class="layui-form">
      <table class="layui-table">
        <thead>
          <tr>
            <th>文章编号</th>
            <th>文章标题</th>
            <th>文章分类</th>
            <th>作者</th>
            <th>个性化设置</th>
            <th>上线日期</th>
            <th>创建时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody>
          <?php  if(isset($data['data'])){  foreach($data['data'] as $k=> $v): ?>
          <tr data-index="<?php echo $k; ?>">
            <td><?php echo $v->id; ?></td>
            <td>
              <?php echo substr($v->title,0,50); ?>
            </td>
            <td>
              <?php echo !empty($v->hasCateone->title)?$v->hasCateone->title:''; ?>
            </td>
            <td><?php echo $v->author; ?></td>
            <td>
              <span class="td-new-<?php echo $v->id; ?>"><button class="layui-btn <?php echo $v->is_new?'layui-bg-blue':'layui-btn-primary' ?>  layui-btn-sm layui-btn-radius" onclick="config(<?php echo $v->id; ?>,'is_new',<?php echo $v->is_new; ?>,'new','最新')">最新</button></span>
              <span class="td-hot-<?php echo $v->id; ?>">
              <button class="layui-btn <?php echo $v->is_hot?'layui-bg-blue':'layui-btn-primary' ?>  layui-btn-sm layui-btn-radius" onclick="config(<?php echo $v->id; ?>,'is_hot',<?php echo $v->is_hot; ?>,'hot','最热')">最热</button></span>
              <span class="td-best-<?php echo $v->id; ?>">
              <button class="layui-btn <?php echo $v->is_best?'layui-bg-blue':'layui-btn-primary' ?>  layui-btn-sm layui-btn-radius" onclick="config(<?php echo $v->id; ?>,'is_best',<?php echo $v->is_best; ?>,'best','最好')">最好</button></span>
            </td>
           
            <td><?php echo $v->start_time; ?> 至 <?php echo $v->end_time; ?></td>
            <td><?php echo $v->ctime; ?></td>
              <?php if($v->status==1): ?>
              <td>
              <?php elseif($v->status==2): ?>
              <td style="color:green;font-weight:600;">
              <?php elseif($v->status==3): ?>
              <td style="color:#E46B70;font-weight:600;">
              <?php endif; ?>
              <?php echo $data['art_status'][$v->status]; ?>
            </td>
            <td>
             <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
              <a class="layui-btn layui-btn-xs" lay-event="edit" href="<?php echo url('articleManage/articleAdd',array('id'=>$v->id)); ?>">编辑</a>
              <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del" onclick="del(this,<?php echo $v->id; ?>)">删除</a>
              
            </td>
            </tr>
          <?php endforeach;  } ?>
        </tbody>
      </table>
    </div>
</div>
<script type="text/javascript">
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  //日期
  laydate.render({
    elem: '#date'
  });
  laydate.render({
    elem: '#date1'
  });
  //自定义验证规则
  // form.verify({
  //   title: function(value){
  //     if(value.length < 5){
  //       return '标题至少得5个字符啊';
  //     }
  //   }
  //   ,pass: [/(.+){6,12}$/, '密码必须6到12位']
  //   ,content: function(value){
  //     layedit.sync(editIndex);
  //   }
  // });
  
  
  
  //监听提交
  // form.on('submit(demo1)', function(data){
  //   layer.alert(JSON.stringify(data.field), {
  //     title: '最终的提交信息'
  //   })
  //   return false;
  // });
});
function config(id,field,status,td,title){
 
  $.ajax(
  {
    type:"POST",
    url:"<?php echo url('articleManage/change'); ?>",
    dataType:"json",
    data:{id:id,field:field,status:status},
    success:function (msg)
    {
      if (msg.status==1)
      { 

        if(msg.field_status==1){
          $(".td-"+td+"-"+msg.id).html('<button class="layui-btn layui-bg-blue layui-btn-sm layui-btn-radius" onclick="config('+msg.id+',\''+msg.field+'\','+msg.field_status+',\''+td+'\',\''+title+'\')">'+title+'</button>');
        }else{
          $(".td-"+td+"-"+msg.id).html('<button class="layui-btn layui-btn-primary layui-btn-sm layui-btn-radius" onclick="config('+msg.id+',\''+msg.field+'\','+msg.field_status+',\''+td+'\',\''+title+'\')">'+title+'</button>');
        }
        

        //layer.msg(msg.msg,{icon:1,time:1000});

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
}


//删除信息
function del(obj,id){

    layer.confirm('确认要删除吗？',function(index){
        $.ajax(
        {
            type:"POST",
            url:"<?php echo url('articleManage/artDelete'); ?>",
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
