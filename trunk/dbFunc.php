<?php
/*
 * dbFunc.php
 * Contains major database functions
 */

//Connect to the mysql database, used everywhere. Don't break me.
$conn = mysql_connect("localhost", "nat", "nat100") or die(mysql_error());
mysql_select_db('Ideaius', $conn) or die(mysql_error());

function clearUsers()
{
	//Delete this before making this public
	//SERIOUSLY
	global $conn;	
	$q = "DELETE FROM users";	
	$result = mysql_query($q,$conn);
	echo "Users Table Emptied.\n";
}

function clearPosts()
{
	//Delete this before making this public
	//SERIOUSLY
	global $conn;	
	$q = "DELETE FROM posts";	
	$result = mysql_query($q,$conn);
	echo "Posts Table Emptied.\n";
}

function dumpDB()
{
	global $conn;
	$q = "SELECT * FROM users";
	$result = mysql_query($q,$conn);

	if (!$result) {
		echo "Could not successfully run query ($sql) from DB: " . mysql_error();
		exit;
	}

	if (mysql_num_rows($result) == 0) {
		echo "No rows found, nothing to print so am exiting";
		exit;
	}

	print "<h3>DB Dump!</h3>\n";
	print "<p>Users</p><ul>\n";
	while ($row = mysql_fetch_assoc($result))
	{
		$ret = "<li>"; 
		$ret .= $row['ID']; 
		$ret .= ") <a href=\"mailto:"; 
		$ret .= $row['email']; 
		$ret .= "\">"; 
		$ret .= $row['RealName']; 
		$ret .= "</a>: "; 
		$ret .= $row['uname']; 
		$ret .= " in "; 
		$ret .= $row['location']; 
		$ret .= " | ";
		$ret .= $row['passwd']; 
		$ret .= " | Bday : "; 
		$ret .= $row['bday'];
		$ret .= " | ";
		$ret .= $row['created'];
		$ret .= "</li>\n";  
		print $ret;
	}
	print "</ul>\n";
	
	$q = "SELECT * FROM posts";
	$result = mysql_query($q,$conn);

	print "<p>Posts</p><ul>\n";
	while ($row = mysql_fetch_assoc($result))
	{
		$ret = "<li>";
		$ret .= $row['ID']; 
		$ret .= ") ";
	    $ret .= $row['content'];
		$ret .= " | ";
		$ret .= $row['time'];
		$ret .= " | ";
		$ret .= $row['user'];
		$ret .= " | wiki: ";
		$ret .= $row['wikiptr'];
		$ret .= " | Cat:  ";
		$ret .= $row['catID'];
		$ret .= "</li>\n";  
		print $ret;
	}
	print "</ul>\n";

	$q = "SELECT * FROM wiki";
	$result = mysql_query($q,$conn);

	print "<p>Wiki</p><ul>\n";
	while ($row = mysql_fetch_assoc($result))
	{
		$ret = "<li>";
		$ret .= $row['ID']; 
		$ret .= ") post: ";
	    $ret .= $row['pID'];
		$ret .= " | ";
		$ret .= $row['content'];
		$ret .= " | user: ";
		$ret .= $row['uID'];
		$ret .= " | ";
		$ret .= $row['date'];
		$ret .= "</li>\n";  
		print $ret;
	}
	print "</ul>\n";
	
	$q = "SELECT * FROM categories";
	$result = mysql_query($q,$conn);

	print "<p>Categories</p><ul>\n";
	while ($row = mysql_fetch_assoc($result))
	{
		$ret = "<li>";
		$ret .= $row['ID']; 
		$ret .= ") ";
	    $ret .= $row['name'];
		$ret .= "</li>\n";  
		print $ret;
	}
	print "</ul>\n";
	mysql_close($conn);
}

?>

