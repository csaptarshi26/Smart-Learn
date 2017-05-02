<?php
include("connection.php");
$stream=$_POST['stream'];
$year=$_POST['year'];
$curyear=date("Y");
$m=date("m");
if($m>=06) $regyear=$curyear-$year+1; else $regyear=$curyear-$year;
$sec=$_POST['section'];
$temail=$_POST['teacher'];
$sql="UPDATE teacher SET regyear='$regyear',stream='$stream',section='$sec' where email='$temail'";
mysql_query($sql,$connect);
echo "<script>
          alert('SUCCESS');
          window.location.href='assign_class_teacher.php';
          </script>";
?>