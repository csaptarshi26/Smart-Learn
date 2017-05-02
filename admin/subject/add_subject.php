<?php
include("../connection.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
    <title>Add Question</title>
    <style>
    input[type=text]{
         width:100px;
    }
    i:hover{
         cursor:pointer;
    }
    </style>
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
                    <a href="../menu.php">
                    <i class="fa fa-tachometer" aria-hidden="true" style="padding-right:10px"></i>DASHBOARD</a>
               </li>
               <li>
                    <a href="">
                         <i class="fa fa-user-plus" aria-hidden="true" style="padding-right:5px;" ></i>
                          CREATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                         <ul class="submenu">
                         <li><a href="../student/student.php" >CREATE STUDENT ACCOUNT</a></li>
                         <li><a href="../faculty/faculty.php">CREATE FACULTY ACCOUNT</a></li>
                         </ul>
               </li>
               <li>
                    <a href="">
                         <i class="fa fa-trash" aria-hidden="true" style="padding-right:10px;"></i>
                         DELETE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="../student/del_student_select.php">DELETE STUDENT ACCOUNT</a></li>
                    <li><a href="../faculty/del_faculty.php">DELETE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li>
                    <a href="">
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
               <li><a href="#"  class="active" >
                    <i class="fa fa-book" aria-hidden="true" style="padding-right:9px;"></i>
                    SUBJECT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu">
                         <li><a href="#" class="active">ADD SUBJECT</a></li>
                         <li><a href="#">VIEW/UPDATE SUBJECT</a></li>
                    </ul>
                </li>
               <li><a href="../assign_class_teacher.php" >
                    <i class="fa fa-universal-access" aria-hidden="true" style="padding-right:9px;"></i>ASSIGN CLASS TEACHER</a>
               </li>               
          </ul>
     </nav>
     <!-- --------------------------------------------------------------------------------------------------------------------------->
     <div style=" margin-left:-130px; padding-top:150px; " >
     <form action="add_subject_valid.php" method="post">
               <div style="margin:0;padding:0">
                   <input type="text" name="paper_name" class="input_form" placeholder="Paper Name" required style="margin-right:30px;">
                   <input type="text" name="paper_code" placeholder="Paper Code" required>
               </div>
               <span id="txtHint"></span>
               <i class="fa fa-plus" aria-hidden="true" style=" margin-left:610px;" onClick="show()"></i><br>
               <button style=" margin-left:570px; margin-top:10px;">Submit</button>
         </form>
     </div>
     <!---------------------------------------------------------------------------------------------------------------------------->
     <div style="margin-left:850px; margin-top:-50px;">
      <form action="excel_subject_upload.php" enctype="multipart/form-data" method="post">
               <input type="file" name="file" id="file">
               <button onClick="return upload()" style="width:120px; height:30px;">UPLOAD</button><br>   
               <span id="error2" style="color: #DD2225;">   </span>
       </form>
              
     </div>
</body>
</html>
<script>
count=0;
function upload(){
          if(document.getElementById("file").value != "") return true;
          else{
               document.getElementById('error2').hidden=false;
               document.getElementById('error2').innerHTML="*Select File First";
               return false;
          }   
     }
function show(){
     count++;
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        str=1;
        xmlhttp.open("GET","add_subject_ajax.php?q="+count,true);
        xmlhttp.send();
              
}
</script>