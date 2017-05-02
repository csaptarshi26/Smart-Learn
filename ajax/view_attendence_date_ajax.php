<!DOCTYPE html>
<html>
<head><link href="jquery-ui.css" rel="stylesheet">
<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.js"></script>

   <style>
     table, td, th {
     text-align:justify;
     padding-left:15px;
     font-size:17px;
     border-radius:3px;
     padding-top:5px;
     padding-bottom:5px;
}
  table {
    border-collapse: collapse;
    width: 90%;
    height: auto;
    border-radius:5px;
    margin-left:-1%;  
    margin-top:30px;
    background-color:white;
    overflow:scroll;
}
input{
     width:20px;
     height:20px;
}
th{
     padding-bottom:10px;
     padding-top:10px;
}
tr:hover td{
     background: #636363;
      color: #21CFA6;
}
   </style>
</head>
<body onLoad="show()">
          
     <?php
          session_start();
          include("../admin/connection.php");
          $date = $_GET['from'];
          $x=$_GET['x'];
          $stream=$_SESSION['stream'];
          $regyear=$_SESSION['year'];
          $sec=$_SESSION['sec'];
          if($sec=='NA'){
               ?>
               <h3 style="margin-left:190px; margin-top:100px; color: #C82224;">Only Class Teacher Can View Attendence</h3>
               <?php               
               exit();
          }
          if($x==0){?>
               <h3 style="margin-left:150px; margin-top:100px;color: #C82224;">IT's SUNDAY!!!</h3>
               <?php
               exit();
          }
          $rs=mysql_query("SELECT * FROM attendence WHERE date='$date' AND stream='$stream' AND section='$sec' AND regyear='$regyear'",$connect);
          $num_rows = mysql_num_rows($rs);
          if($num_rows==0){?>
          
               <h3 style="margin-left:80px; margin-top:100px; color: #C82224;">ATTENDANCE WAS NOT GIVEN FOR DATE:::<?php echo $date; ?></h3>
               <?php
               exit();
          }
     ?>
    
     <table>
          <tr style="background-color: #909090; color:white;" >  
               <th style="padding-left:40px;">NAME</th>
               <th>CLASS</th>
               <th>ROLL NO.</th>
               <th>TOTAL CLASS</th>
               <th>PRESENT</th>
          </tr>
          <?php 		               
              
               $i=1;
               $rs=mysql_query("SELECT * FROM attendence WHERE stream='$stream' AND regyear='$regyear' AND section='$sec' AND date='$date' ORDER BY roll",$connect);
               
               $num_rows = mysql_num_rows($rs);
               while($row=mysql_fetch_array($rs))
               {
               $curyear=date("Y");
               $m=date("m");
               if($m>=06) $year=$curyear-$row[3]+1; else $year=$curyear-$row[3];
          ?>
                    <?php if($i%2==0){?> 
                              <tr style="background-color: #ABABAB; color:#3F3F3F;">
                    <?php if($row[9]==0){?>
                              <tr style="color: #F35154; background-color: #B2B2B2; ">
                         <?php } } 
                           else{ ?> 
                              <tr style="background-color:#EBEBEB; color:#3F3F3F; "> 
                    <?php 
                              if($row[9]==0){?>
                              <tr style="color:#F35154;background-color:#EBEBEB;">
                          <?php } } ?>
                         <td><?=$row[0]?></td>
                         <td><?=$row[2]?> <?=$year?> <?=$row[4]?></td>
                         <td style="padding-left:50px;"><?=$row[5]?></td>
                         <td style="padding-left:50px;"><?=$row[8]?></td>
                         
                         <?php if($row[9]==0){?>
                              <td style="padding-left:50px;color: #F35154;">A</td>
                         <?php } 
                         else {?>
                              <td style="padding-left:50px;"><?=$row[9]?></td>
                         <?php } ?>
                   </tr>
          <?php
              $i++; }
                $_SESSION['nop']=$i; 
          ?> 
          </table>
          
</body>
</html>