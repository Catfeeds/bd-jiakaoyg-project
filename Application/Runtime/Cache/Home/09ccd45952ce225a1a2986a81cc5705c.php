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
                <h2>联系我们</h2>
            </div>
            <div class="section_box">
                <div class="classifybox">
                    <ul class="addressul">
                        <li>电话：<?php echo get_opinion('telephone','option_value');?></li>
                        <li>手机1：<?php echo get_opinion('phone1','option_value');?></li>
                        <li>手机2：<?php echo get_opinion('phone2','option_value');?></li>
                        <li>地址：<?php echo get_opinion('address','option_value');?></li>
                    </ul>
                </div>
            </div>
        </div>
<script>
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