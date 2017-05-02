<!DOCTYPE html>
<html>
<head>
   <style>
     table, td, th {
     text-align:justify;
     padding-left:15px;
     font-size:18px;
     border-radius:3px;
     height:auto;
}
     table {
    border-collapse: collapse;
    width: 100%;
    height: auto;
    border-radius:10px;  
    margin-top:30px;
    overflow:scroll;
    margin-left:-70px;
}
input{
     width:20px;
     height:20px;
}
select{border-style:solid;border-width:1px;}
input[type=number]{
     width:40px;
}
tr:hover td{
     background: #636363;
     color: #21CFA6;
}
</style>

</head>
<body onLoad="show()" >
          
     <?php
          session_start();
          include("../admin/connection.php");
          $d = $_GET['q'];
          $x=$_GET['x'];
          $nclass=$_GET['nclass'];
          $stream=$_SESSION['stream'];
          $regyear=$_SESSION['year'];
          $sec=$_SESSION['sec'];
          if($x==0){?>
               <h3 style="margin-left:150px; margin-top:100px;color: #C82224;">IT's SUNDAY!!!</h3>
               <?php
               exit();
          }
          if($sec=='NA'){
               ?>
               <h3 style="margin-left:80px; margin-top:100px; color: #C82224;">Only Class Teacher Can Mark Attendence</h3>
               <?php               
               exit();
          }
          $rs=mysql_query("SELECT * FROM attendence WHERE date='$d' AND stream='$stream' AND section='$sec' AND regyear='$regyear'",$connect);
          $num_rows = mysql_num_rows($rs);
          if($num_rows!=0){?>
               <h3 style="margin-left:80px; margin-top:100px; color: #C82224;">ATTENDANCE ALREADY GIVEN ON:::<?php echo $d; ?></h3>
               <?php               
               
               exit();
          }
     ?>
      <button class="button2" id="mark" style="width: auto; height: 40px; font-size:16px" onClick=" return check()">Mark Attendance</button>
     <table >
          <tr style="background-color: #909090;color:white;">
               <th style="padding-left:50px; width:350px;">Name</th>
               <th style="padding-left:20px;">Class</th>
               <th>Roll No.</th>
               <th align="center">Attendance<br><span style="padding-left:28px;font-size:16px;">P</span><span style="padding-left:22px;font-size:16px;">A</span></th> 
          </tr>
          
          <?php 		               
               $curyear=date("Y");
               $m=date("m");
               if($m>=06) $year=$curyear-$regyear+1; else $year=$curyear-$regyear;
               $i=1;
               echo $stream,$regyear,$sec;
               $rs=mysql_query("SELECT * FROM student WHERE stream='$stream' AND regyear='$regyear' AND section='$sec' ORDER BY roll",$connect);
               $num_rows = mysql_num_rows($rs);
               while($row=mysql_fetch_array($rs))
               {
          ?>        <tbody>
                    <?php if($i%2==0){ ?> 
                              <tr style="background-color: #ABABAB; color:#3F3F3F;height:40px;">
                    <?php }
                           else{ ?> 
                              <tr style="background-color: #EBEBEB;color:#3F3F3F; height:40px;"> 
                    <?php } ?>
                     
                         <td style="padding-left:20px;"><?=$row[0]?></td>
                         <td style="padding-left:20px;"><?=$row[4]?> <?=$year?> <?=$row[5]?></td>
                         <td style="padding-left:50px;"><?=$row[6]?></td>
                         <td style="padding-left:35px;"> 
                              <?php 
                                echo "  
                                     <input type='radio' name='rating$i' value='P' id='x1' required checked onClick='enable($i)'><label></label>
                                     <input type='radio' name='rating$i' value='A' id='x2' required onClick='disable($i)'> <label></label>
                                  ";
                                   
                            if($nclass){
                               ?>
                                    <select id="ppclass<?=$i?>" name="pclass<?=$i?>" style="width:40px;background-color: white; height:25px;"> 
                                   <?php 
                                    $j=$nclass;
                                           while($j>=0){?>
                                                  <option value="<?=$j?>"><?=$j?> </option>
                                           <?php $j--; } ?>
                                    </select>
                           <?php } ?>
                               
                         </td>
                   </tr>
                   </tbody>
          <?php
               $i++;}
                $_SESSION['nop']=$i; 
          ?> 
          </table>
</body>
</html>
