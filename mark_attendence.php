<?php
include("admin/connection.php");
session_start();
$min = new DateTime();
$min->modify("-7 days");
$max = new DateTime();
$stream=$_SESSION['stream'];
$regyear=$_SESSION['year'];
$sec=$_SESSION['sec'];
?>

<!doctype html>
<html><head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/atten_style.css">
    <title>Mark Attendence</title>
    <style>select{border-style:solid;border-width:1px;}</style>
    </head>
    <body>
   	 <div class="topheader"  style="font-size:24px">
     <span style="color:#0565E7; padding-left:60px;">SMART</span><span style="color:white;">BOX</span>
     <span style="float:right"><a href="logout.php" ><i class="fa fa-power-off" aria-hidden="true" style="padding-right:20px;"></i></a> </span>
    </div>
    <div></div>
    	<nav class="navigation">
          <ul class="mainmenu">
               <li style="font-size:24px; text-align:center;"><?php echo  $_SESSION['name']; ?><li>
               <li style="margin-top:50px;"><a href="menu.php"><i class="fa fa-desktop" aria-hidden="true" style="margin-right:10px;"></i>DASHBOARD</a></li>
              <li><a href="" class="active"><i class="fa fa-hand-paper-o" aria-hidden="true" style="margin-right:10px;"></i>ATTENDANCE<i class="fa fa-chevron-right" aria-hidden="true" style="margin-left:110px;"></i></a>
                    <ul class="submenu">
                         <li><a href="mark_attendence.php" class="active">MARK ATTENDANCE</a></li>
                         <li><a href="view_attendence.php">VIEW ATTENDANCE</a></li>
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
      
      <form action="backend/attendence_valid.php" method="post">
         <div style="padding-top:80px; margin-left:400px;">
          <?php if($sec=='NA'){
               ?>
               <h3 style="margin-left:20%; margin-top:100px; color: #C82224; font-size:24px;">Only Class Teacher Can Mark Attendence</h3>
               <?php               
               exit();
    }?>
          <span style="margin-left:30px;" id="x"> DATE:</span>  <input placeholder="&#xf271;" type="text" onfocus="(this.type='date')" onBlur="(this.type='text')" id="date" required max="<?php echo date("Y-m-d"); ?>" min=<?=$min->format("Y-m-d")?> style="width:200px;font-family:Arial, FontAwesome; height:20px; margin-left:10px;" name="date" oninput="show()" autocomplete="off">
             
          <span style="margin-left:10px;">No. Of Class</span> 
          <select style="width:auto" required id="class" onChange="show()" name="tclass" disabled>
             <option value="0" selected disabled></option>
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
function show(nclass){
    document.getElementById('class').disabled=false;
    str=document.getElementById('date').value;
    nclass=document.getElementById('class').value;
    var x=new Date(str).getDay();
    document.getElementById('class').focus();
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
        xmlhttp.open("GET","ajax/attendence_ajax.php?q="+str+"&x="+x+"&nclass="+nclass,true);
        xmlhttp.send();
              
}
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