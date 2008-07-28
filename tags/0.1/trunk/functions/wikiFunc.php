<?php

/**
 * used to add or update a wiki page
 */
function newWiki($pid,$uid,$cont)
{
	global $conn;
	$q = "INSERT INTO wiki values('','$pid','$cont',NOW(),'$uid')";
	$result = mysql_query($q,$conn);

}

/**
 * Converts the text stored in the db (in textile format)
 * into html. This is not really my code!
 */
function wikiFormat($in)
{
	$textile = new Textile();
	return $textile->TextileThis($in);
}

/**
 * Gets the most recent wiki page for a post
 */
function getWiki($pID)
{
	//Note that data is stored raw and we convert to html here. 
	//Not sure if this is smart or not
	global $conn;
	$q = "SELECT * FROM wiki WHERE pID = '$pID' ORDER BY ID DESC LIMIT 1";
	$result = mysql_query($q,$conn);
	//var_dump($result);
	$ret = mysql_fetch_assoc($result);
	if($ret != NULL)
	{
		$temp = "<div class=\"wiki\">\n";
		$temp .= wikiFormat($ret['content']);
		$temp .= "\n</div>";
		$temp .= "\n<p>Last edited by " . getUser($ret['uID']) . " on " . $ret['date'] . "<br />";
		if(checkLogin())
		{
			$temp .= "<a href=\"edit.php?ID=$pID\">Edit</a> this.</p>";
		}
		else
		{
			$temp .= "You're Not <a href=\"index.php\">Logged In</a>";
		}
		return $temp;

	}
	else
	{
		$form = "No Wiki yet. <a href=\"edit.php?ID=$pID\">Add one?</a>";
		return $form;
	}
}

?>

