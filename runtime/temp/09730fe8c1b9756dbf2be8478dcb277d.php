<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"E:\phpstudy\WWW\project\public/../application/index\view\admin_users\loglist.html";i:1514900793;s:81:"E:\phpstudy\WWW\project\public/../application/index\view\public\header_layui.html";i:1514900796;s:79:"E:\phpstudy\WWW\project\public/../application/index\view\public\breadcrumb.html";i:1514900796;}*/ ?>
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
.input-style{
    padding-left: 10px;
    height: 38px;
}
</style>


<div style="width:98%;margin:0 auto;margin-top: 20px; ">
  <div class="demoTable">
    <form action="<?php echo url('adminUsers/logList'); ?>" method="get" >
    <div class="layui-input-inline">
        <input type="text" name="admin_name" placeholder="输入用户" autocomplete="off" class="layui-input" value="<?php echo !empty($admin_name)?$admin_name:''; ?>" >
    </div>
    <div class="layui-input-inline">
        <input type="text" name="content" placeholder="查找内容" autocomplete="off" class="layui-input" value="<?php echo !empty($content)?$content:''; ?>">
    </div>
    <button class="layui-btn" data-type="reload">搜索</button>
    </form>
  </div>
  <!-- 这是演示开始 -->
  <!--  <form class="layui-form"  style="margin-top:50px;">
  <div class="layui-form-item">
    <label class="layui-form-label">单行输入框</label>
    <div class="layui-input-block">
      <input type="text" name="title" lay-verify="title" autocomplete="on" placeholder="请输入标题" class="layui-input">
    </div>
  </div>
  <input type="hidden" name="id" value="123">
 <div class="layui-form-item">
    <label class="layui-form-label">验证必填项</label>
    <div class="layui-input-block">
      <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">验证手机</label>
      <div class="layui-input-inline">
        <input type="tel" name="phone" lay-verify="required|phone" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">验证邮箱</label>
      <div class="layui-input-inline">
        <input type="text" name="email" lay-verify="required|email" autocomplete="off" class="layui-input">
      </div>
    </div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">多规则验证</label>
      <div class="layui-input-inline">
        <input type="text" name="number" lay-verify="required|number" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">验证日期</label>
      <div class="layui-input-inline">
        <input type="text" name="date" id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">验证链接</label>
      <div class="layui-input-inline">
        <input type="tel" name="url" lay-verify="url" autocomplete="off" class="layui-input">
      </div>
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">验证身份证</label>
    <div class="layui-input-block">
      <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">自定义验证</label>
    <div class="layui-input-inline">
      <input type="password" name="password" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">范围</label>
      <div class="layui-input-inline" style="width: 100px;">
        <input type="text" name="price_min" placeholder="￥" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-mid">-</div>
      <div class="layui-input-inline" style="width: 100px;">
        <input type="text" name="price_max" placeholder="￥" autocomplete="off" class="layui-input">
      </div>
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">单行选择框</label>
    <div class="layui-input-block">
      <select name="interest" lay-filter="aihao">
        <option value=""></option>
        <option value="0">写作</option>
        <option value="1" selected="">阅读</option>
        <option value="2">游戏</option>
        <option value="3">音乐</option>
        <option value="4">旅行</option>
      </select>
    </div>
  </div>
  
  
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">分组选择框</label>
      <div class="layui-input-inline">
        <select name="quiz">
          <option value="">请选择问题</option>
          <optgroup label="城市记忆">
            <option value="你工作的第一个城市">你工作的第一个城市</option>
          </optgroup>
          <optgroup label="学生时代">
            <option value="你的工号">你的工号</option>
            <option value="你最喜欢的老师">你最喜欢的老师</option>
          </optgroup>
        </select>
      </div>
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">搜索选择框</label>
      <div class="layui-input-inline">
        <select name="modules" lay-verify="required" lay-search="">
          <option value="">直接选择或搜索选择</option>
          <option value="1">layer</option>
          <option value="2">form</option>
          <option value="3">layim</option>
          <option value="4">element</option>
          <option value="5">laytpl</option>
          <option value="6">upload</option>
          <option value="7">laydate</option>
          <option value="8">laypage</option>
          <option value="9">flow</option>
          <option value="10">util</option>
          <option value="11">code</option>
          <option value="12">tree</option>
          <option value="13">layedit</option>
          <option value="14">nav</option>
          <option value="15">tab</option>
          <option value="16">table</option>
          <option value="17">select</option>
          <option value="18">checkbox</option>
          <option value="19">switch</option>
          <option value="20">radio</option>
        </select>
      </div>
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">联动选择框</label>
    <div class="layui-input-inline">
      <select name="quiz1">
        <option value="">请选择省</option>
        <option value="浙江" selected="">浙江省</option>
        <option value="你的工号">江西省</option>
        <option value="你最喜欢的老师">福建省</option>
      </select>
    </div>
    <div class="layui-input-inline">
      <select name="quiz2">
        <option value="">请选择市</option>
        <option value="杭州">杭州</option>
        <option value="宁波" disabled="">宁波</option>
        <option value="温州">温州</option>
        <option value="温州">台州</option>
        <option value="温州">绍兴</option>
      </select>
    </div>
    <div class="layui-input-inline">
      <select name="quiz3">
        <option value="">请选择县/区</option>
        <option value="西湖区">西湖区</option>
        <option value="余杭区">余杭区</option>
        <option value="拱墅区">临安市</option>
      </select>
    </div>
    <div class="layui-form-mid layui-word-aux">此处只是演示联动排版，并未做联动交互</div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">复选框</label>
    <div class="layui-input-block">
      <input type="checkbox" name="like[write]" title="写作">
      <input type="checkbox" name="like[read]" title="阅读" checked="">
      <input type="checkbox" name="like[game]" title="游戏">
    </div>
  </div>
  
  <div class="layui-form-item" pane="">
    <label class="layui-form-label">原始复选框</label>
    <div class="layui-input-block">
      <input type="checkbox" name="like1[write]" lay-skin="primary" title="写作" checked="">
      <input type="checkbox" name="like1[read]" lay-skin="primary" title="阅读">
      <input type="checkbox" name="like1[game]" lay-skin="primary" title="游戏" disabled="">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">开关-默认关</label>
    <div class="layui-input-block">
      <input type="checkbox" name="close" lay-skin="switch" lay-text="ON|OFF">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">开关-默认开</label>
    <div class="layui-input-block">
      <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">单选框</label>
    <div class="layui-input-block">
      <input type="radio" name="sex" value="男" title="男" checked="">
      <input type="radio" name="sex" value="女" title="女">
      <input type="radio" name="sex" value="禁" title="禁用" disabled="">
    </div>
  </div>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">普通文本域</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
  </div> 
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">编辑器</label>
    <div class="layui-input-block">
      <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
  </form>-->
  <!-- 这是演示结束 -->
<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="150">
      <col width="200">
      <col width="150">
      <col width="150">
      <col width="30">
      <col>
    </colgroup>
    <thead>
      <tr>
        <th>操作人</th>
        <th>内容</th>
        <th>操作ip</th>
        <th>时间</th>
        <!-- <th>操作</th> -->
      </tr> 
    </thead>
    <tbody>
      <?php foreach($data as $v): ?>
      <tr>
        <td><?php echo $v['admin_name']; ?></td>
        <td><?php echo $v['content']; ?></td>
        <td><?php echo $v['ip']; ?></td>
        <td><?php echo date("Y-m-d H:i:s",$v['created_t']); ?></td>
        <!-- <td><button class="layui-btn layui-btn-sm" onclick="dd(<?php echo $v['id']; ?>,'<?php echo $v['admin_name']; ?>')"><i class="layui-icon">&#xe642;</i></button><button class="layui-btn layui-btn-sm" onclick="ff(<?php echo $v['id']; ?>,'<?php echo $v['admin_name']; ?>')"><i class="layui-icon">&#xe642;</i></button></td> -->
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div class="pagelist">
  <?php echo $data->render(); ?>
</div>

<script>
// layui.use(['form', 'layedit', 'laydate'], function(){
//   var form = layui.form
//   ,layer = layui.layer
//   ,layedit = layui.layedit
//   ,laydate = layui.laydate;
  
//   //日期
//   laydate.render({
//     elem: '#date'
//   });
//   laydate.render({
//     elem: '#date1'
//   });
  
//   //创建一个编辑器
//   var editIndex = layedit.build('LAY_demo_editor');
 
//   //自定义验证规则
//   form.verify({
//     title: function(value){
//       if(value.length < 5){
//         return '标题至少得5个字符啊';
//       }
//     }
//     ,pass: [/(.+){6,12}$/, '密码必须6到12位']
//     ,content: function(value){
//       layedit.sync(editIndex);
//     }
//   });
  
//   //监听指定开关
//   form.on('switch(switchTest)', function(data){
//     layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
//       offset: '6px'
//     });
//     layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
//   });
  
//   //监听提交
//   form.on('submit(demo1)', function(data){
//     //alert(JSON.stringify(data.field));
//     $.ajax({
//         type: 'post',  
//         url: "<?php echo url('adminUsers/test'); ?>", 
//         data:JSON.stringify(data.field),
//         success:function(data){
//             if(data.status==1){
//                 layer.msg(data.msg,{icon: 1,time:1000});
//                 //location.href="<?php echo url('adminUsers/adminlist'); ?>";
//             }else{
//                 layer.msg(data.msg,{icon: 2,time:1000});
//             }               
//         }   
//     }); 
//     return false;
//   });
  
// });
// //弹窗
//   function dd(id,name){
//       layer.open({
//           title: 'YouTube',
//           maxmin: true,
//           type: 2,
//           content: ["layer.html?id="+id+"&name="+name,'no'],
//           area: ['800px', '800px']
//       });
//   }
//   //弹窗
//   function ff(id,name){
//       layer.open({
//           title: '这是弹窗',
//           maxmin: true,
//           type: 2,
//           content: ["layerlayer.html",'no'],
//           area: ['800px', '800px']
//       });
//   }
</script>
 
</body>
</html>
