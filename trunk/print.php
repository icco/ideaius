<?php 
	include("func.php"); 
?>
<html>
<head>
<title>What's in the DB</title>
<style>
li
{
	list-style: none;
}
</style>
</head>
<body>
<?php dumpDB(); ?>
<p><a href="index.php">Go Home...</a></p>
</body>
</html>
