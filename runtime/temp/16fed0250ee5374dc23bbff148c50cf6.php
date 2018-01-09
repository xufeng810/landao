<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"E:\phpstudy\WWW\project\public/../application/backend\view\config_manage\index.html";i:1515461103;s:83:"E:\phpstudy\WWW\project\public/../application/backend\view\public\header_layui.html";i:1514900796;s:81:"E:\phpstudy\WWW\project\public/../application/backend\view\public\breadcrumb.html";i:1514900796;}*/ ?>
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
.desc-style{
    color:#B3B2B2;
    font-size:14px;
}
</style>
<div style="width:98%;margin:0 auto;margin-top: 20px; ">
    <div class="layui-tab layui-tab-card">
      <ul class="layui-tab-title">
        <li class="layui-this">网站信息</li>
        <li>短信设置</li>
        <li>邮件设置</li>
        <!-- <li>管理</li>
        <li>管理</li>  -->
      </ul>
      <div class="layui-tab-content" style="height: 1000px;width:50%;">
        <div class="layui-tab-item layui-show" style="margin-top:20px;">
            <form class="layui-form" action="<?php echo url('ConfigManage/index'); ?>" style="" method='post' enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label class="layui-form-label">网站名称<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="1" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['1'])?$data['1']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">网站名称，将显示在前台顶部欢迎信息等位置</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站备案号<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="2" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['2'])?$data['2']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">网站备案号，将显示在前台底部欢迎信息等位置</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站关键字<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="3" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['3'])?$data['3']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">网站关键字，便于SEO</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系人<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="4" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['4'])?$data['4']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">联系人</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系电话<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="5" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['5'])?$data['5']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">方便遇到问题时咨询</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系手机<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="6" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['6'])?$data['6']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">方便客户联系，短信提示</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">具体地址<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="7" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['7'])?$data['7']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">具体地址</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">客服QQ1<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="8" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['8'])?$data['8']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">方便用户遇到问题时咨询</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">客服QQ2<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="9" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['9'])?$data['9']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">方便用户遇到问题时咨询</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">客服QQ3<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="10" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['10'])?$data['10']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">方便用户遇到问题时咨询</label>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="">立即提交</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-tab-item">
            <form class="layui-form" action="<?php echo url('ConfigManage/index'); ?>" style="margin-top:20px;" method='post' enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label class="layui-form-label">短信平台<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="11" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['11'])?$data['11']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style"></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">短信账号<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="12" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['12'])?$data['12']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">短信平台配置appkey/keyid</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">短信密码<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="13" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['13'])?$data['13']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">短信平台配置secretKey</label>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="">立即提交</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-tab-item">
            <form class="layui-form" action="<?php echo url('ConfigManage/index'); ?>" style="margin-top:20px;" method='post' enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label class="layui-form-label">SMTP<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="14" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['14'])?$data['14']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">发送邮箱的smtp地址。如: smtp.gmail.com或smtp.qq.com</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">SMTP端口<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="15" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['15'])?$data['15']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">smtp的端口。默认为25。具体请参看各STMP服务商的设置说明 （如果使用Gmail，请将端口设为465）</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱账号<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="16" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['16'])?$data['16']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">使用发送邮件的邮箱账号</label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">授权码<span style="color:red;"></span></label>
                    <div class="layui-input-block">
                      <input type="text" name="17" lay-verify=""  placeholder="" class="layui-input" value="<?php echo !empty($data['17'])?$data['17']:''; ?>">
                    </div>
                    <label class="layui-form-label"></label>
                    <label class="lable-style desc-style">使用发送邮件的邮箱密码,或者授权码。具体请参看各STMP服务商的设置说明</label>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="">立即提交</button>
                      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class="layui-tab-item">3</div>
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
