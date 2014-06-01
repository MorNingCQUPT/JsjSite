<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>重庆邮电大学-计算机科学与技术学院</title>

    <!-- Site CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://static.bootcss.com/www/assets/css/site.min.css" rel="stylesheet">
    <!-- Extras CSS -->

    <!-- Site JS -->
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="http://cdn.bootcss.com/unveil/1.3.0/jquery.unveil.min.js"></script>
    <script src="http://static.bootcss.com/www/assets/js/jquery.scrollUp.min.js"></script>
    <!-- Extras JS -->
</head>

<body>
<!-- 菜单 开始 -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-sm" href="#">计算机科学与技术学院</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
<!-- 头部菜单 Start -->
                <li class="active"><a href="#">首页</a></li>
                <?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo ($vo["plate_name"]); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if(is_array($vo['columns'])): foreach($vo['columns'] as $index=>$cl): ?><li class=""><a href="#" target="_blank"><?php echo ($cl); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </li><?php endforeach; endif; ?>
<!-- 头部菜单 End -->
            </ul>
        </div>
    </div>
</div>
<!-- 菜单 结束 -->

<div class="container">

</div>

<!-- 头部菜单 Start 测试
<?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li>板块 <?php echo ($vo["plate_id"]); ?>:<?php echo ($vo["plate_name"]); ?></li>
    <?php if(is_array($vo['columns'])): foreach($vo['columns'] as $index=>$cl): ?><ul>栏目 <?php echo ($index); ?>:<?php echo ($cl); ?></ul><?php endforeach; endif; endforeach; endif; ?>
头部菜单 End -->
</body>
</html>