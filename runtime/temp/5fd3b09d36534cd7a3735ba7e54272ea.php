<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\phpstudy\WWW\project\public/../application/index\view\index\index.html";i:1514965714;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="<?php echo ADMIN_STATIC; ?>/favicon.ico" >
<LINK rel="Shortcut Icon" href="<?php echo ADMIN_STATIC; ?>/favicon.ico" />
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
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title><?php echo lang('backend_name'); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href=""><?php echo lang('backend_name'); ?></a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="/public<?php echo ADMIN_STATIC; ?>/javascript:;">&#xe667;</a>
			<!-- <nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="/public<?php echo ADMIN_STATIC; ?>/javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="/public<?php echo ADMIN_STATIC; ?>/javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="/public<?php echo ADMIN_STATIC; ?>/javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="/public<?php echo ADMIN_STATIC; ?>/javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="/public<?php echo ADMIN_STATIC; ?>/javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
						</ul>
					</li>
				</ul>
			</nav> -->
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li><?php echo \think\Session::get('ausess.group_name'); ?></li>

					<li class="dropDown dropDown_hover" style="margin-left:10px;"> <?php echo \think\Session::get('ausess.admin_name'); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="auinfo()">账户管理</a></li>
							<li><a href="javascript:;" onclick="editpwd()">修改密码</a></li>
							<li><a href="<?php echo url('login/loginout'); ?>">退出</a></li>
						</ul>
					</li>
					<!-- <li id="Hui-msg"> <a href="/public<?php echo ADMIN_STATIC; ?>/#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li> -->
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<?php foreach($navlist as $vo): ?>
			<dl id="menu-admin">
			<dt>
				<i class="Hui-iconfont">
					<?php 
						switch ($vo['id']) {
				        case '178':
				            echo "&#xe62d;";
				            break;
				     
				        case '189':
				            echo "&#xe62e;";
				            break;
				    
				         case '222':
				            echo "&#xe623;";
				            break;
				            
				        default:
				            # code...
				            break;
				         }
					?>
					
				</i> 
				<?php echo $vo['title']; ?>
				<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<?php  if(isset($vo['son'])){  foreach($vo['son'] as $vson): ?>
					<li><a _href="<?php echo url($vson['name']); ?>" data-title="<?php echo $vson['title']; ?>" href="javascript:void(0)"><?php echo $vson['title']; ?></a></li>
					<?php endforeach;  } ?>
				</ul>
			</dd>
		</dl>
		<?php endforeach; ?>
		<!-- <dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 决策评分pass项统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo url('AdminUser/statistics'); ?>" data-title="得分项详情">pass项详情</a></li>
				</ul>
			</dd> 
		</dl> -->
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="系统首页" data-href="welcome.html">系统首页</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="/public<?php echo ADMIN_STATIC; ?>/javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="/public<?php echo ADMIN_STATIC; ?>/javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo url('index/index/welcome'); ?>"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/h-ui/js/H-ui.admin.js"></script> 
<script type="text/javascript">

//修改个人信息
function auinfo(){
      layer.open({
          title: '修改账户信息',
          maxmin: true,
          type: 2,
          content: ["auinfo.html",'no'],
          area: ['450px', '400px']
      });
  }
//修改密码
function editpwd(){
      layer.open({
          title: '重置登录密码',
          maxmin: true,
          type: 2,
          content: ["editpwd.html",'no'],
          area: ['450px', '400px']
      });
  }
</script> 

</body>
</html>