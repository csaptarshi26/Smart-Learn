<?php
include("../connection.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="../css/del_style.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
    <title>Delete Student</title>
   
    </head>
    <div class="topheader" style="font-size:24px">
          <span style="color:#0565E7; padding-left:60px;">SMART</span><span style="color:white;">BOX</span>
     	<a href="../logout.php" style="float:right;"><i class="fa fa-power-off" aria-hidden="true"></i></a> 
    </div>
    <div></div>
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
                    <li><a href="student.php" >CREATE STUDENT ACCOUNT</a></li>
                    <li><a href="../faculty/faculty.php">CREATE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li><a href="" class="active">
                         <i class="fa fa-trash" aria-hidden="true" style="padding-right:10px;"></i>
                         DELETE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="del_student_select.php" class="active">DELETE STUDENT ACCOUNT</a></li>
                    <li><a href="../faculty/del_faculty.php">DELETE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
                <li><a href="">
                         <i class="fa fa-undo" aria-hidden="true" style="padding-right:9px;"></i>
                         UPDATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                    </a>
                    <ul class="submenu">
                    <li><a href="update_student_select.php">UPDATE STUDENT ACCOUNT</a></li>
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
               <li><a href="../assign_class_teacher.php" >
                    <i class="fa fa-universal-access" aria-hidden="true" style="padding-right:9px;"></i>ASSIGN CLASS TEACHER</a>
               </li> 
          </ul>
     </nav>
     <!-- --------------------------------------------------------------------------------------------------------------------------->
     <form action="del_student_valid.php" method="post" style="padding-top:100px;">
          <div class="tag" style="margin-left:350px;"><span >SELECT</span>
          <select class="input_form" style="margin-left:10px;"required name="stream" id="stream" onChange="return show1()">
                       <option value="" disabled selected>STREAM</option>
                       <option value="BCA">BCA</option>
                       <option value="BBA">BBA</option>
                  </select>
                  <select class="input_form" style="margin-left:50px;"required name="year" onChange="return show2()"  hidden="true"id="year">
                         <option value="" disabled selected>YEAR</option>
                         <option value="1">1st</option>
                         <option value="2">2nd</option>
                         <option value="3">3rd</option>
                  </select>
                  <select class="input_form" required name="section" style="margin-left:50px;" onChange="show(this.value)" hidden="true" id="sec">
                             <option value="" disabled selected>Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                   </select>
                  
                   <span  id="txtHint"></span> 
                    
       </div>
     </form>
     
</body>
</html>
<script>
     function show(sec){
          var stream=document.getElementById('stream').value;
          var year=document.getElementById('year').value;
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
        xmlhttp.open("GET","del_student_ajax.php?stream="+stream+"&year="+year+"&section="+sec,true);
        xmlhttp.send();
     }
 function selectall(source) {
          checkboxes = document.getElementsByName('checked[]');
          for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
          }
}
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
function show1(){
      document.getElementById('year').hidden=false;    
     }
function show2(){
     document.getElementById('sec').hidden=false;
}    
</script>