<?php
session_start();
$dbhost  = 'localhost';
$dbuser  = 'root';
$dbpass  = '';
$connect = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$connect) {
    die('SERVER CONNECTION FAILED...\n: ' . mysql_error());
}
$name=$_POST['userid'];
$pass=$_POST['pass'];
$default_name = strtolower($name);
$default_pass=strtolower($pass);
$_SESSION['loggedin'] = true;
if ($default_name=='admin' and $default_pass=='admin') {
	header('location:menu.php');
}
else{
	echo "<script>
alert('Oops!!User Id or Password Is Incorrect');
window.location.href='index.php';
</script>";
}
?>