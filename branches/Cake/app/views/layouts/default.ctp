<?php
function get_rev() {
$file = file('.svn/entries');
return 'SVN Path: <a href="' . attribute_escape(trim($file[4])) . '">' . strip_tags(trim($file[4])) . '</a> | Revision: ' . strip_tags($file[3]) . '<br />';
} ?>
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

<div class="cont">
<div class="nav">
<div class="nitem"><a href="/">Home</a></div><div class="nitem"><a href="/about/">About</a></div>
<div class="nitem"><input type="text"></div></div></p></small>
<h1 class="title"><a href="index.php">Ideaius</a></h1>
<h3 class="title">Where ideas come to roost.</h3>
<small><p class="title">by <a href="http://devcloud.org">devCloud</a>

<!-- Here's where I want my views to be displayed -->
<?php echo $content_for_layout ?>

<p>You are at r<?php echo get_rev(); ?>! Huzzah.</p>
</div>

</body>
</html>

