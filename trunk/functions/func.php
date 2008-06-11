<?php
include("dbFunc.php");
include("tagsFunc.php");
include("classTextile.php");
/**
 * func.php
 * does a lot of stuff
 *
 * At some point I want to split this up into a few files (tagfuncs, ideafuncs, etc...)
 *
 * addIdea - Inserts an idea
 * cleanInput - takes a post and makes it safe
 * ideaBox - for submitting ideas
 * getUserID - give users name return ID
 * getUser - give ID return user name
 * newWiki - given postid, userid, content, save into db 
 * postsByUser - returns an array of posts for a user
 * getPostPage - return the html for the content of a post(wiki and all)
 * wikiFormat - parses wiki stuff returns html string
 * getWiki - 
 * frontPG - 
 * age - returns an age based on a birthdate
 * loginError - 
 */

function pgTop($title)
{
	$data = "<html>\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
	$data .= "<title>Ideaius | " . $title . "</title>\n";
	$data .= "<meta keywords=\"wiki, idea, wikidea, nat, welch, web2.0\" />\n";
	$data .= "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" />\n</head>\n<body>";
	$data .= "\n<div class=\"cont\">\n";
	$data .= "<div class=\"nav\"><div class=\"nitem\"><a href=\"index.php\">Home</a></div><div class=\"nitem\"><a href=\"about.php\">About</a></div><div class=\"nitem\"><input type=\"text\"></div></div>\n</p></small>";
	$data .= "<h1 class=\"title\"><a href=\"index.php\">Ideaius</a></h1>\n<h3 class=\"title\">Where ideas come to roost.</h3>\n";
	$data .= "<small><p class=\"title\">by <a href=\"http://devcloud.org\">devCloud</a>\n";

	return $data;
}

function footer()
{
		
	$data = "<script src=\"js/prototype.js\" type=\"text/javascript\"></script>\n";
	$data .= "<script src=\"js/scriptaculous.js\" type=\"text/javascript\"></script>\n";
	return $data;

}

function addIdea($idea,$user)
{
	//Incoming Idea will  be cleaned...
	$idea = cleanInput($idea);

	global $conn;
	$unum = getUserID($user);
	//print "User " . $user . " is " . $unum . "\n";
	$q = "INSERT INTO posts VALUES('','$idea',NOW(),'$unum','','')";
	$result = mysql_query($q,$conn);
		
}

function cleanInput($in)
{
	$out = htmlspecialchars(filter_var($in));
	return $out;
}

function ideaBox()
{

	if($_POST["idea"] == NULL) 
	{ 
		echo "<form action=\"index.php\" method=\"post\">";
		echo "<textarea rows=\"3\" cols=\"63\" name=\"idea\">Your Idea?</textarea>";
		echo "<br /><input type=\"submit\" value=\"Submit\">";
		echo "</form>";
	} else {
		print addIdea($_POST["idea"], $_SESSION['uname']);
		print "<p><div onclick=\"Effect.SlideUp(this);\" style=\"overflow:hidden;\">\n";
		print "<div style=\"background-color:#ff8080;\">Idea submitted!</div></div>\n";
		echo "<form action=\"index.php\" method=\"post\">\n";
		echo "<textarea rows=\"3\" cols=\"63\" name=\"idea\">Your Idea?</textarea>\n";
		echo "<br /><select name=\"cat\">";
		echo "<br /><input type=\"submit\" value=\"Submit\">\n";
		echo "</form>";
	}
}

function getUserID($user)
{
	global $conn;
	$q = "SELECT ID FROM users WHERE uname = '$user'";
	$ret = mysql_fetch_row(mysql_query($q,$conn));
	return intval($ret[0]);
}

function getUser($id)
{
	global $conn;
	$q = "SELECT uname FROM users WHERE ID = '$id'";
	$ret = mysql_fetch_row(mysql_query($q,$conn));
	return $ret[0];
}

function getUserLink($id)
{
	global $conn;
	$q = "SELECT uname FROM users WHERE ID = '$id'";
	$ret = mysql_fetch_row(mysql_query($q,$conn));
	$string = "<a href=\"user.php?u=" . $id . "\">" .  $ret[0] . "</a>";
	return $string;
}

function newWiki($pid,$uid,$cont)
{
	global $conn;
	$q = "INSERT INTO wiki values('','$pid','$cont',NOW(),'$uid')";
	$result = mysql_query($q,$conn);

}

function postsByUser($user)
{
	global $conn;
	$userID = getUserID($user);
	$q = "SELECT * FROM posts WHERE user=$userID";
	$ret = mysql_query($q,$conn);
	$c = 1;

	$str = "<p>Posts by $user</p>";

	while ($row = mysql_fetch_assoc($ret)) 
	{
		$str .= sprintf("<div class=\"post\">%s) %s <a href=\"idea.php?id=%s\">#</a></div>\n", $c, $row['content'], $row['ID']);  
		$c++;
	}
	return $str;
}

function wikiFormat($in)
{
	$textile = new Textile();
	return $textile->TextileThis($in);
}

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

function frontPGideas()
{
	print "<p class=\"heading\">The ten most recent Ideas:</p>";
	
	global $conn;
	$q = "SELECT * FROM posts ORDER BY ID DESC LIMIT 10";

	$ret = mysql_query($q,$conn);
	$c = 1;

	while ($row = mysql_fetch_assoc($ret)) 
	{
		printf("<div class=\"post\">%s) %s by <a href=\"user.php?u=%s\">%s</a> <a href=\"idea.php?id=%s\">#</a></div>\n", $c, $row['content'], $row['user'], getUser($row['user']),$row['ID']);  
		$c++;
	}
}

function age($bday)
{
	$diff = time() - $bday;
	$diff = $diff/(60*60*24*365);
	return $diff;	
}

function loginError()
{
	$ret = "<p>You are not logged in.</p>";
	$ret .= "<p>Please <a href=\"index.php\">Log In</a> or <a href=\"register.php\">Register</a>.</p>";
	return $ret;
}

