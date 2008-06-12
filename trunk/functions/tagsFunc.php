<?php
/**
 * Functions for working with tags
 */


/**
 * given a comma seperated string of tags and a post number
 * this seperates out the tags and adds them to the associated post
 */
function parseTags($in, $pID)
{
	$tags = explode(",",$in);
	foreach($tags as $key => $item)
	{   
		$tags[$key] = trim($item);
	}   

	$tags = array_unique($tags);

	foreach($tags as $tag)
	{
		addTag($pId,$tag);
	}
}

/**
 * given a tag name returns the associated ID
 */
function getTagID($in)
{
	global $conn;
	$q = "SELECT ID FROM tags WHERE name = '$in'";
	$ret = mysql_fetch_row(mysql_query($q,$conn));
	return intval($ret[0]);
}

/**
 * given an ID returns the tag
 */
function getTag($id)
{
	global $conn;
	$q = "SELECT name FROM tags WHERE ID = '$id'";
	$ret = mysql_fetch_row(mysql_query($q,$conn));
	return $ret[0];
}

/**
 * gets tags for the specified post
 * TODO: Get this to actually work...
 */
function getTags($pID)
{
	global $conn;
	$q = "SELECT * FROM t2p WHERE pID = '$pID'";
	$result = mysql_query($q,$conn);

	$str = " ";

	while($row = mysql_fetch_assoc($result))
	{
		var_dump($row); 
		$str .= getTag($row['tID']);
	}
	
	return $str;
}

/**
 * adds a tag to the specified post. 
 * this function is mainly used in association with parse tags.
 */
function addTag($pID, $tag)
{
	global $conn;
		
	$q = "SELECT COUNT(*) tags WHERE name = '$tag'";
	$result = mysql_query($q,$conn);
	
	if(intval($result) == 0)
	{
		$q = "INSERT INTO tags VALUES('','$tag')";
		$result = mysql_query($q,$conn);
	}

	$tid = getTagID($tag);

	$q = "INSERT INTO t2p VALUES('','$tid','$pID')";
	$result = mysql_query($q,$conn);
}

?>

