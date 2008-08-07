<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $html->charset(); ?> 
<title><?php echo $title_for_layout . " | Ideaius"; ?></title>
<?php echo $html->meta('keywords','enter any meta keyword here', array(), false); ?>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<?php //echo $scripts_for_layout ?>
<?php echo $html->css(array('style','posts','head')); ?>

</head>
<body>

<!-- If you'd like some sort of menu to 
show up on all of your views, include it here -->
<div id="header">
<div id="menu">...</div>
</div>

<!-- Here's where I want my views to be displayed -->
<?php echo $content_for_layout ?>

<!-- Add a footer to each displayed page -->
<div id="footer">...</div>

</body>
</html>

