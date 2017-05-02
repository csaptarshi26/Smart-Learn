<?php
/*name varchar(30) ,
          email varchar(30) PRIMARY KEY,
          registration bigint(15) UNIQUE,
          regyear int(5) ,
          stream varchar(10),
          section varchar(5),
          roll int(3) ,
          password varchar(30)*/
include("../connection.php");
$name=$_POST['name'];
$email=$_POST['email'];
$reg=$_POST['reg'];
$stream=$_POST['stream'];
$sec=$_POST['section'];
$regyear=$_POST['year'];
$roll=$_POST['roll'];
 $arr=explode(' ',trim($name));
                    $pass=$arr[0]."@".substr($reg, -4);
$check=mysql_query("select email from student where email='$email'",$connect);
$checkrows=mysql_num_rows($check);
if($checkrows>0) {
     echo "<script>
     alert('Email Id Already Exists');
     window.location.href='student.php';
     </script>";
}
else{
     $sql = mysql_query("INSERT INTO student(name,email,registration,regyear,stream,section,roll,password)                           VALUES(UPPER('$name'),'$email','".$reg."','".$regyear."',UPPER('$stream'),'$sec','$roll','".$pass."')",$connect);
     if (!$sql) {
                        echo "<script>
                         alert('Error Occured!!!Data Already Exist');
                         window.location.href='student.php';
                         </script>";
                    }
     echo "<script>
     alert('successfully added');
     window.location.href='student.php';
     </script>";
}
?>