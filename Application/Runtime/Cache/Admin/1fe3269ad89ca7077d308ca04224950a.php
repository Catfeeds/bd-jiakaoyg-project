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
<title>小车题库 | 科目四列表</title>
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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 小车题库 <span class="c-gray en">&gt;</span> 科目四列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
			<form action="classFour" method="post" id="searchfrom">
			<span class="select-box inline">
				<select class="select" id="type">
					<option value="0">选择分类</option>
					<option value="1">基础练习</option>
					<option value="2">强化练习</option>
				</select>
				</span>
				<span class="select-box inline" id="practice" style="display:none;">
				<select class="select">
					<option value="1">标线及手势</option>
					<option value="2">禁令标志</option>
					<option value="3">警告标志</option>
					<option value="4">指示标志</option>
					<option value="5">指路标志</option>
					<option value="6">机械常识</option>
					<option value="7">基础补充</option>
					<option value="8">客车专用题</option>
				</select>
				</span>
				<span class="select-box inline" id="intensive" style="display:none;">
				<select class="select">
					<option value="1">强化练习一</option>
					<option value="2">强化练习二</option>
					<option value="3">强化练习三</option>
					<option value="4">强化练习四</option>
					<option value="5">强化练习五</option>
					<option value="6">强化练习六</option>
					<option value="7">强化练习七</option>
					<option value="8">强化练习八</option>
					<option value="9">强化练习九</option>
				</select>
				</span>
				<input type="text" name="quecont" id="" placeholder=" 题目名称" style="width:250px" class="input-text">
				<button id="search" class="btn btn-success" type="submit" form="searchfrom"><i class="Hui-iconfont"></i> 搜索</button>
			</form>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius"  href="add?class=4"><i class="Hui-iconfont">&#xe600;</i> 添加题目</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="50">排序</th>
							<th>题目标题</th>
							<th width="100">图片</th>
							<th width="50">分类</th>
							<th width="100">类别</th>
							<th width="50">操作</th>
						</tr>
					</thead>
					<tbody>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tmp): $mod = ($i % 2 );++$i;?><tr class="text-c">
							<td><?php echo ($tmp["orders"]); ?></td>
							<td><?php echo ($tmp["quecont"]); ?></td>
							<td><img width="100" class="picture-thumb" src="<?php echo ($tmp["images"]); ?>"></td>
							<td><?php echo ($tmp["quetype"]); ?></td>
							<td><?php echo ($tmp["classification"]); ?></td>
							<td class="td-manage"><a style="text-decoration:none" class="ml-5" href="/index.php/Admin/Car/edit?id=<?php echo ($tmp["id"]); ?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,<?php echo ($tmp["id"]); ?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			<div class="pages">
			<?php echo ($page); ?>
			</div>
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
<script type="text/javascript" src="/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('#type').change(function(){
	var type=$('#type option:selected') .val();
	if(type==1){
		$('#practice').show(300);
		$('#practice select').attr('name','practice');
		$('#intensive').hide(300);
		$('#intensive select').removeAttr('name');
	}else if(type==2){
		$('#practice').hide(300);
		$('#practice select').removeAttr('name');
		$('#intensive').show(300);
		$('#intensive select').attr('name','intensive');
	}else if(type==0){
		$('#practice').hide(300);
		$('#intensive').hide(300);
	}
});


/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*图片-编辑*/
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-删除*/
function picture_del(obj,id1){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		var url="/index.php/Admin"+"/Car/del";
		$.getJSON(url,{id:id1},function(res){
			layer.msg('已删除!',{icon:1,time:1000});
		});
	});
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>