<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="keywords" content="<?php echo get_opinion('keywords','option_value');?>">
<meta name="description" content="<?php echo get_opinion('description','option_value');?>">
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />

<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
<title>基本设置</title>
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/index.php/Admin"><?php echo get_opinion('title','option_value');?> 后台管理</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs"> v1.0</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>超级管理员</li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo (session('sc_admin_username')); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="/index.php/Admin/All/logout">退出</a></li>
						</ul>
					</li>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 小车题库<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="/index.php/Admin/Car/classOne" title="科目一">科目一</a></li>
					<li><a href="/index.php/Admin/Car/classFour" title="科目四">科目四</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 客车题库<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="/index.php/Admin/Car/classOne2" title="科目一">科目一</a></li>
					<li><a href="/index.php/Admin/Car/classFour2" title="科目一">科目四补充题</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 货车题库<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="/index.php/Admin/Car/classOne3" title="科目一">科目一</a></li>
					<li><a href="/index.php/Admin/Car/classFour2" title="科目一">科目四补充题</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="/index.php/Admin/Member/getlist" title="会员列表">会员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="/index.php/Admin/System/freetitle" title="系统设置">免费题库</a></li>
					<li><a href="/index.php/Admin/System/config" title="系统设置">系统设置</a></li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="configHandle" method="post" class="form form-horizontal" id="form-article-add">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl"><span>基本设置</span><span>联系我们</span></div>
					<div class="tabCon">
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站名称：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-title" placeholder="控制在25个字、50个字节以内" value="<?php echo get_opinion('title','option_value');?>" class="input-text" name="title">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>关键词：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-Keywords" placeholder="5个左右,8汉字以内,用英文,隔开" value="<?php echo get_opinion('keywords','option_value');?>" class="input-text" name="keywords">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-description" placeholder="空制在80个汉字，160个字符以内" value="<?php echo get_opinion('description','option_value');?>" class="input-text" name="description">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>底部版权信息：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-copyright" placeholder="&copy; 2014 H-ui.net" value="<?php echo get_opinion('copy','option_value');?>" class="input-text" name="copy">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">备案号：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-icp" placeholder="京ICP备00000000号" value="<?php echo get_opinion('icp','option_value');?>" class="input-text" name="icp">
							</div>
						</div>
					</div>
					<div class="tabCon">
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">电话：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-title" placeholder="" value="<?php echo get_opinion('telephone','option_value');?>" class="input-text" name="telephone">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">手机1：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-Keywords" placeholder="" value="<?php echo get_opinion('phone1','option_value');?>" class="input-text" name="phone1">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">手机2：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-Keywords" placeholder="" value="<?php echo get_opinion('phone2','option_value');?>" class="input-text" name="phone2">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">地址：</label>
							<div class="formControls col-xs-8 col-sm-9">
								<input type="text" id="website-icp" placeholder="" value="<?php echo get_opinion('address','option_value');?>" class="input-text" name="address">
							</div>
						</div>
					</div>
				</div>
				<div class="row cl">
					<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
						<button class="btn btn-primary radius" type="submit" form="form-article-add"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
						<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
					</div>
				</div>
			</form>
		</article>
	</div>
</section>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script>
	function sc_close(){
		history.back(-1);
	}
</script>


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>