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
     	<a href="../logout.php" style="float:right;"><i class="fa fa-power-off" aria-hidden="true"></i></a> 
    </div>
    <nav class="navigation">
          <ul class="mainmenu">
               <li class="header"><span style="color:#16C390">ADMIN</span></li><hr>
               <li style="margin-top:50px;">
                    <a href="../menu.php" >
                         <i class="fa fa-tachometer" aria-hidden="true" style="padding-right:10px"></i>DASHBOARD</a>
               </li>
               <li><a href="" class="active">
                         <i class="fa fa-user-plus" aria-hidden="true" style="padding-right:5px;" ></i>
                          CREATE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="../student/student.php" >CREATE STUDENT ACCOUNT</a></li>
                    <li><a href="faculty.php" class="active">CREATE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li><a href="">
                         <i class="fa fa-trash" aria-hidden="true" style="padding-right:10px;"></i>
                         DELETE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="../student/del_student_select.php">DELETE STUDENT ACCOUNT</a></li>
                    <li><a href="del_faculty.php">DELETE FACULTY ACCOUNT</a></li>
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
               <li><a href="../assign_class_teacher.php" >
                    <i class="fa fa-universal-access" aria-hidden="true" style="padding-right:9px;"></i>ASSIGN CLASS TEACHER</a>
               </li>               
          </ul>
     </nav>
     <div style="padding-top:150px; margin-left:-100px; ">
       <form action="faculty_valid.php" method="POST" name="form1" onSubmit="return validemail(document.form1.femail)">
          <div class="tag">
               <input type="text" placeholder="First Name" pattern="[a-zA-Z]{3,}" autofocus autocomplete="off" class="input_form" name="ffname" required oninvalid="this.setCustomValidity('Enter First Name Properly')" oninput="setCustomValidity('')">
          </div>
          <div class="tag">
               <input type="text" placeholder="Last Name" pattern="[a-zA-Z]{3,}" autocomplete="off" class="input_form" name="flname" required
               oninvalid="this.setCustomValidity('Enter Last Name Properly')" oninput="setCustomValidity('')">
          </div>
          <div class="tag">
               <input type="email" placeholder="Email" autocomplete="off" class="input_form" name="femail" required>
               <span id="error1" style="color:red;"></span> 
               <span style="margin-left:50px;"> OR</span>
          </div>
          <div class="tag">
               <input type="password" placeholder="Password" autocomplete="off" class="input_form" name="fpass" required>
               
          </div>
          <div class="tag">
               <input type="text" placeholder="Mobile Number" autocomplete="off" class="input_form" name="fmobile"  required maxlength="10" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Enter 10 digit Mobile No.')" oninput="setCustomValidity('')">
          </div>
               <button class="button1" name="fsubmit" style="margin-left:550px; width:150px; height:40px; margin-top:10px;">SUBMIT</button>
          </form>
     </div>
     <!----------------------------------------------------------------------------------------------------------->
     <div class="upload">
               <form action="excel_upload_faculty.php" enctype="multipart/form-data" method="post">
               <input id="file" name="file" type="file" />
               <button name="submit" onClick="return upload()">UPLOAD</button><br>
               <span id="error2" style="color:red;">   </span>
               </form>
     </div>
</body>
</html>
<script>
     function validemail(inputtext){
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          var x=document.getElementsByName('femail');
          if(inputtext.value.match(mailformat)){return true;}
          else{
               document.getElementById('error1').hidden=false;
               document.getElementById('error1').innerHTML="*Enter Valid Email";
               document.form1.femail.focus();
               return false;
               }
     }
     function upload(){
          if(document.getElementById("file").value != "") return true;
          else{
               document.getElementById('error2').hidden=false;
               document.getElementById('error2').innerHTML="*Select File First";
               return false;
          }   
     }
</script>
