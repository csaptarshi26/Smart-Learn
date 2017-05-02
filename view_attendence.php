<?php
include("admin/connection.php");
session_start();
$stream=$_SESSION['stream'];
$regyear=$_SESSION['year'];
$sec=$_SESSION['sec'];
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
        
    <title>View Attendence</title>
    <style>select{border-style:solid;border-width:1px;}</style>
    </head>
    <body >
   <div class="topheader"  style="font-size:24px">
     <span style="color:#0565E7; padding-left:60px;">SMART</span><span style="color:white;">BOX</span>
     <span style="float:right"><a href="logout.php" ><i class="fa fa-power-off" aria-hidden="true" style="padding-right:20px;"></i></a> </span>
    </div>
    <div></div>
    	<nav class="navigation">
          <ul class="mainmenu">
               <li style="font-size:24px; text-align:center;"><?php echo  $_SESSION['name']; ?>  <li>
               <li style="margin-top:50px;"><a href="menu.php" ><i class="fa fa-desktop" aria-hidden="true" style="margin-right:10px;"></i>DASHBOARD</a></li>
               <li><a href="" class="active"><i class="fa fa-hand-paper-o" aria-hidden="true" style="margin-right:10px;"></i>ATTENDANCE<i class="fa fa-chevron-right" aria-hidden="true" style="margin-left:110px;"></i></a>
                    <ul class="submenu">
                    <li><a href="mark_attendence.php">MARK ATTENDANCE</a></li>
                    <li><a href="" class="active">VIEW ATTENDANCE</a></li>
                    </ul>
               </li>
               <li><a href="update_attendence.php"><i class="fa fa-undo" aria-hidden="true" style="margin-right:10px;"></i>UPDATE ATTENDANCE</a></li>
                <li>
                    <a href=""><i class="fa fa-newspaper-o" aria-hidden="true" style="margin-right:10px;"></i>QUESTION<i class="fa fa-chevron-right" aria-hidden="true" style="margin-left:130px;"></i></a>
                    <ul class="submenu">
                    <li><a href="set_question.php">SET QUESTION</a></li>
                    <li><a href="view_question.php">VIEW/UPDATE QUESTION</a></li>
                    </ul>
               </li>
               
          </ul>
     </nav>
     <!-- --------------------------------------------------------------------------------------------------------------------------->
     <div style="padding-top:80px; margin-left:350px;">
     <?php if($sec=='NA'){
               ?>
               <h3 style="margin-left:25%; margin-top:100px; color: #C82224; font-size:24px;">Only Class Teacher Can View Attendence</h3>
               <?php               
               exit();
    }?>
          <span style="margin-left:50px;">Start Date:</span>
          <input placeholder="&#xf274; Start Date" type="text" onfocus="(this.type='date')" onBlur="(this.type='text')" id="from" required max="<?php echo date("Y-m-d"); ?>" style="width:200px; height:20px; margin-left:20px; font-family:Arial, FontAwesome;" name="date" oninput="show1(this.value)" autocomplete="off">
               
         <span style="margin-left:100px;"> End Date:</span>
         <input placeholder="&#xf273; End Date" type="text" onfocus="(this.type='date')" onBlur="(this.type='text')" id="to" required max="<?php echo date("Y-m-d"); ?>"style="width:200px; height:20px; margin-left:20px; font-family:Arial, FontAwesome;" name="date" oninput="show()" autocomplete="off">

         <span id="txtHint"></span>
    </div>
     
</body>
</html>
<script>
function show(){
    var from = document.getElementById('from').value;
    var to = document.getElementById('to').value;

    if( (new Date(from).getTime() >= new Date(to).getTime()))
    {
          alert("START DATE IS GREATER / EQUAL TO END DATE");
          document.getElementById('from').value='';
          document.getElementById('to').value='';
          document.getElementById('from').focus();
          return false;   
    }
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
        xmlhttp.open("GET","ajax/view_attendence_ajax.php?from="+from+"&to="+to,true);
        xmlhttp.send();
}
function show1(date){
    var from = document.getElementById('from').value;
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
        xmlhttp.open("GET","ajax/view_attendence_date_ajax.php?from="+from+"&x="+x,true);
        xmlhttp.send();
}
function varify(){
     v=document.getElementById('check').value;
     if(v==1){
          alert('hello');
     }
}
</script>