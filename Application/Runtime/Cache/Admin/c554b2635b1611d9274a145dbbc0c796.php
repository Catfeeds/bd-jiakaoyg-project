<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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

<title>编辑题目</title>
</head>
<body>
<div class="page-container">
	<form action="editHandle" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data"  method="post" >
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>题目标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($arr["quecont"]); ?>" id="" name="quecont">
				<input type="hidden" name="id" value="<?php echo ($arr["id"]); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>题目内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				A:<input type="text" class="input-text" value="<?php echo ($arr["options"]["A"]); ?>" id="" name="xza">
				B:<input type="text" class="input-text" value="<?php echo ($arr["options"]["B"]); ?>" id="" name="xzb">
				C:<input type="text" class="input-text" value="<?php echo ($arr["options"]["C"]); ?>" id="" name="xzc">
				D:<input type="text" class="input-text" value="<?php echo ($arr["options"]["D"]); ?>" id="" name="xzd">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>题目答案：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($arr["answer"]); ?>" id="" name="answer">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">红字提示：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($arr["red"]); ?>" id="" name="red">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">解析：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="note" cols="" rows="" class="textarea"><?php echo ($arr["note"]); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($arr["orders"]); ?>" id="" name="orders">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit" form="form-article-add"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="sc_class();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>
</div>

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

<script>
function sc_class(){
	location.href="index";
}
</script>
</script>
</body>
</html>