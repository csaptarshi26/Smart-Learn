<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
    <title>MENU</title>
    </head>
    <body>
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
                    <li><a href="student.php" class="active">CREATE STUDENT ACCOUNT</a></li>
                    <li><a href="../faculty/faculty.php">CREATE FACULTY ACCOUNT</a></li>
                    </ul>
               </li>
               <li><a href="">
                         <i class="fa fa-trash" aria-hidden="true" style="padding-right:10px;"></i>
                         DELETE ACCOUNT<i class="fa fa-caret-right" aria-hidden="true" style=" float:right"></i>
                     </a>
                    <ul class="submenu">
                    <li><a href="del_student_select.php">DELETE STUDENT ACCOUNT</a></li>
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
     <!-------------------------------------------------------------------------------------------------------------->
     <div style=" margin-left:-100px; padding-top:150px;" >
          <form action="student_valid.php" method="POST" name="form1" onSubmit="return validemail(document.form1.semail)">
               <div class="tag">
                    <input type="text" autofocus placeholder="Name" autocomplete="off" class="input_form" name="name" required  oninvalid="this.setCustomValidity('Enter Name Properly')" oninput="setCustomValidity('')" >
                </div>
             <div class="tag"><input type="email" placeholder="Email" autocomplete="off" class="input_form" name="email" required >
             <span id="error1" style="color:red;">   </span>       
             </div>
             <div class="tag">
                     <input placeholder="Registration No." class="input_form" type="text" required name="reg" autocomplete="off" maxlength="10" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Enter 10 digit Registration No.')" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                     <span style="margin-left:50px;"> OR</span>
             </div>
             <div class="tag" >
                  
                  <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" min="2014" max="2030" step="1" name="year" class="input_form" placeholder="Reg. Year" required style="width:100px;">
                  <select class="input_form" required name="stream" style="margin-left:45px;">
                        <option value="" disabled selected>Stream</option>
                       <option value="BCA">BCA</option>
                       <option value="BBA">BBA</option>
                  </select>
              </div>
              <div class="tag">
                   <select class="input_form" required name="section" >
                             <option value="" disabled selected>Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                       </select>
                   <input type="number" class="input_form roll" required name="roll" placeholder="Roll No." autocomplete="off" min="1" max="130" size="1" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" style="margin-left:45px; width:100px;" >
              </div>
             </div>
               <button class="button1" style="margin-left:450px; width:150px; height:40px; margin-top:10px;"name="ssubmit" >SUBMIT</button>
          </form>
     <!------------------------------------------------------------------------------------------------------------------------->
     <div class="upload">
               <form action="excel_upload_student.php" enctype="multipart/form-data" method="post">
               <input id="file" name="file" type="file" />
               <button name="submit" onClick="return upload()" style="width:120px; height:30px;">UPLOAD</button><br>
               <span id="error2" style="color:red;">   </span>
               </form>
     </div>
     </body>

</html>
<script>
     function validemail(inputtext){
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          var x=document.getElementsByName('semail');
          if(inputtext.value.match(mailformat)){return true;}
          else{
               document.getElementById('error1').hidden=false;
               document.getElementById('error1').innerHTML="*Enter Valid Email";
               document.form1.semail.focus();
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
