<?php
/*
 * delete.php 
 * used to delete ideas 
 */
session_start();
include("functions/func.php");
include("login.php");

$id = $_GET['id'];
global $conn;
$q = "SELECT user FROM posts WHERE ID=$id";
$result = mysql_fetch_row(mysql_query($q,$conn));
$result = getUser(intval($result[0]));
if($result == $_SESSION['uname'])
{
	$q = "DELETE FROM posts WHERE ID=$id";
	$ret = mysql_query($q,$conn);
}
else
{
	//header( "Location: idea.php?id=" . $id );
	echo "<p>You can not delete this.</p>";
	echo "<p>You need to be user " . $result . " but you are " .  $_SESSION['uname'] . "</p>";
}

?>
