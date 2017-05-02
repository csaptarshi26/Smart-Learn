<?php
include("admin/connection.php");
session_start();
$stream=$_SESSION['stream'];
$regyear=$_SESSION['year'];
$sec=$_SESSION['sec'];
$curyear=date("Y");
$m=date("m");
if($m>=06) $year=$curyear-$regyear+1; else $year=$curyear-$regyear;
$rs=mysql_query("SELECT * from subject WHERE year='$year'",$connect);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <title>Question</title>
    <style>select{border-style:solid;border-width:1px;}</style>
    </head>
    <body >
   	 <div class="topheader"  style="font-size:24px">
     <span style="color:#0565E7; padding-left:60px;">SMART</span><span style="color:white;">LEARN</span>
     <span style="float:right"><a href="logout.php" ><i class="fa fa-power-off" aria-hidden="true" style="padding-right:20px;"></i></a> </span>
    </div>
    <div></div>
    	<nav class="navigation">
          <ul class="mainmenu">
               <li style="font-size:24px; text-align:center;"><?php echo  $_SESSION['name']; ?>  <li>
               <li style="margin-top:50px;"><a href="menu.php"><i class="fa fa-desktop" aria-hidden="true" style="margin-right:10px;"></i>DASHBOARD</a></li>
               <li><a href=""><i class="fa fa-hand-paper-o" aria-hidden="true" style="margin-right:10px;"></i>ATTENDANCE<i class="fa fa-chevron-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu">
                    <li><a href="mark_attendence.php">MARK ATTENDANCE</a></li>
                    <li><a href="view_attendence.php">VIEW ATTENDANCE</a></li>
                    </ul>
               </li>
               <li>
                    <a href="update_attendence.php">
                    <i class="fa fa-undo" aria-hidden="true" style="margin-right:10px;"></i>UPDATE ATTENDANCE</a>
               </li>
               <li>
                    <a href="" class="active"><i class="fa fa-newspaper-o" aria-hidden="true" style="margin-right:10px;"></i>QUESTION<i class="fa fa-chevron-right" aria-hidden="true" style=" float:right"></i></a>
                    <ul class="submenu">
                    <li><a href="#" class="active">SET QUESTION</a></li>
                    <li><a href="view_question.php">VIEW/UPDATE QUESTION</a></li>
                    </ul>
               </li>
               
          </ul>
     </nav>
     <!-- --------------------------------------------------------------------------------------------------------------------------->
   <form action="backend/set_question_valid.php" method="post">
   <div style="padding-top:100px; margin-left:300px;">
    <?php if($sec=='NA'){
               ?>
               <h3 style="margin-left:25%; margin-top:100px; color: #C82224; font-size:24px;">Only Class Teacher Can Set Question</h3>
               <?php               
               exit();
    }?>
   <span> Subject:</span>
   <select class="input_form" style="font-family:'FontAwesome',Helvetica;margin-left:5px; width:100px;" required name="subject" id="subject" oninput="show()" onChange=" visible()">
        <option value="q" disabled selected hidden="true">&#xf02d;</option>
        <?php while($row=mysql_fetch_array($rs)) { ?>
          <option value="<?=$row[1]?>"><?=$row[0]?></option>
        <?php } ?>
   </select>
   
   <span style="margin-left:20px;" hidden="true" id="spand">Date:</span>
   <input placeholder="&#xf271;" type="text" onfocus="(this.type='date')" onBlur="(this.type='text')" id="date" required min="<?php echo date("Y-m-d"); ?>" style="width:150px;font-family:Arial, FontAwesome;height:25px;margin-left:5px; padding-left:5px;" name="date" autocomplete="off" oninput="show()" hidden="true" onChange="visible1()">
   
   
   <span id="txtHint"></span>
   </div>
</body>
</html>
<script>
function show(){
    subject=document.getElementById('subject').value;
    date=document.getElementById('date').value;
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
        };
        xmlhttp.open("GET","ajax/set_question_ajax.php?date="+date+"&sub="+subject+"&x="+x,true);
        xmlhttp.send();
              
}
function visible(){
     document.getElementById('spand').hidden=false;
     document.getElementById('date').hidden=false;
}
function upload(){
     time=document.getElementById('time');
     dur=document.getElementById('duration');
     sec=document.getElementById('sec');
     if(time.value==''){
          alert('Set Time And Then Proceed');
          return false;
     }
     if(dur.value==''){
          alert('Set duration And Then proceed');
          return false;    
     }
     if(sec.value==''){
          alert('Set Section And Then proceed');
          return false;    
     }
     if(document.getElementById("file").value != "") return true;
     else{
          document.getElementById('error2').hidden=false;
          document.getElementById('error2').innerHTML="*Select File First";
          return false;
     }   
}
function x(){
     time=document.getElementById('time').value;
     dur=document.getElementById('duration').value;
     sec=document.getElementById('sec').value;
     document.getElementById('vtime').value=time;
     document.getElementById('vdur').value=dur;
     document.getElementById('vsec').value=sec;    
}
</script>
