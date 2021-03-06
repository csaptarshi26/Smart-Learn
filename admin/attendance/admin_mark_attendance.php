<?php
include("../connection.php");
$min = new DateTime();
$min->modify("-7 days");
$max = new DateTime();

?>

<!doctype html>
<html>
<head>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="../css/menu_style.css">
     <link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
     <title>FACULTY</title>
</head>

<body >
     <div class="topheader" style="font-size:24px">
          <span style="color:#0565E7; padding-left:60px;">SMART</span><span style="color:white;">BOX</span>
     	<a href="logout.php" style="float:right;"><i class="fa fa-power-off" aria-hidden="true"></i></a> 
    </div>
    <nav class="navigation">
          <ul class="mainmenu">
               <li class="header"><span style="color:#16C390">ADMIN</span></li><hr>
               <li style="margin-top:50px;">
                    <a href="../menu.php" >
                         <i class="fa fa-tachometer" aria-hidden="true" style="padding-right:10px;"></i>DASHBOARD</a>
               </li>
               <li><a href="">
                         <i class="fa fa-user-plus" aria-hidden="true" style="padding-right:5px;" ></i>
                          CREATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="../student/student.php" >CREATE STUDENT ACCOUNT</a></li>
                    <li><a href="../faculty/faculty.php" >CREATE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li><a href="">
                         <i class="fa fa-trash" aria-hidden="true" style="padding-right:10px;"></i>
                         DELETE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="../student/del_student_select.php">DELETE STUDENT ACCOUNT</a></li>
                    <li><a href="../faculty/del_faculty.php">DELETE FACULTY ACCOUNT</a></li>
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
               <li><a href="#" class="active">
                    <i class="fa fa-hand-paper-o" aria-hidden="true" style="padding-right:9px;"></i>
                    ATTENDANCE<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu3">
                         <li><a href="#" class="active">MARK ATTENDANCE</a></li>
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
     <!----------------------------------------------------------------------------------------------------------------->
     <form action="assign_class_teacher_valid.php" method="post" style="padding-top:100px; margin-left:300px;">
          <div class="tag"  >
               <select class="input_form" style="margin-left:10px;"required name="stream" id="stream" onChange="show()" oninput="x()">
                            <option value="stream" disabled selected hidden="true">STREAM</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
              </select>
             <select  style="margin-left:50px;"required name="year" id="year" onChange="show()" hidden="true" oninput="x1()">
                    <option value="year" disabled selected hidden="true">YEAR</option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
             </select>
              <select style="margin-left:50px;" required name="section" onChange="show()" id="sec" hidden="true" oninput="x2()">
                            <option value="sec" disabled selected hidden="true">Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
              </select>
              <input placeholder="&#xf271; Date" type="text" onfocus="(this.type='date')" onBlur="(this.type='text')" id="date" required max="<?php echo date("Y-m-d"); ?>" min=<?=$min->format("Y-m-d")?> style="width:150px;font-family:Arial, FontAwesome; height:25px; margin-left:30px;" name="date" oninput="show()" autocomplete="off" hidden="true">
              
          <select style="width:auto" required id="class" onChange="show()" name="tclass" >
             <option value="0" selected disabled hidden="true">No. Of Class</option>
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
           </select>  
          
              <span id="txtHint"></span>
       </div>
       
     </form>
</body>
</html>
<script>
function show(){
    sec=document.getElementById('sec').value;
    stream=document.getElementById('stream').value;
    year=document.getElementById('year').value;
    date=document.getElementById('date').value;
    nclass=document.getElementById('class').value;
    var x=new Date(date).getDay();
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
        }
        xmlhttp.open("GET","admin_attendance_ajax.php?stream="+stream+"&year="+year+"&sec="+sec+"&x="+x+"&date="+date+"&nclass="+nclass,true);
        xmlhttp.send();
}
function x(){document.getElementById('year').hidden=false;}
function x1(){document.getElementById('sec').hidden=false;}
function x2(){document.getElementById('date').hidden=false;}
function check(){
      nclass=document.getElementById('class').value;
      if(nclass==0){
           alert("select number of class");
           document.getElementById('class').focus();
           return false;
      }
}
function disable(n){
     var y='ppclass'+n;
     document.getElementById(y).hidden=true;
     document.getElementById(y).value='0';
}
function enable(n){
     var y='ppclass'+n;
     document.getElementById(y).hidden=false;    
     document.getElementById(y).value=document.getElementById('class').value;
}

</script>