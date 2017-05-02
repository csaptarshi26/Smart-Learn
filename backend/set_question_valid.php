<?php
session_start();
include("../admin/connection.php");
$sub=$_POST['subject'];
$date=$_POST['date'];
$time=$_POST['time'];
$sec=$_POST['section'];
$dur=$_POST['duration'];
$slno=$_POST['slno'];
$q_id=$sub.$sec.$date.$slno;
$question=$_POST['question'];
$option1=$_POST['o1'];
$option2=$_POST['o2'];
$option3=$_POST['o3'];
$option4=$_POST['o4'];
$coption=$_POST['correct'];
echo $q_id;
$sql=mysql_query("INSERT INTO question(q_id,paper_code,section,date,time,duration,question,option1,option2,option3,option4,c_option)
                    VALUES('$q_id','$sub','$sec','$date','$time','$dur','$question','$option1','$option2','$option3','$option4','$coption')",$connect);
if (!$sql) {
      echo "<script>
     alert('Error!!');
     window.location.href='../set_question.php';
     </script>";   
     exit(); 
}    
echo "<script>
     alert('successfully added');
     window.location.href='../set_question.php';
     </script>";
?>