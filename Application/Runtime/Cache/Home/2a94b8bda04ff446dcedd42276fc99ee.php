<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>重庆邮电大学-计算机科学与技术学院</title>

    <link rel="stylesheet" href="/JsjSite/Public/css/bootstrap.css">
    <link rel="stylesheet" href="/JsjSite/Public/css/bootstrap-theme.css">

    <script src="/JsjSite/Public/js/jquery-1.11.1.js"></script>
    <script src="/JsjSite/Public/js/bootstrap.js"></script>
</head>

<body>

<!-- 菜单遍历格式 开始
<?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li>板块 <?php echo ($vo["plate_id"]); ?>:<?php echo ($vo["plate_name"]); ?></li>
    <?php if(is_array($vo['columns'])): foreach($vo['columns'] as $index=>$cl): ?><ul>栏目 <?php echo ($index); ?>:<?php echo ($cl); ?></ul><?php endforeach; endif; endforeach; endif; ?>
     菜单遍历格式 结束 -->

<!-- 菜单 开始 -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-right" href="#">计算机科学与技术学院</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- 头部菜单 Start -->
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

<!-- 主页内容 开始 -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">这里是图片区？？？</div>
                <div class="list-group">
                    <?php if(is_array($article_list_one)): foreach($article_list_one as $key=>$vo): ?><a href="#" class="list-group-item">[<?php echo ($vo["article_postdate"]); ?>]:<?php echo ($vo["article_title"]); ?></a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">学院新闻</div>
                <div class="list-group">
                    <?php if(is_array($article_list_one)): foreach($article_list_one as $key=>$vo): ?><a href="#" class="list-group-item">[<?php echo ($vo["article_postdate"]); ?>]:<?php echo ($vo["article_title"]); ?></a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container ">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">学院新闻</div>
                    <div class="list-group">
                        <?php if(is_array($article_list_one)): foreach($article_list_one as $key=>$vo): ?><a href="#" class="list-group-item">[<?php echo ($vo["article_postdate"]); ?>]:<?php echo ($vo["article_title"]); ?></a><?php endforeach; endif; ?>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">通知公告</div>
                    <div class="list-group">
                        <?php if(is_array($article_list_two)): foreach($article_list_two as $key=>$vo): ?><a href="#" class="list-group-item">[<?php echo ($vo["article_postdate"]); ?>]:<?php echo ($vo["article_title"]); ?></a><?php endforeach; endif; ?>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">学生活动</div>
                    <div class="list-group">
                        <?php if(is_array($article_list_three)): foreach($article_list_three as $key=>$vo): ?><a href="#" class="list-group-item">[<?php echo ($vo["article_postdate"]); ?>]:<?php echo ($vo["article_title"]); ?></a><?php endforeach; endif; ?>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- 主页内容 结束 -->

<!-- 页脚 开始 -->

<!-- 页脚 结束 -->
</body>
</html>