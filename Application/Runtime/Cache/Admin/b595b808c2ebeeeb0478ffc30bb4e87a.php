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

<title>驾考易过|后台管理|首页</title>
<meta name="keywords" content="">
<meta name="description" content="">
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
	<nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/index.php/Admin/Index/index" class="maincolor">首页</a> 
		<span class="c-999 en">&gt;</span>
		<span class="c-666">我的桌面</span> 
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<p class="f-20 text-success">欢迎使用 驾考易过
				<span class="f-14">v1.0</span>
				后台管理</p>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th colspan="7" scope="col">信息统计</th>
			</tr>
					<tr class="text-c">
						<th>小车题库</th>
						<th>客车题库</th>
						<th>货车题库</th>
						<th>摩托车题库</th>
			</tr>
		</thead>
				<tbody>
					<tr class="text-c">
						<td><?php echo ($s1); ?></td>
						<td><?php echo ($s2); ?></td>
						<td><?php echo ($s3); ?></td>
						<td><?php echo ($s4); ?></td>
			</tr>
		</tbody>
	</table>
			<table class="table table-border table-bordered table-bg mt-20">
				<thead>
					<tr>
						<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
				<tbody>
					<tr>
						<th width="30%">服务器计算机名</th>
						<td><span id="lbServerName">
							<?php echo $_SERVER['SERVER_NAME']; ?>
						</span></td>
			</tr>
					<tr>
						<td>服务器IP地址</td>
						<td>
							<?php echo $_SERVER['SERVER_ADDR']; ?>
						</td>
			</tr>
					<tr>
						<td>服务器域名</td>
						<td>
							<?php echo $_SERVER["HTTP_HOST"]; ?>
						</td>
			</tr>
					<tr>
						<td>服务器端口 </td>
						<td>
							<?php echo $_SERVER['SERVER_PORT']; ?>
						</td>
			</tr>
					<tr>
						<td>本文件所在文件夹 </td>
						<td>
							<?php echo WEB_ROOT; ?>
						</td>
			</tr>
					<tr>
						<td>服务器操作系统 </td>
						<td>
							<?php echo PHP_OS; ?>
						</td>
			</tr>
					<tr>
						<td>服务器脚本超时时间 </td>
						<td>
							<?php echo ini_get("max_execution_time"); ?>
						</td>
			</tr>
					<tr>d
						<td>服务器当前时间 </td>
						<td>
							<?php echo date('Y-m-d H:i:s',time()); ?>
						</td>
			</tr>
					<tr>
						<td>逻辑驱动器 </td>
						<td>C:\D:\</td>
			</tr>
					<tr>
						<td>CPU 总数 </td>
						<td>
							<?php echo $_SERVER['PROCESSOR_IDENTIFIER']; ?>
						</td>
			</tr>
					<tr>
						<td>CPU 类型 </td>
						<td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
			</tr>
					<tr>
						<td>虚拟内存 </td>
						<td>52480M</td>
			</tr>
					<tr>
						<td>当前程序占用内存 </td>
						<td>3.29M</td>
			</tr>
					<tr>
						<td>Asp.net所占内存 </td>
						<td>51.46M</td>
			</tr>
					<tr>
						<td>当前Session数量 </td>
						<td>8</td>
			</tr>
					<tr>
						<td>当前SessionID </td>
						<td>gznhpwmp34004345jz2q3l45</td>
			</tr>
					<tr>
						<td>当前系统用户名 </td>
						<td>NETWORK SERVICE</td>
			</tr>
		</tbody>
	</table>
</article>
		<footer class="footer">
			<p>本后台系统由<a href="" title="">王彩霖</a>提供技术支持</p>
</footer>
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
<script type="text/javascript">

</script>
<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>