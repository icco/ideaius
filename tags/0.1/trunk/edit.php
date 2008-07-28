<?php
/**
 * edit.php
 * edit a wiki
 */
session_start(); 
include("func.php");
include("login.php");
$pid = $_GET['ID'];
print pgTop("Edit wiki page #" . $pid);

$q = "SELECT * FROM wiki WHERE pID = '$pid' ORDER BY ID DESC LIMIT 1";
$result = mysql_query($q,$conn);
$ret = mysql_fetch_assoc($result);
$inside = $ret['content'];
if(checkLogin())
{
if($_POST['wiki'] == NULL)
{
?>
<div class="wikiFormat">
Quick block modifiers:<br />
Header: hn.<br />
Blockquote: bq.<br />
Footnote: fnn.<br />
Numeric list: #<br />
Bulleted list: *<br />
<br />
Quick phrase modifiers:<br />
_emphasis_<br />
*strong*<br />
??citation??<br />
-deleted text-<br />
+inserted text+<br />
^superscript^<br />
~subscript~<br />
%span%<br />
<br />
To apply attributes:<br />
(class)<br />
(#id)<br />
{style}<br />
[language]<br />
< right<br />
> left<br />
= center<br />
<> justify<br />
<br />
To insert a table:<br />
|a|table|row|<br />
|a|table|row|<br />
<br />
To insert a link:<br />
"linktext":url<br />
<br />
To insert an image:<br />
!imageurl!<br />
<br />
To define an acronym:<br />
ABC(Always Be Closing)<br />
<br />
To reference a footnote:<br />
[n]<br />
</div>
<?php if($inside != NULL) { ?>
<p>
The current page:
<?php echo wikiFormat($inside); ?>
</p>
<?php } ?>
<p>
<form action="edit.php" method="post">
<textarea rows="30" cols="63" name="wiki"><?php echo $inside; ?></textarea>
<input type="hidden" id="pID" name="pID" value="<?php echo $pid;?>" />
<input type="submit" value="Submit">
</form>
</p>
<?php } else {
	$uid = getUserID($_SESSION['uname']);
	$cont = $_POST['wiki'];
	$pid = $_POST['pID'];

	newWiki($pid,$uid,$cont);
	
	//There really should be error checking here
	echo "<p>Wiki Successfully submitted.</p>";	
	echo "<p>Go back to <a href=\"idea.php?id=$pid\">the Idea</a>.</p>";	
} 
} else {
	echo "<p>You are not logged in, <a href=\"javascript:history.go(-1)\">go back.</a></p>";
}
	?>
</div>
</body>
</html>

