<?php
     include("../connection.php");
     $count=0;
     if(empty($_REQUEST['checked'])) {
         echo "<script>
          alert('No Item Selected');
          window.location.href='del_student_select.php';
          </script>";
                    
     }
     else {
               if(isset($_POST['delete'])){
                   $email = $_POST['checked'];
                   echo $email[0];
                  foreach ($email as $id){
                  $sql="DELETE FROM student WHERE email='$id'";
                  mysql_query($sql, $connect);
                  }
          echo "<script>
               alert('Successfully Deleted');
               window.location.href='del_student_select.php';
               </script>";
          }
}
?>