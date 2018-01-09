<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"E:\phpstudy\WWW\project\public/../application/backend\view\article_manage\articleadd.html";i:1515392650;s:83:"E:\phpstudy\WWW\project\public/../application/backend\view\public\header_layui.html";i:1514900796;s:81:"E:\phpstudy\WWW\project\public/../application/backend\view\public\breadcrumb.html";i:1514900796;}*/ ?>
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
<!--以下是在线编辑器 代码 -->
<script type="text/javascript">
    /*
   * 在线编辑器相 关配置 js 
   *  参考 地址 http://fex.baidu.com/ueditor/
   */
    window.UEDITOR_Admin_URL = "<?php echo ADMIN_STATIC; ?>/Ueditor/";
    var URL_upload = "";
    var URL_fileUp = "";
    var URL_scrawlUp = "";
    var URL_getRemoteImage = "";
    var URL_imageManager = "";
    var URL_imageUp = "";
    var URL_getMovie = "";
    var URL_home = "";
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo ADMIN_STATIC; ?>/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo ADMIN_STATIC; ?>/Ueditor/ueditor.all.min.js"> </script>
 <script type="text/javascript" charset="utf-8" src="<?php echo ADMIN_STATIC; ?>/Ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">  
  
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js  中
        var options = {
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 600, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign'
            , //允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true
         /*   autotypeset: {
                mergeEmptyline: true,        //合并空行
                removeClass: true,           //去掉冗余的class
                removeEmptyline: false,      //去掉空行
                textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
                imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
                pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
                clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
                clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
                removeEmptyNode: false,      //去掉空节点
                                             //可以去掉的标签
                removeTagNames: {"font": 1},
                indent: false,               // 行首缩进
                indentValue: '0em'           //行首缩进的大小
            }*/,
          toolbars: [
                   ['fullscreen', 'source', '|', 'undo', 'redo',
                       '|', 'bold', 'italic', 'underline', 'fontborder',
                       'strikethrough', 'superscript', 'subscript',
                       'removeformat', 'formatmatch', 'autotypeset',
                       'blockquote', 'pasteplain', '|', 'forecolor',
                       'backcolor', 'insertorderedlist',
                       'insertunorderedlist', 'selectall', 'cleardoc', '|',
                       'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                       'customstyle', 'paragraph', 'fontfamily', 'fontsize',
                       '|', 'directionalityltr', 'directionalityrtl',
                       'indent', '|', 'justifyleft', 'justifycenter',
                       'justifyright', 'justifyjustify', '|', 'touppercase',
                       'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
                       'imagenone', 'imageleft', 'imageright', 'imagecenter',
                       '|', 'insertimage', 'emotion', 'insertvideo',
                       'attachment', 'map', 'gmap', 'insertframe',
                       'insertcode', 'webapp', 'pagebreak', 'template',
                       'background', '|', 'horizontal', 'date', 'time',
                       'spechars', 'wordimage', '|',
                       'inserttable', 'deletetable',
                       'insertparagraphbeforetable', 'insertrow', 'deleterow',
                       'insertcol', 'deletecol', 'mergecells', 'mergeright',
                       'mergedown', 'splittocells', 'splittorows',
                       'splittocols', '|', 'print', 'preview', 'searchreplace']
               ]
        };
        editor = new UE.ui.Editor(options);
        editor.render("contents");  //  指定 textarea 的  id 为 goods_content

    }); 
</script>
<!--以上是在线编辑器 代码  end-->
<style type="text/css">
</style>
<div style="width:80%;margin-left: 80px;margin-top: 20px;margin-bottom: 100px;  ">
    <form class="layui-form" action="<?php echo url('articleManage/articleAdd'); ?>" style="" method='post' enctype="multipart/form-data">
      <div class="layui-form-item">
        <label class="layui-form-label">文章标题<span style="color:red;">*</span></label>
        <div class="layui-input-block">
          <input type="text" name="title" lay-verify="required|title"  placeholder="" class="layui-input" value="<?php echo !empty($data['title'])?$data['title']:''; ?>">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">关键字<span style="color:red;"></span></label>
        <div class="layui-input-block">
          <input type="text" name="key_words" lay-verify="key_words"  placeholder="" class="layui-input" value="<?php echo !empty($data['key_words'])?$data['key_words']:''; ?>">
        </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">摘 要</label>
        <div class="layui-input-block">
          <textarea placeholder="" class="layui-textarea" name="main" id="main"><?php echo !empty($data['main'])?$data['main']:''; ?></textarea>
        </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">主要内容<span style="color:red;">*</span></label>
        <div class="layui-input-block">
          <textarea  name="contents"  id="contents"><?php echo !empty($data['contents'])?$data['contents']:''; ?></textarea>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">文章分类<span style="color:red;">*</span></label>
        <div class="layui-input-block">
          <select name="arcate_id" id='selecttype'>
            <?php  if(isset($catlist)){  foreach($catlist as $v): ?>
              <!-- 第一层 -->
              <?php if($v['id'] == $data['arcate_id']): ?>
              <option value="<?php echo $v['id']; ?>" selected><?php echo $v['title']; ?></option>
              <?php else: ?>
              <option value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></option>
              <?php endif;  if(isset($v['son'])){  foreach($v['son'] as $vson): ?>
              <!-- 第二层 -->
              <?php if($vson['id'] == $data['arcate_id']): ?>
              <option value="<?php echo $vson['id']; ?>" selected>|—<?php echo $vson['title']; ?></option>
              <?php else: ?>
              <option value="<?php echo $vson['id']; ?>">|—<?php echo $vson['title']; ?></option>
              <?php endif;  if(isset($vson['son'])){  foreach($vson['son'] as $pson): ?>
               <!-- 第三层 -->
              <?php if($pson['id'] == $data['arcate_id']): ?>
              <option value="<?php echo $pson['id']; ?>" selected>|——<?php echo $pson['title']; ?></option>
              <?php else: ?>
              <option value="<?php echo $pson['id']; ?>">|——<?php echo $pson['title']; ?></option>
              <?php endif; endforeach;  } endforeach;  } endforeach;  } ?>
          </select>
        </div>
      </div>
     
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">作者</label>
          <div class="layui-input-inline">
            <input type="text" name="author" lay-verify="author" autocomplete="off" class="layui-input" value="<?php echo !empty($data['author'])?$data['author']:''; ?>">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">文章来源</label>
          <div class="layui-input-inline">
            <input type="text" name="from" lay-verify="url|from" autocomplete="off" class="layui-input" value="<?php echo !empty($data['from'])?$data['from']:''; ?>">
          </div>
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">上线开始</label>
          <div class="layui-input-inline">
            <input type="text" name="start_time" id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" value="<?php echo $data['start_time']?date('Y-m-d',$data['start_time']):'';?>">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">上线结束</label>
          <div class="layui-input-inline">
            <input type="text" name="end_time" id="date1" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" value="<?php echo $data['end_time']?date('Y-m-d',$data['end_time']-86400):'';?>">
          </div>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">文章状态</label>
        <div class="layui-input-block">
          <input name="status" value="1" title="提交"  type="radio" <?php if($data['status']=='1'): ?>checked<?php endif; ?>>
          <input name="status" value="2" title="发布" type="radio" <?php if($data['status']=='2'): ?>checked<?php endif; ?>>
          <input name="status" value="3" title="下线" type="radio" <?php if($data['status']=='3'): ?>checked<?php endif; ?> >
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">外链接<span style="color:red;"></span></label>
        <div class="layui-input-block">
         <input type="text" name="link" lay-verify="url|link"  class="layui-input" value="<?php echo !empty($data['link'])?$data['link']:''; ?>">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">排序<span style="color:red;"></span></label>
        <div class="layui-input-block">
         <input type="text" name="ord"  class="layui-input" value="<?php echo !empty($data['ord'])?$data['ord']:''; ?>">
        </div>
      </div>
      <div class="layui-form-item" style="text-align:center;">
        <div class="layui-input-block">
          <input type="hidden" name="id"   class="layui-input" value="<?php echo !empty($data['id'])?$data['id']:''; ?>">
          <button class="layui-btn" lay-submit="" lay-filter="demo">立即提交</button>
          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
      </div>
    </form>   
</div>

<script type="text/javascript">
  layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
   //创建一个编辑器
  var editIndex = layedit.build('LAY_demo_editor');
  //日期
  laydate.render({
    elem: '#date'
  });
  laydate.render({
    elem: '#date1'
  });
  //自定义验证规则
  form.verify({
      title: function(value){
      if(value.length > 252){
        return '标题应小于252个字符！';
        }
      }
      ,key_words: function(value){
      if(value.length > 252){
        return '关键字应小于252个字符！';
        }
      }
      ,from: function(value){
      if(value.length > 252){
        return '长度应小于252个字符！';
        }
      }
      ,link: function(value){
      if(value.length > 252){
        return '长度应小于252个字符！';
        }
      }
  });
  //监听提交
  form.on('submit(demo1)', function(data){
    var options=$("#selecttype option:selected");  //获取选中的项
    alert($('#LAY_demo_editor').val());
    $.ajax({
        type: 'post',  
        url: "<?php echo url('articleManage/articleAdd'); ?>", 
        data:{
          title:$('input[name="title"]').val(),
          key_words:$('input[name="key_words"]').val(),
          main:$('#main').val(),
          contents:$('#LAY_demo_editor').val(),
          author:$('input[name="author"]').val(),
          from:$('input[name="from"]').val(),
          start_time:$('input[name="start_time"]').val(),
          end_time:$('input[name="end_time"]').val(),
          link:$('input[name="link"]').val(),
          status:$('input:radio[name="status"]:checked').val(),
          arcate_id:options.val(),
        },
        success:function(data){
            if(data.status==1){
                layer.msg(data.msg,{icon: 1,time:1000});
                parent.layer.close(index);
            }else{
                layer.msg(data.msg,{icon: 2,time:1000});
            }               
        }   
    }); 
    return false;
  });
});
</script> 
</body>
</html>
