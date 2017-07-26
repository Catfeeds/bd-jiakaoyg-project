<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo get_opinion('title','option_value');?></title>
        <link href="/Public/Home/css/index.css" rel="stylesheet">
        <script src="/Public/Home/js/jquery.js"></script>
    </head>
<body>


        <div class="hBox fcc">
            <span>
                <a href="" title="">
                    <img alt="" height="50" src="/Public/Home/img/logo.png" width="168">
                    </img>
                </a>
            </span>
            <strong>
                <a href="" title="2017驾驶员理论技巧在线模拟考试系统">
                    2017驾驶员理论技巧在线模拟考试系统<br>
                    诚征全国加盟学习热线:<?php echo get_opinion('phone1','option_value');?>
                </a>
            </strong>
            <p>
            <?php if($_SESSION['sc_name']!= null): ?><a href="" class="user"><?php echo (session('sc_name')); ?></a>|
                  <a href="/index.php/Home/Index/logout">退出</a>
            <?php else: ?>
                  <a href="/index.php/Home/Index/sequential?test=test" target="_blank">免费题库</a>|
                  <a href="/index.php/Home/Index/login">请登录</a><?php endif; ?>
            </p>
        </div>
        <div class="htmleaf-container">
    <nav class="animenu">
      <button class="animenu__toggle">
        <span class="animenu__toggle__bar"></span>
        <span class="animenu__toggle__bar"></span>
        <span class="animenu__toggle__bar"></span>
      </button>
      <ul class="animenu__nav">
        <li>
          <a href="/index.php/Home/Index/index">首页</a>
        </li>
        <li>
          <a href="#">小车题库</a>
          <ul class="animenu__nav__child">
            <li><a href="/index.php/Home/Index/index?questions=1">科目一</a></li>
            <li><a href="/index.php/Home/Index/indexFour?questions=1">科目四</a></li>
          </ul>
        </li>     
        <li>
          <a href="/index.php/Home/Index/index1?questions=2">客车题库</a>
        </li>
        <li>
          <a href="/index.php/Home/Index/index2?questions=3">货车题库</a>
        </li>
        <li>
          <a href="/index.php/Home/Index/about">联系我们</a>
        </li>
        <li>
          <a href="/index.php/Home/Index/sequential?test=test" target="_black">免费试题</a>
        </li>
      </ul>
    </nav>
</div>

        <div class="mainBox fcc">
            <div class="adtop">
                <h2>科目一</h2>
            </div>
            <div class="section_box">
                <div class="classifybox">
                    <ul class="classify" id="classify">
                        <li>
                            <p class="classifyp">
                                基础练习
                            </p>
                            <p>
                                <span class="" name="101">
                                    标线及手势
                                </span>
                                <span class="" name="102">
                                    禁令标志
                                </span>
                                <span class="" name="103">
                                    警告标志
                                </span>
                                <span class="" name="104">
                                    指示标志
                                </span>
                                <span class="" name="105">
                                    指路标志
                                </span>
                                <span class="" name="106">
                                    机械常识
                                </span>
                                <span class="" name="107">
                                    基础补充
                                </span>
                                <span class="" name="109">
                                    货车专用题
                                </span>
                                <span class="" name="110">
                                    科目四补充题
                                </span>
                            </p>
                        </li>
                        <li>
                            <p class="classifyp">
                                强化练习
                            </p>
                            <p>
                                <span class="" name="201">
                                    速成练习一
                                </span>
                                <span class="" name="202">
                                    速成练习二
                                </span>
                                <span class="" name="203">
                                    速成练习三
                                </span>
                                <span class="" name="204">
                                    速成练习四
                                </span>
                                <span class="" name="205">
                                    速成练习五
                                </span>
                                <span class="" name="206">
                                    速成练习六
                                </span>
                                <span class="" name="207">
                                    速成练习七
                                </span>
                                <span class="" name="208">
                                    速成练习八
                                </span>
                                <span class="" name="209">
                                    速成练习九
                                </span>
                            </p>
                        </li>
                    </ul>
                    <div class="ExamBtn">
                        <u class="btnJJ" name="">
                            顺序练习
                        </u>
                        <u class="btnCJ" name="">
                            随机练习
                        </u>
                    </div>
                </div>
            </div>
        </div>
<script>
    var str1 = "";
    var str2 = "";
    var getUrl = window.location.href;
    getUrl = getUrl.split("?");
    if(getUrl[1]){
        getUrl = getUrl[1];
        getUrl = getUrl.split("=");
        str1 += "/index.php/Home/Index/sequential?questions=";
        str1 += getUrl[1];
        str2 += str1;
        str1 += "&class=1&sort=1";
        str2 += "&class=1&sort=0";
    }else{
        str1 += "/index.php/Home/Index/sequential?questions=1&class=1&sort=1";
        str2 += "/index.php/Home/Index/sequential?questions=1&class=1&sort=0";
    }
    $('.btnJJ').attr('name',str1);
    $('.btnCJ').attr('name',str2);
</script>
        <div id="footer">
            <dl>
                <dt>
                    <a href="" target="_self">
                        <?php echo get_opinion('copy','option_value');?>
                    </a>
                </dt>
                <dd>
                    <a href="/index.php/Home/Index/about" target="_self">
                        关于我们
                    </a>
                    |
                    <a href="/index.php/Home/Index/about" target="_self">
                        免责声明
                    </a>
                    |
                    <a href="/index.php/Home/Index/about" target="_self">
                        联系我们
                    </a>
                    <br>
                        <br>
                            <a href="">
                                <?php echo get_opinion('icp','option_value');?>
                            </a>
                        </br>
                    </br>
                </dd>
            </dl>
        </div>
<div class="QRTG" style="display: block;">
<b class="s" onclick="$('.QRTG').fadeOut();">&nbsp;</b>
<p class="app s">
    微信号一
    <a href="">
        <img src="/Public/Home/img/weixin2.png" width="79" height="79">
    </a>
</p>
<u class="s">
    微信号二
    <a href="">
        <img src="/Public/Home/img/weixin1.jpg" width="86" height="86" title="">
    </a>
</u>
</div>
<script src="/Public/Home/js/index.js"></script>
</body>
</html>