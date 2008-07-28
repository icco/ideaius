<?php
/**
 * index.php
 * it's the god damned index
 */
session_start(); 
include("functions/func.php");
include("login.php");
$rev = "??";
print pgTop("Home");
?>

<?php if($logged_in)
{
	ideaBox(); 
	echo "<p>Logged in as " . $_SESSION['uname'] . ", <a href=\"logout.php\">logout</a></p>";
} else { displayLogin(); } ?>
<?php frontPGideas(); ?>
<p>You are in the <?php echo basename(getcwd()); ?>! Huzzah.</p>
</div>
<?php echo footer(); ?>
</body>
</html>
