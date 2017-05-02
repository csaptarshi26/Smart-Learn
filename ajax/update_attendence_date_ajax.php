<!DOCTYPE html>
<html>
<head>
   <style>
     table, td, th {
     text-align:justify;
     padding-left:15px;
     font-size:18px;
     border-radius:3px;
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
          $date= $_GET['date'];
          $x=$_GET['x'];
          $sec=$_SESSION['sec'];
          $nclass=$_GET['nclass'];
          $stream=$_SESSION['stream'];
          $regyear=$_SESSION['year'];
          if($sec=='NA'){
               ?>
               <h3 style="margin-left:150px; margin-top:100px; color: #C82224;">Only Class Teacher Can View Attendence</h3>
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
     <button class="button2" id="mark" style="width: auto; height: 40px; font-size:16px" onClick="return check()">Update Attendance</button>
     <table>
          <tr style="background-color: #909090;color:white;">  
               <th>Name</th>
               <th>Class</th>
               <th>Roll No.</th>
               <th>Attendance<br><span style="padding-left:35px;">&nbsp;&nbsp;P&nbsp;&nbsp;&nbsp;&nbsp;A</span></th> 
          </tr>
          <?php 		               
               
               $curyear=date("Y");
               $m=date("m");
               if($m>=06) $year=$curyear-$regyear+1; else $year=$curyear-$regyear;
               $i=1;
               $rs=mysql_query("SELECT * FROM attendence WHERE stream='$stream' AND regyear='$regyear' AND section='$sec' AND date='$date' ORDER BY roll",$connect);
               $num_rows = mysql_num_rows($rs);
               while($row=mysql_fetch_array($rs))
               {
          ?>
                    <?php if($i%2==0){ ?> 
                              <tr style="background-color: #ABABAB; color:#3F3F3F;height:40px;">
                    <?php }
                           else{ ?> 
                              <tr style="background-color: #EBEBEB;color:#3F3F3F; height:40px;"> 
                    <?php } ?>
                         <td><?=$row[0]?></td>
                         <td><?=$row[2]?> <?=$year?> <?=$row[4]?></td>
                         <td style="padding-left:50px"><?=$row[5]?></td>
                         <td style="padding-left:50px;"> 
                         <?php
                              if($row[7]=='P'){
                               echo "<input type='radio' name='rating$i' value='P' id='x1' required checked onFocus='enable($i)'><label></label>
                                        <input type='radio' name='rating$i' value='A' id='x2' required onFocus='disable($i)'> <label></label>";
                                if($nclass){
                                if($i%2==0){ ?> 
                                     <select id="ppclass<?=$i?>" name="pclass<?=$i?>" style="width:40px;background-color:white; height:25px;">
                                         <?php }
                                   else{ ?> 
                                    <select id="ppclass<?=$i?>" name="pclass<?=$i?>" style="width:40px;background-color: #B2B2B2; height:25px;"> 
                                   <?php } 
                                    $j=$nclass;
                                           while($j>=0){?>
                                                  <option value="<?=$j?>"><?=$j?> </option>
                                           <?php $j--; } ?>
                                    </select>
                           <?php } 
                             }
                              else{
                               echo "<input type='radio' name='rating$i' value='P' id='x1' required onFocus='enable($i)'><label></label>
                                 <input type='radio' name='rating$i' value='A' id='x2' required checked onFocus='disable($i)'> <label></label>";
                                    if($nclass){
                               ?>
                             <?php if($i%2==0){ ?> 
                                 <select hidden="true"id="ppclass<?=$i?>" name="pclass<?=$i?>" style="width:40px;background-color:white; height:25px;">
                                         <?php }
                                   else{ ?> 
                                    <select hidden="true" id="ppclass<?=$i?>" name="pclass<?=$i?>" style="width:40px;background-color: #B2B2B2; height:25px;"> 
                                   <?php } 
                                    $j=$nclass;
                                           while($j>0){?>
                                                  <option value="0" hidden="true" selected>0</option>
                                                  <option value="<?=$j?>"><?=$j?> </option>
                                           <?php $j--; } ?>
                                    </select>
                           <?php } 
                               
                        
                              }?>
                                 
                         </td>
                   </tr>
          <?php
              $i++; }
                $_SESSION['nop']=$i; 
          ?> 
          </table>
          
</body>
</html>