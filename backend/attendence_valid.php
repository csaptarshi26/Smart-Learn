<?php
session_start();
include("../admin/connection.php");
$date=$_POST['date'];
$stream=$_SESSION['stream'];
$regyear=$_SESSION['year'];  
$sec=$_SESSION['sec'];
$x=$_SESSION['nop'];
$tclass=$_POST['tclass'];
$i=1;
while($i<$x){
     $value[$i]=$_POST['rating'.$i];
     $pclass[$i]=$_POST['pclass'.$i];
     $i++;
 }
 $n=1;

              $rs=mysql_query("SELECT * FROM student WHERE stream='$stream' AND regyear='$regyear' AND section='$sec' ORDER BY roll",$connect);
              while($row=mysql_fetch_array($rs))
               {
                    $name=$row[0];
                    $email=$row[1];
                    $roll=$row[6];
                    mysql_query("INSERT INTO attendence(sname,semail,stream,regyear,section,roll,date,present,tclass,pclass) 
                                 VALUES('$name','$email','$stream','$regyear','$sec','".$roll."','$date','$value[$n]','$tclass','$pclass[$n]')",$connect);
                    $n++;
                     echo "<script>
alert('SUCCESS');
window.location.href='../mark_attendence.php';
</script>";
               }
?>
                    