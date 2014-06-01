<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- 头部菜单 Start -->
<?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li>板块 <?php echo ($vo["plate_id"]); ?>:<?php echo ($vo["plate_name"]); ?></li>
    <?php if(is_array($vo['columns'])): foreach($vo['columns'] as $index=>$cl): ?><ul>栏目 <?php echo ($index); ?>:<?php echo ($cl); ?></ul><?php endforeach; endif; endforeach; endif; ?>
<!-- 头部菜单 End -->

</body>
</html>