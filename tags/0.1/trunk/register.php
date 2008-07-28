<?php
/**
 * register.php
 * used to register users
 */
//As seen on http://evolt.org/article/comment/17/60265/index.html
session_start(); 
include("functions/dbFunc.php");

/**
 * Returns true if the username has been taken
 * by another user, false otherwise.
 */
function usernameTaken($username){
	global $conn;
	if(!get_magic_quotes_gpc()){
		$username = addslashes($username);
	}
	$q = "select uname from users where uname = '$username'";
	$result = mysql_query($q,$conn);
	return (mysql_numrows($result) > 0);
}

/**
 * Inserts the given (username, password) pair
 * into the database. Returns true on success,
 * false otherwise.
 */
function addNewUser($rname, $username, $password, $email, $bday, $loc){
	global $conn;
	$q = "INSERT INTO users VALUES ('','$rname','$username','$email','$password','$bday','$loc',NOW())";
	print $q;
	return mysql_query($q,$conn);
}

/**
 * Displays the appropriate message to the user
 * after the registration attempt. It displays a 
 * success or failure status depending on a
 * session variable set during registration.
 */
function displayStatus(){
	$uname = $_SESSION['reguname'];
	if($_SESSION['regresult']){
		?>
			<div class="cont">
			<h1>Registered!</h1>
			<p>Thank you <b><? echo $uname; ?></b>, your information has been added to the database, you may now <a href="index.php" title="Login">log in</a>.</p>
			</div>
			<?php
	} else {
		?>
			<div class="cont">
			<h1>Registration Failed</h1>
			<p>We're sorry, but an error has occurred and your registration for the username <b><? echo $uname; ?></b>, could not be completed.<br>
			Please try again at a later time.</p>
			</div>
			<?php
	}
	unset($_SESSION['reguname']);
	unset($_SESSION['registered']);
	unset($_SESSION['regresult']);
}

if(isset($_SESSION['registered'])){
	/**
	 * This is the page that will be displayed after the
	 * registration has been attempted.
	 */
	?>

		<html>
		<title>Registration Page</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<body>

		<div class="cont">
		<?php displayStatus(); ?>
		</div>
		</body>
		</html>

		<?
		return;
}

/**
 * Determines whether or not to show to sign-up form
 * based on whether the form has been submitted, if it
 * has, check the database for consistency and create
 * the new account.
 */
if(isset($_POST['subjoin'])){
	/* Make sure all fields were entered */
	if(!$_POST['user'] || !$_POST['pass']){
		die('You didn\'t fill in a required field. <a href=\"register.php\" >Go Back</a>');
	}

	/* Spruce up username, check length */
	$_POST['user'] = trim($_POST['user']);
	if(strlen($_POST['user']) > 30){
		die("Sorry, the username is longer than 30 characters, please shorten it. <a href=\"register.php\" >Go Back</a>");
	}

	/* Check if username is already in use */
	if(usernameTaken($_POST['user'])){
		$use = $_POST['user'];
		die("Sorry, the username: <strong>$use</strong> is already taken, please pick another one. <a href=\"register.php\" >Go Back</a>");
	}

	if($_POST['pass'] != $_POST['pass2'])
	{
		die("The passwords you entered do not match. <a href=\"register.php\" >Go Back</a>");
	}

	/* Add the new account to the database */
	$md5pass = md5($_POST['pass']);
	$_SESSION['reguname'] = $_POST['user'];
	$bd = $_POST['bdayy'] . "-" . $_POST['bdaym'] . "-" . $_POST['bdayd'];
	$_SESSION['regresult'] = addNewUser($_POST['rname'],$_POST['user'], $md5pass,$_POST['email'],$bd,$_POST['loc']);
	$_SESSION['registered'] = true;
	echo "<meta http-equiv=\"Refresh\" content=\"0;url=$HTTP_SERVER_VARS[PHP_SELF]\">";
	return;
} else {
	/**
	 * This is the page with the sign-up form, the names
	 * of the input fields are important and should not
	 * be changed. This REALLY needs to be redesigned.
	 */
	?>
		<html>
		<head>
		<title>Registration Page</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		</head>
		<body>

		<div class="cont">
		<h1>Register</h1>
		<form action="<? echo $HTTP_SERVER_VARS['PHP_SELF']; ?>" method="post">
		<table align="left" border="0" cellspacing="0" cellpadding="3">
		<tr><td>Real Name:</td><td><input type="text" name="rname" maxlength="30"></td></tr>
		<tr><td>Location:</td><td><input type="text" name="loc" maxlength="30"></td></tr>
		<tr><td>Email:</td><td><input type="text" name="email" maxlength="30"></td></tr>
		<tr><td>Birthday:</td><td>M: <input type="text" size="2" name="bdaym" maxlength="2">
		D: <input type="text" name="bdayd" size="2" maxlength="2">
		Y: <input type="text" name="bdayy" size="4" maxlength="4"></td></tr>
		<tr><td>Username:</td><td><input type="text" name="user" maxlength="30"></td></tr>
		<tr><td>Password:</td><td><input type="password" name="pass" maxlength="30"></td></tr>
		<tr><td>Password again:</td><td><input type="password" name="pass2" maxlength="30"></td></tr>
		<tr><td colspan="2" align="right"><input type="submit" name="subjoin" value="Join!"></td></tr>
		</table>
		</form>
		</div>
		</body>
		</html>
<?php } ?>

