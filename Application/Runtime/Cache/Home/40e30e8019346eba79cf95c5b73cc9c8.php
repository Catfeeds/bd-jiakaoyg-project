<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Document</title>
        <link href="/Public/Home/css/index.css" rel="stylesheet">
        <script src="/Public/Home/js/jquery.js"></script>
        <script>
        var urlTest=window.location.href;
        urlTest=urlTest.split("?");
        urlTest=urlTest[1];
        urlTest=urlTest.split("=");
        urlTest=urlTest[1];
        if(urlTest!='test'){
        	$.ajax({
        		type:"post",
        		url:"isLogin",
        		data:{},
        		success:function(data){
        			if(!data.success){
        				alert("请登录或进行免费答题！\n温馨提示：请电话联系购买软件! \n<?php echo get_opinion('phone1','option_value');?>,<?php echo get_opinion('phone2','option_value');?>");
			    		window.close();
        			}
        		}
        	});
        }
	    </script>
    </head>
    <body>
    	<div class="all_box">
    		<header class="practice_header box">
    			<h1><span>速成练习</span></h1>
    			<h2><span class="close black"></span></h2>
    		</header>
    		<section>
    			<div class="stumessage">
		            <fieldset class="one">
		                <legend class="st">驾考易过考场</legend>
		                <p class="bst">
		                    第一考台
		                </p>
		            </fieldset>
		            <fieldset class="two">
		                <legend class="st">考生信息</legend>
		                <img src="/Public/Home/img/muliindex_01.jpg">
		                <ul>
		                    <li>考生姓名：<span id="name"><?php echo (session('sc_name')); ?></span></li>
		                    <li>考试车型：<span id="che">{}</span></li>
		                    <li>考试科目：<span id="ke">科目一</span></li>
		                </ul>
		            </fieldset>
		        </div>
		        <div class="question">
	                <div class="section" id="sec" style="left:980px;">
	                    <a class="set" id="set">设置
	                    </a>
	                    <div class="setbox">
	                        <fieldset class="prompt_option" id="opt">
	                            <legend>提示选项</legend>
	                            <ul>
	                                <li id="jieshi">
	                                    <button></button>
	                                    <span>显示解释</span>
	                                </li>
	                            </ul>
	                        </fieldset>
	                        <fieldset class="prompt_option ShiFou">
	                            <legend>自动翻题</legend>
	                            <ul>
	                                <li class="dadui" name="3">
	                                    <button></button>
	                                    <span>自动翻题</span>
	                                </li>
	                            </ul>
	                        </fieldset>
	                        <fieldset class="prompt_option">
	                            <legend>抽题结果</legend>
	                            <ul>
	                                <li><span>抽题数量</span><em id="zong"></em></li>
	                                <li><span>答对题目</span><em id="yes"></em></li>
	                                <li><span>答错题目</span><em id="error"></em></li>
	                                <li><span>未答题目</span><em id="no"></em></li>
	                                <li><span>错误率</span><em id="lu"></em></li>
	                            </ul>
	                        </fieldset>
	                    </div>
	                </div>
	                <div class="questionList">
	                    <div class="fakeloader"></div>
<div class="zzsc" style="display: none;">
    <p class="content">
        <img class="big_img" src="" style="width: 650px; position: absolute; left: 19px;">
    </p>
    <p id="close">关闭</p>
</div>
<div class="content_mark" style="display: none;"></div>
	                    <ul class="ulquesstion">
	                        <li>
	                            <div class="queslist">
	                                <h3 id="questionTitle"></h3>
	                                <strong id="qiangdiao" style="display:none"></strong>
	                                <div class="checkselect ">
	                                    <div class=" radio_select">
	                                        <span id="selectA"></span>
	                                        <span id="selectB"></span>
	                                        <span id="selectC"></span>
	                                        <span id="selectD"></span>
	                                    </div>
	                                    <div class=" multi_select" style="display: none">
	                                        <span id="multi_select_A"></span>
	                                        <span id="multi_select_B"></span>
	                                        <span id="multi_select_C"></span>
	                                        <span id="multi_select_D"></span>
	                                    </div>
	                                    <div class=" judge_select" style="display: none;">
	                                    </div>
	                                    <div class="btjx">
	                                        <i>答案：<s id="correctAnswer"></s></i>
	                                        <i>题解</i>
	                                        <i class="jx" id="Anlay"></i>
	                                    </div>
	                                </div>
	                            </div>
	                            <p class="collect" style="display: none;"></p>
	                        </li>
	                    </ul>

	                </div>
	                <div class="click">
	                    <div class="clickimg">
	                        <p class="imgpicbtn" >
	                            <img id="photo" src="">
	                        </p>
	                        <h6 id="clickbig">点击可查看大图</h6>
	                    </div>
	                </div>
	                <div id="xuanzeanniu">
	                    <h4 class="select_btn radio_select_btn" style="display: block;"><em>请选择:</em>
	                        <button name="A">A</button>
	                        <button name="B">B</button>
	                        <button name="C">C</button>
	                        <button name="D">D</button></h4>
	                    <h4 class=" select_btn multi_select_btn" style="display: none;"><em>请选择:</em>
	                        <button name="A">A</button>
	                        <button name="B">B</button>
	                        <button name="C">C</button>
	                        <button name="D">D</button>
	                        <button class="ensurebtn">确定</button></h4>
	                    <div class="select_btn judgebtn" style="display: none;">
	                        <em>请判断:</em>
	                        <button class="mulirightbtn" name="A">
	                            <img src="/Public/Home/img/judge_03.png"></button>
	                        <button class="mulierrorbtn" name="B">
	                            <img src="/Public/Home/img/judge_05.png"></button>
	                    </div>
	                </div>

	                <div class="houtui">
	                    <button class="before">上一题</button>
	                    <button class="later">下一题</button>
	                </div>
	            </div>
	           	<div class="button">
	                <fieldset class="timer" style="display: none;">
	                    <legend>已练习时间</legend>
	                    <div class="time-item">
	                        <strong id="hour_show"></strong>
	                        <strong id="minute_show"></strong>
	                        <strong id="second_show"></strong>
	                    </div>
	                </fieldset>
	                <div class="checkbtn">
	                    <button class="jiexixs">显示解析</button>
	                    <button class="col">收藏此题</button>
	                    <button class="pack_up">收起答题卡</button>
	                    <button class="tijiao">提交</button>
	                    	<div class="warm" style="display: none;">
				                <h1><span>温馨提示</span></h1>
	                            <ul class="warmul">
	                                <li><span>抽题数量：</span><em id="zong1"></em></li>
	                                <li><span>答对题目：</span><em id="yes1"></em></li>
	                                <li><span>答错题目：</span><em id="error1"></em></li>
	                                <li><span>未答题目：</span><em id="no1"></em></li>
	                                <li><span>错误率：</span><em id="lu1"></em></li>
	                            </ul>
				                <button class="sure">重做错题</button>
				                <button class="cancelsure">确定</button>
				            </div>
	                    <button class="tujiexianshi" disabled="disabled">显示图解</button>
	                </div>
	            </div>
	            <div class="checkbox">
	            	<table id="tiku">

	            	</table>
	            </div>
    		</section>
    	</div>
    <script src="/Public/Home/js/intensive.js"></script>
    </body>
</html>