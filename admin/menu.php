<?php
include("connection.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <title>MENU</title>
    </head>
    <body >
   	<div class="topheader" style="font-size:24px">
          <span style="color:#0565E7; padding-left:60px;">SMART</span><span style="color:white;">LEARN</span>
     	<a href="logout.php" style="float:right;"><i class="fa fa-power-off" aria-hidden="true"></i></a> 
    </div>
    <div></div>
    	<nav class="navigation">
          <ul class="mainmenu">
               <li class="header"><span style="color:#16C390">ADMIN</span></li><hr>
               <li style="margin-top:50px;">
                    <a href="menu.php" class="active">
                    <i class="fa fa-tachometer" aria-hidden="true" style="padding-right:10px"></i>DASHBOARD</a>
               </li>
               <li>
                    <a href="">
                         <i class="fa fa-user-plus" aria-hidden="true" style="padding-right:5px;" ></i>
                          CREATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                         <ul class="submenu">
                         <li><a href="student/student.php" >CREATE STUDENT ACCOUNT</a></li>
                         <li><a href="faculty/faculty.php">CREATE FACULTY ACCOUNT</a></li>
                         </ul>
               </li>
               <li>
                    <a href="">
                         <i class="fa fa-trash" aria-hidden="true" style="padding-right:10px;"></i>
                         DELETE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="student/del_student_select.php">DELETE STUDENT ACCOUNT</a></li>
                    <li><a href="faculty/del_faculty.php">DELETE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li>
                    <a href="">
                         <i class="fa fa-undo" aria-hidden="true" style="padding-right:9px;"></i>
                         UPDATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                    </a>
                    <ul class="submenu">
                    <li><a href="student/update_student_select.php">UPDATE STUDENT ACCOUNT</a></li>
                    <li><a href="#">UPDATE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li><a href="#" >
                    <i class="fa fa-hand-paper-o" aria-hidden="true" style="padding-right:9px;"></i>
                    ATTENDANCE<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu3">
                         <li><a href="attendance/admin_mark_attendance.php">MARK ATTENDANCE</a></li>
                         <li><a href="#">VIEW ATTENDANCE</a></li>
                         <li><a href="#">UPDATE ATTENDANCE</a></li>
                    </ul>
                </li>
               <li><a href="#" >
                    <i class="fa fa-book" aria-hidden="true" style="padding-right:9px;"></i>
                    SUBJECT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu">
                         <li><a href="subject/add_subject.php">ADD SUBJECT</a></li>
                         <li><a href="#">VIEW/UPDATE SUBJECT</a></li>
                    </ul>
                </li>
               <li><a href="assign_class_teacher.php" >
                    <i class="fa fa-universal-access" aria-hidden="true" style="padding-right:9px;"></i>ASSIGN CLASS TEACHER</a>
               </li>               
          </ul>
     </nav>
     <!-- --------------------------------------------------------------------------------------------------------------------------->
     
     
     
</body>
</html>
