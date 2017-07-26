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
<title>新增题目</title>
</head>
<body>
<div class="page-container">
	<form action="addHandle" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data"  method="post" >
		<div class="row cl" style="display:none">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属科目：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="class" class="select" id="class">
					<option value="1">科目一</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>题目类型：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="quetype" class="select" id="quetype">
					<option value="1">单项选择</option>
					<option value="2">多项选择</option>
					<option value="3">判断</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择分类：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select class="select" id="classification">
					<option value="1">基础练习</option>
					<option value="2">强化练习</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl" id="practice_id">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>基础练习：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select class="select" id="practice" name="classification">
					<option value="101">标线及手势</option>
					<option value="102">禁令标志</option>
					<option value="103">警告标志</option>
					<option value="104">指示标志</option>
					<option value="105">指路标志</option>
					<option value="106">机械常识</option>
					<option value="107">基础补充</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl" id="intensive_id" style="display:none;">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>强化练习：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select class="select" id="intensive">
					<option value="201">强化练习一</option>
					<option value="202">强化练习二</option>
					<option value="203">强化练习三</option>
					<option value="204">强化练习四</option>
					<option value="205">强化练习五</option>
					<option value="206">强化练习六</option>
					<option value="207">强化练习七</option>
					<option value="208">强化练习八</option>
					<option value="209">强化练习九</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>题目标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="" name="quecont">
			</div>
		</div>
		<div class="row cl" id="quetypeid">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>题目内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				A:<input type="text" class="input-text" id="" name="xza">
				B:<input type="text" class="input-text" id="" name="xzb">
				C:<input type="text" class="input-text" id="" name="xzc">
				D:<input type="text" class="input-text" id="" name="xzd">
			</div>
			
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>题目答案：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="判断题A是正确B是错误" id="" name="answer">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">红字提示：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="" name="red">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">解析：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="note" cols="" rows="" class="textarea"  ></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="" name="orders">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" name="images" accept="image/png,image/gif,image/jpg,image/jpeg" />
				<input type="hidden" name="questions" value='1'/>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit" form="form-article-add"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
$('#classification').change(function(){
	var type=$('#classification option:selected') .val();
	if(type==1){
		$('#intensive').removeAttr('name');
		$('#practice_id').show(300);
		$('#practice').attr('name','classification');
		$('#intensive_id').hide(300);
	}else if(type==2){
		$('#practice').removeAttr('name');
		$('#intensive_id').show(300);
		$('#intensive').attr('name','classification');
		$('#practice_id').hide(300);
	}
});
$('#quetype').change(function(){
	var type=$('#quetype option:selected') .val();
	if(type==1||type==2){
		$('#quetypeid').show(300);
	}else if(type==3){
		$('#quetypeid').hide(300);
	}
});
</script>
</body>
</html>