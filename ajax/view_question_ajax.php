<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
     <style>
          input{margin-bottom:10px;width:200px;height:40px;}
          input[type=file]{width:250px; margin-left:20px;}
          input[type=file]:hover{border-style:none;}
          button{border-radius:4px;width:100px;border-style:none;background-color:#8E8E8E;}
          button:hover{ background-color: #636363;color:white; }
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
              margin-left:-45px;
         }
         select{border-style:solid;border-width:1px;}
         tr:hover td{background: #636363;color: #21CFA6;}
     </style>
</head>
<body onLoad="show()" >
          
     <?php
          session_start();
          include("../admin/connection.php");
          $date = $_GET['date'];
          $sub =$_GET['sub'];
          $x=$_GET['x'];
          $stream=$_SESSION['stream'];
          $regyear=$_SESSION['year'];
          $sec=$_SESSION['sec'];
          $rs=mysql_query("SELECT MAX(q_id) FROM question where date='$date' AND paper_code='$sub'",$connect);
          $rs1=mysql_query("SELECT * FROM question where date='$date' AND paper_code='$sub'",$connect);
          if($x=='NaN'){
               exit();
          }
          if($x==0){?>
               <h3 style="margin-left:150px; margin-top:100px;color: #C82224;">IT's SUNDAY!!!</h3>
               <?php
               exit();
          }
          if($sec=='NA'){
               ?>
               <h3 style="margin-left:80px; margin-top:100px; color: #C82224;">Only Class Teacher Can Add Question</h3>
               <?php               
               exit();
          }?>
       <!------------------------------------------------------------------------------------------------------------------------->
          <?php
          $row=mysql_fetch_array($rs);
          $row1=mysql_fetch_array($rs1);
          $num_rows = mysql_num_rows($rs1);
          if($num_rows==0){?>
           <h3 style="margin-left:180px; margin-top:100px; color: #C82224;">Question Not Uploaded For: <?=$date?></h3>
             
                         <!--------------------------------------------------------------->
   <?php exit(); }//end of if 
     else {$slno=substr($row[0], -1)+1;
          $i=$row1['duration'];
     ?>
          <span style="margin-left:30px;">Time:</span>
          <input type="text" placeholder="&#xf017;" name="time" style="width:80px;font-family:Arial, FontAwesome;height:25px;margin-left:5px;" onfocus="(this.type='time')" onBlur="(this.type='text')" id="time" autocomplete="off" readonly value="<?=$row1['time']?>"oninput="x()">
   
          <span style="margin-left:20px;">Duration:</span>
          <select class="input_form" style="font-family:'FontAwesome',Helvetica;margin-left:5px; width:90px;"required name="duration" id="duration" oninput="x()">
      <option value="<?=$i?>" selected><?php $x=floor($i/60);$y=$i%60; if($y==0){ echo $x." : 00 Hr";} else { echo $x." : "."$y Hr";}?></option>
           </select>
           <span style="margin-left:20px;">Section:</span>
             <select name="section" id="sec" style="font-family:'FontAwesome',Helvetica;" required oninput="x()">
                  <option value="<?=$row1['section']?>" selected><?=$row1['section']?></option>
              </select>
          <?php }?>
      <!-------------------------------------------------------------------------------------------------------------------------->
      <div style="margin-top:40px; margin-left:40px;">
      <table >
          <tr style="background-color: #909090;color:white;">
               <th style="padding-left:20px;">SL NO.</th>
               <th style="padding-left:20px;">QUESTION</th>
               <th>OPTION1</th><th>OPTION2</th><th>OPTION3</th><th>OPTION4</th>
               <th>ANSWER</th>
          </tr>
          
          <?php 		               
               $i=1; 
               $result=mysql_query("SELECT * FROM question where date='$date' AND paper_code='$sub'",$connect);   
               while($row=mysql_fetch_array($result))
               {
          ?>        <tbody>
                        <?php if($i%2==0){ ?> 
                             <tr style="background-color: #ABABAB; color:#3F3F3F;height:40px;">
                    <?php }
                           else{ ?> 
                              <tr style="background-color: #EBEBEB;color:#3F3F3F; height:40px;"> 
                    <?php } ?>
                         <td style="padding-left:20px;"><?=$i;$i++;?></td>
                         <td style="padding-left:20px; width:300px;"><?=$row['question']?></td>
                         <td style="padding-left:50px; width:120px;"><?=$row['option1']?></td>
                         <td style="padding-left:50px; width:120px;"><?=$row['option2']?></td>
                         <td style="padding-left:50px; width:120px;"><?=$row['option3']?></td>
                         <td style="padding-left:50px; width:120px;"><?=$row['option4']?></td>
                         <td style="padding-left:50px; width:120px;"><?=$row['c_option']?></td>                           
                   </tr>
                   </tbody>
          <?php }      ?> 
          </table>

      </div>
</body>
</html>