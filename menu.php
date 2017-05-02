<?php
include("admin/connection.php");
session_start();

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/menu_style.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <title>MENU</title>
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
               <li style="margin-top:50px;"><a href="menu.php" class="active"><i class="fa fa-desktop" aria-hidden="true" style="margin-right:10px;"></i>DASHBOARD</a></li>
               <li><a href=""><i class="fa fa-hand-paper-o" aria-hidden="true" style="margin-right:10px;"></i>ATTENDANCE<i class="fa fa-chevron-right" aria-hidden="true" style="margin-left:110px;"></i></a>
                    <ul class="submenu">
                    <li><a href="mark_attendence.php">MARK ATTENDANCE</a></li>
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
     
     
</body>
</html>
