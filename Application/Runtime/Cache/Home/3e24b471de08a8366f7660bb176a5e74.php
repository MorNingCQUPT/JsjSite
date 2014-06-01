<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- 文章列表 Start -->
<?php if(is_array($articles)): foreach($articles as $key=>$vo): ?><p>标题：<?php echo ($vo["article_title"]); ?></p>
    <p>发布者：<?php echo ($vo["article_postuser"]); ?></p>
    <p>发布时间：<?php echo ($vo["article_postdate"]); ?></p>
    <p>内容：<?php echo ($vo["article_content"]); ?></p>
    </br><?php endforeach; endif; ?>
<!-- 文章列表 End -->

</body>
</html>