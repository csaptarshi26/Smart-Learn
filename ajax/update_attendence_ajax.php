<!DOCTYPE html>
<html>
<head>
   <style>
     table, td, th {
     text-align:justify;
     padding-left:15px;
     border-radius:3px;
     font-size:18px;
}
   table {
    border-collapse: collapse;
    width: 100%;
    height: auto;
    border-radius:5px;
    margin-left:-1%;  
    margin-top:30px;
    background-color:white;
    overflow:scroll;
    margin-left:-50px;
}
input{
     width:20px;
     height:20px;
}
</style>
</head>
<body onLoad="show()">
          
     <?php
          session_start();
          include("../admin/connection.php");
          $date= $_GET['date'];
          $x=$_GET['x'];
          $search=$_GET['str'];
          $name=strtoupper($search);
          $stream=$_SESSION['stream'];
          $regyear=$_SESSION['year'];
          $sec=$_SESSION['sec'];
          $i=1;
          $sql="SELECT DISTINCT * FROM attendence WHERE stream='$stream' AND regyear='$regyear' AND section='$sec' AND section='$sec' AND date='$date' AND sname LIKE '%$name%' ORDER BY roll";
          $rs=mysql_query($sql,$connect);
          $num_rows = mysql_num_rows($rs);
          if($sec=='NA'){
               ?>
               <h3 style="margin-left:190px; margin-top:100px; color: #C82224;">Only Class Teacher Can View Attendence</h3>
               <?php               
               exit();
          }
          if($num_rows==0){?>
                   <h3 style="margin-left:180px; margin-top:100px; color: #C82224;"><?php echo $search; ?>&nbsp Not Found</h3>
               <?php
               exit();
               }
          if($x==0){?>
               <h3 style="margin-left:150px; margin-top:100px;color: #C82224;">IT's SUNDAY!!!</h3>
               <?php
               exit();
          }
          $rs=mysql_query("SELECT * FROM attendence WHERE date='$date' AND stream='$stream' AND section='$sec' AND regyear='$regyear",$connect);
          $num_rows = mysql_num_rows($rs);
          if($num_rows==0){?>
          
               <h3 style="margin-left:80px; margin-top:100px; color: #C82224;">ATTENDANCE WAS NOT GIVEN FOR DATE:::<?php echo $date; ?></h3>
               <?php
               exit();
          }
     ?>
     <button class="button2" id="mark" style="width: auto; height: 40px; font-size:16px">Update Attendance</button>
     <table>
          <tr style="background-color: #909090;color:white;">  
               <th>Name</th>
               <th>Class</th>
               <th>Roll No.</th>
               <th>Attendance<br><span style="padding-left:35px;">&nbsp;&nbsp;P&nbsp;&nbsp;&nbsp;&nbsp;A</span></th>  
          </tr>
          <?php 		               
              $sql="SELECT DISTINCT * FROM attendence WHERE stream='$stream' AND regyear='$regyear' AND date='$date' AND sname LIKE '%$name%' ORDER BY roll";
          $rs=mysql_query($sql,$connect);
          $num_rows = mysql_num_rows($rs);
          $curyear=date("Y");
          $m=date("m");
          if($m>=06) $year=$curyear-$regyear+1; else $year=$curyear-$regyear;
               while($row=mysql_fetch_array($rs))
               {
          ?>
                  <?php if($i%2==0){ ?> 
                              <tr style="background-color: #B2B2B2;">
                    <?php }
                           else{ ?> 
                              <tr style="background-color:white;"> 
                    <?php } ?>
                        <td><?=$row[0]?></td>
                         <td><?=$row[2]?> <?=$year?> <?=$row[4]?></td>
                         <td style="padding-left:50px"><?=$row[5]?></td>
                         <td style="padding-left:50px;"> 
                         <?php
                              if($row[7]=='P'){
                                   echo "<input type='radio' name='rating$i' value='P' id='x1' required checked><label></label>
                                        <input type='radio' name='rating$i' value='A' id='x2' required> <label></label>";
                              }
                              else{
                                   echo "<input type='radio' name='rating$i' value='P' id='x1' required ><label></label>
                                        <input type='radio' name='rating$i' value='A' id='x2' required checked> <label></label>";
                              }
                                 $i++;
                         
                          ?>
                         </td>
                   </tr>
          <?php
               }
                $_SESSION['nop']=$i; 
          ?> 
          </table>
          
</body>
</html>