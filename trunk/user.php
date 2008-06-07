<?php
/*
 * User page
 * Still need to check if no user is passed...
 * Clean up! Make better!
 */

session_start();
include("func.php");

$user = $_GET['u'];
global $conn;
$q = "SELECT * FROM users WHERE uname=$user OR ID=$user";
$result = mysql_query($q,$conn);
$arr = mysql_fetch_assoc($result);

$output = pgTop("User " . $arr['uname']);

/*
foreach($arr as $piece)
{
	$output .= "\n<p>" . $piece . "</p>";
}
*/

$output .= "<p>User Name: " . $arr['uname'] . "</p>";
$output .= "<p>Real Name: " . $arr['RealName'] . "</p>";
$output .= "<p>Birthday: " . date("m.d.y",strtotime($arr['bday'])) . "</p>";
/* $output .= "<p>Age: " . age(strtotime($arr['bday'])) . " years old</p>"; */
$output .= sprintf("<p>Age: %0.3f years old</p>", age(strtotime($arr['bday'])));
if($_SESSION['uname'] == $arr['uname'])
{
	$output .= "<a href=\"settings.php\">Edit</a> Your Profile and Settings.";
}
$output .= postsByUser($arr['uname']);
$output .= "\n</div></body></html>";

echo $output;

?>

