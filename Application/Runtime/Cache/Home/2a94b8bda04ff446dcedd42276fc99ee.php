<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>计算机科学与技术学院</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/JsjSite/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/JsjSite/Public/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/JsjSite/Public/css/doc.min.css" />
    <script src="/JsjSite/Public/js/jquery-1.9.min.js"></script>
    <script src="/JsjSite/Public/js/bootstrap.min.js"></script>
    <!--[if gte IE 8]>
    <script src="/JsjSite/Public/js/doc.js"></script>
    <script src="/JsjSite/Public/js/respond.js"></script>
    <![endif]-->
</head>

<body>
<!-- 菜单遍历格式 开始
<?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li>板块 <?php echo ($vo["plate_id"]); ?>:<?php echo ($vo["plate_name"]); ?></li>
    <?php if(is_array($vo['columns'])): foreach($vo['columns'] as $index=>$cl): ?><ul>栏目 <?php echo ($index); ?>:<?php echo ($cl); ?></ul><?php endforeach; endif; endforeach; endif; ?>
     菜单遍历格式 结束 -->

<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">计算机科学与技术学院</a>
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

<div class="container">
    <div class="row hidden-sm">
        <div class="doc-header">
            <img src="/JsjSite/Public/images/top.jpg" class="img-responsive" />
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 hidden-sm">
            <div class="panel panel-info">
                <div class="panel-heading"><?php echo ($summary_array_one["column_name"]); ?></div>
                <div class="list-group">
                    <?php if(is_array($summary_array_one['articles'])): foreach($summary_array_one['articles'] as $key=>$cl): ?><a href="/JsjSite/index.php/Home/Index/article/id/<?php echo ($cl["article_id"]); ?>" class="list-group-item">
                            <span class="label label-info pull-right">[<?php echo ($cl["article_postdate"]); ?>]</span>
                            <?php echo ($cl["article_title"]); ?>
                        </a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading"><?php echo ($summary_array_two["column_name"]); ?></div>
                <div class="list-group">
                    <?php if(is_array($summary_array_two['articles'])): foreach($summary_array_two['articles'] as $key=>$cl): ?><a href="/JsjSite/index.php/Home/Index/article/id/<?php echo ($cl["article_id"]); ?>#" class="list-group-item">
                            <span class="label label-info pull-right">[<?php echo ($cl["article_postdate"]); ?>]</span>
                            <?php echo ($cl["article_title"]); ?>
                        </a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading"><?php echo ($summary_array_three["column_name"]); ?></div>
                <div class="list-group">
                    <?php if(is_array($summary_array_three['articles'])): foreach($summary_array_three['articles'] as $key=>$cl): ?><a href="/JsjSite/index.php/Home/Index/article/id/<?php echo ($cl["article_id"]); ?>" class="list-group-item">
                            <span class="label label-info pull-right">[<?php echo ($cl["article_postdate"]); ?>]</span>
                            <?php echo ($cl["article_title"]); ?>
                        </a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading"><?php echo ($summary_array_four["column_name"]); ?></div>
                <div class="list-group">
                    <?php if(is_array($summary_array_four['articles'])): foreach($summary_array_four['articles'] as $key=>$cl): ?><a href="/JsjSite/index.php/Home/Index/article/id/<?php echo ($cl["article_id"]); ?>" class="list-group-item">
                            <span class="label label-info pull-right">[<?php echo ($cl["article_postdate"]); ?>]</span>
                            <?php echo ($cl["article_title"]); ?>
                        </a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 页脚 开始 -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="doc-cont">
                    <div class="doc-link">
                        <span class="label label-default">友情链接</span>
                        <a href="#">重庆邮电大学</a>
                        <a href="#">重庆邮电大学</a>
                        <a href="#">重庆邮电大学</a>
                        <a href="#">重庆邮电大学</a>
                        <a href="#">重庆邮电大学 </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="doc-info">
                    <p>Powered By Bootstrap | jQuery</p>
                    <a href="#">管理入口</a> | <a href="#">联系我们</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 页脚 结束 -->
</body>
</html>