<?php
/**
 * settings.php
 * edit user settings
 */
session_start(); 
include("functions/func.php");
include("login.php");
print pgTop("Edit Your Settings");
if(!checkLogin())
{
	print loginError();
}
else
{
	$user = $_SESSION['uname'];
	$q = "SELECT * FROM users WHERE uname = '$user'";
	global $conn;
	$result = mysql_query($q,$conn);
	$arr = mysql_fetch_assoc($result);
	echo "Editing Settings for " . $arr['RealName'];
}



$q = "UPDATE users SET column_name = new_value WHERE column_name = some_value";

?>

<form action="<? echo $HTTP_SERVER_VARS['PHP_SELF']; ?>" method="post">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>Real Name:</td><td><input type="text" name="rname" maxlength="30" value="<?php echo $arr['RealName']; ?>"></td></tr>
<tr><td>Location:</td><td><input type="text" name="loc" maxlength="30" value="<?php echo $arr['location']; ?>"></td></tr>
<tr><td>Email:</td><td><input type="text" name="email" maxlength="30" value="<?php echo $arr['email']; ?>"></td></tr>
<tr><td>Birthday:</td><td>M: <input type="text" size="2" name="bdaym" maxlength="2">
D: <input type="text" name="bdayd" size="2" maxlength="2">
Y: <input type="text" name="bdayy" size="4" maxlength="4"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="subjoin" value="Edit"></td></tr>
</table>
</form>

</div>
</body>
</html>

