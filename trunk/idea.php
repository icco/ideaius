<?php
/**
 * idea.php
 * a page for an idea
 */
$ideanum = $_GET['id'];
$ideanum = intval($ideanum); 
$postTags = $_POST['tags'];

if($ideanum == 0)
{	
	header("Location: index.php");
}
else
{
	session_start(); 
	include("func.php");
	include("login.php");
	print pgTop("Idea #" . $ideanum);
	global $conn;
	$q = "SELECT * FROM posts where ID = '$ideanum'";
	$result = mysql_query($q,$conn);
	$data = mysql_fetch_assoc($result);
	if($postTags != NULL)
	{
		parseTags($postTags);
	}
?>

<?php 
	if($data['content'] != NULL) 
{ ?>
		<p>Idea #<?php echo $ideanum; ?></p>
		<p><?php echo $data['content']; ?></p>
		<p>By <?php echo getUserLink($data['user']); ?> on <?php echo $data['time']; ?></p>
		<p>Tags: <?php getTags($ideanum); ?> <form action="<? echo $HTTP_SERVER_VARS['PHP_SELF']; ?>" method="post">
		<input type="text" name="rname" maxlength="30"><input type="submit" name="subjoin" value="Add">
		</form></p>

<?php }	else {
		echo "<p>This IDEA is NULL</p>";
} ?>

<?php //Get Wiki Stuff
print getWiki($ideanum);	

?>
	<p>Go <a href="index.php">Home</a></p>
	<p>
<?php if($_SESSION['uname'] == getUser($data['user']))
{
	print "<p><a href=\"javascript:confirmation(" . $ideanum .  ")\">Delete</a> this idea</p>";
} ?>
	
	</div>
	<script type="text/javascript">
	<!--
	function confirmation(ID) {
		var answer = confirm("Delete idea number "+ID+" ?")
			if (answer){
				window.location = "delete.php?id="+ID;
			}
			else{
				alert("No action taken")
			}
	}
	-->
	</script>
	</body>
	</html>
<?php } ?>

