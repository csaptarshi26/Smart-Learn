<?php
include("../admin/connection.php");
session_start();
$userid=$_POST['uid'];
$pass=$_POST['password'];
echo $userid,$pass;
$sql="SELECT * from teacher where email='$userid'";
$res=mysql_query($sql,$connect);
$row = mysql_fetch_assoc($res);
if( $row['pass'] == ($pass) ){
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['pass'] = $row['pass'];
    $_SESSION['stream']=$row['stream'];
    $_SESSION['year']=$row['regyear'];
    $_SESSION['sec']=$row['section'];
    $_SESSION['loggedin'] = true;
    header('Location:../menu.php');  
    exit();
}
else{
    echo "<script>
alert('Oops!!Password Doesnot Match');
window.location.href='../index.php';
</script>";
}
?>