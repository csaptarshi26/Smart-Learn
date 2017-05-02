<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
   <style>
     table, td, th {
     text-align:justify;
     padding-left:15px;
     border-radius:3px;
     font-size:18px;
     padding-top:5px;
     padding-bottom:5px;
}
     table {
    border-collapse: collapse;
    width: 95%;
    background-color:white;
    border-radius:5px;
    margin-left:-1%;  
    margin-top:30px; 
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
<body >
          
     <?php
          session_start();
          include("../admin/connection.php");
          $from = $_GET['from'];
          $to=$_REQUEST['to'];
          $stream=$_SESSION['stream'];
          $regyear=$_SESSION['year'];
          $sec=$_SESSION['sec'];
          $rs=mysql_query("SELECT sname,stream,regyear,section,roll,COUNT( DISTINCT date) FROM attendence WHERE stream='$stream' AND regyear='$regyear' AND section='$sec' AND date BETWEEN '$from' AND '$to' GROUP BY sname ORDER BY roll ",$connect);
          $rs1=mysql_query("SELECT sname,SUM(tclass),SUM(pclass) FROM attendence  WHERE stream='$stream' AND regyear='$regyear' AND section='$sec' AND date BETWEEN '$from' AND '$to' GROUP BY sname ORDER BY roll",$connect);
          $num_rows = mysql_num_rows($rs);
          if($sec=='NA'){?>
               <h3 style="margin-left:190px; margin-top:100px; color: #C82224;">Only Class Teacher Can View Attendence</h3>
               <?php               
               exit();
          }
          if($num_rows==0){?>
               <h3 style="margin-left:150px; margin-top:100px;color: #C82224;">NO CLASSES HELD FROM:--<?php echo $from ?> 
              &nbsp; TO:-- <?php echo $to ?></h3>
               <?php
               exit();
          }
      ?>
     <table>
          <tr style="background-color: #909090; color:white;">  
               <th >Name</th>
               <th>Class</th>
               <th>Roll No.</th>
               <th>Total Class</th>
               <th>Present</th>
               <th>Percentage</th>
          </tr>
          <?php 	
               $i=1;	               
               while($row=mysql_fetch_array($rs) AND $row1=mysql_fetch_array($rs1))
               { $curyear=date("Y");
               $m=date("m");
               if($m>=06) $year=$curyear-$row[2]+1; else $year=$curyear-$row[2]; 
          ?>
                    <?php if($i%2==0){ ?> 
                              <tr style="background-color: #ABABAB;color:#3F3F3F;">
                    <?php }
                           else{ ?> 
                              <tr style="background-color:#EBEBEB; color:#3F3F3F;"> 
                    <?php } ?>
                         <td><?=$row[0]?></td>
                         <td><?=$row[1]?> <?=$year?> <?=$row[3]?></td>
                         <td style="padding-left:50px"><?=$row[4]?></td>
                         <td style="padding-left:50px"><?=$row1[1]?></td>
                         <td style="padding-left:50px"><?=$row1[2]?></td>
                         <td style="padding-left:50px">
                         <?php
                         $x=($row1[2]/$row1[1])*100;
                         echo round($x,2);
                         ?> %</td>
                    </tr>
          <?php
               $i++;
               } 
          ?> 
          </table>
          
</body>
</html>
