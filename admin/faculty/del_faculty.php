<?php
/*student(name varchar(50),email varchar(50) PRIMARY KEY,dob date,stream varchar(10),year varchar(10),roll varchar(3))";*/
include("../connection.php");
$sql="select * from teacher ORDER BY name";
$rs=mysql_query($sql,$connect);
$num_rows = mysql_num_rows($rs);
if($num_rows==0){
     echo "<script>
	alert('Nothing To Display');
	window.location.href='../menu.php';
	</script>";
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="../css/del_style.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
    <title>MENU</title>
    </head>
    <body >
   	<div class="topheader" style="font-size:24px">
          <span style="color:#0565E7; padding-left:60px;">SMART</span><span style="color:white;">BOX</span>
     	<a href="../logout.php" style="float:right;"><i class="fa fa-power-off" aria-hidden="true"></i></a> 
    </div>
    	<nav class="navigation">
          <ul class="mainmenu">
               <li class="header"><span style="color:#16C390">ADMIN</span></li><hr>
               <li style="margin-top:50px;">
                    <a href="../menu.php" >
                         <i class="fa fa-tachometer" aria-hidden="true" style="padding-right:10px"></i>DASHBOARD</a>
               </li>
               <li><a href="">
                         <i class="fa fa-user-plus" aria-hidden="true" style="padding-right:5px;" ></i>
                          CREATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="../student/student.php" >CREATE STUDENT ACCOUNT</a></li>
                    <li><a href="faculty.php">CREATE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li><a href="" class="active">
                         <i class="fa fa-trash" aria-hidden="true" style="padding-right:10px;"></i>
                         DELETE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="../student/del_student_select.php" >DELETE STUDENT ACCOUNT</a></li>
                    <li><a href="del_faculty.php" class="active">DELETE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
                <li><a href="">
                         <i class="fa fa-undo" aria-hidden="true" style="padding-right:9px;"></i>
                         UPDATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                    </a>
                    <ul class="submenu">
                    <li><a href="../student/update_student_select.php">UPDATE STUDENT ACCOUNT</a></li>
                    <li><a href="#">UPDATE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li><a href="#" >
                    <i class="fa fa-hand-paper-o" aria-hidden="true" style="padding-right:9px;"></i>
                    ATTENDANCE<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu3">
                         <li><a href="../attendance/admin_mark_attendance.php">MARK ATTENDANCE</a></li>
                         <li><a href="#">VIEW ATTENDANCE</a></li>
                         <li><a href="#">UPDATE ATTENDANCE</a></li>
                    </ul>
                </li>
               <li><a href="#" >
                    <i class="fa fa-book" aria-hidden="true" style="padding-right:9px;"></i>
                    SUBJECT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu">
                         <li><a href="../subject/add_subject.php">ADD SUBJECT</a></li>
                         <li><a href="#">VIEW/UPDATE SUBJECT</a></li>
                    </ul>
                </li>
                <li ><a href="../assign_class_teacher.php" >
                    <i class="fa fa-universal-access" aria-hidden="true" style="padding-right:9px;"></i>ASSIGN CLASS TEACHER</a>
                </li>
          </ul>
     </nav>
     <!-- --------------------------------------------------------------------------------------------------------------------------->
     <form action="del_faculty_valid.php" method="post" style="padding-top:100px;">
          <table style="margin-top:10px;font-size:18px; margin-left:350px; background-color:white; border-radius:10px;">
                <tr >  
                    <th ></th>
                    <th >NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE NO.</th>
                    <th>CLASS TEACHER</th>
                </tr>
                <br>
               <?php 		
               $sql="select * from teacher ORDER BY name";
               $rs=mysql_query($sql,$connect);
               while($row=mysql_fetch_array($rs))
               {
          ?>
                    <tr>
                         <td><input type="checkbox" name="checked[]" value="<?=$row['1']?>"></td>
                         <td><?=$row[0]?></td>
                         <td><?=$row[1]?></td>
                         <td><?=$row[3]?></td>
                         <?php
                              if($row[4]==0) {?>
                                   <td style="padding-left:40px;">NOT YET</td>  
                              <?php } else{  $year=date("Y")-$row[4];?>
                                       <td style="padding-left:40px;"><?=$row[5]?> <?=$year?> <?=$row[6]?> </td>
                                       <?php } ?>                                
                        </tr>
                    
          <?php
                    }
          ?>
            <input type="checkbox"  onClick="selectall(this)" style="margin-left:555px;"> Select All
           <button class="button2" name="delete" onClick="return valid()">DELETE</button>     
            </table>
        </form>
     
     
</body>
</html>
<script type="text/javascript">
	function valid() {
          var chx = document.getElementsByTagName('input');
          for (var i=0; i<chx.length; i++) {
               if (chx[i].type == 'checkbox' && chx[i].checked) {
                     return true;
               } 
          }
          
          alert("Please select student to procede");
          return false;
     }
     function selectall(source) {
          checkboxes = document.getElementsByName('checked[]');
          for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
          }
}
</script>