<?php
/*teacher(name varchar(50),email varchar(50) PRIMARY KEY,pass varchar(30),mobile varchar(10))*/
include("../connection.php");
$fname=$_POST['ffname'];
$lname=$_POST['flname'];
$email=$_POST['femail'];
$pass=$_POST['fpass'];
$mdpass=md5($pass);
$mobile=$_POST['fmobile'];
$name=$fname." ".$lname;
$stream="NA";
$regyear="0";
$sec="NA";
$sql="INSERT INTO teacher(name,email,pass,mobile,regyear,stream,section) VALUES(UPPER('$name'),'$email','$pass','$mobile','$regyear','$stream','$sec')";
$retval=mysql_query($sql,$connect);
if (!$retval) {
    die('COULD NOT insert into TABLE\n: ' . mysql_error());
}
echo "<script>
alert('successfully added');
window.location.href='../menu.php';
</script>";
?>