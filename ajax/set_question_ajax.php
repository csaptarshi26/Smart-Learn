<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="../font-awesome-4.6.3/css/font-awesome.min.css">
     <style>
          input{
               margin-bottom:10px;
               width:200px;
               height:40px;
          }
          input[type=file]{width:250px; margin-left:20px;}
          input[type=file]:hover{border-style:none;}
          button{
               border-radius:4px;
               width:100px;
               border-style:none;
               background-color:#8E8E8E;
          }
          button:hover{
               background-color: #636363;
               color:white;
          }
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
          if($num_rows==0){ $slno=1;
          ?>
          <span style="margin-left:20px;">Time:</span>
   <input type="text" placeholder="&#xf017;" name="time" style="width:80px;font-family:Arial, FontAwesome;height:30px;margin-left:5px;" onfocus="(this.type='time')" onBlur="(this.type='text')" id="time" autocomplete="off" required oninput="x()">

   <span style="margin-left:20px;">Duration:</span>
   <select class="input_form" style="font-family:'FontAwesome',Helvetica;margin-left:5px; width:90px;height:30px"required name="duration" id="duration" oninput="x()">
        <option value="" disabled selected hidden="true">&#xf110;</option>
        <?php for($i=30;$i<=180;$i+=30) { ?>
          <option value="<?=$i?>"><?php $x=floor($i/60);$y=$i%60; if($y==0){ echo $x." : 00 Hr";} else { echo $x." : "."$y Hr";} ?></option>
        <?php } ?>
   </select>
   <span style="margin-left:20px;">Section:</span>
   <select  name="section" style="font-family:'FontAwesome',Helvetica;height:30px" id="sec" required oninput="x()">
        <option value="" disabled selected hidden="true">&#xf126;</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="ALL">ALL</option>
    </select>
                         
                         <!--------------------------------------------------------------->
   <?php }//end of if 
     else {$slno=substr($row[0], -1)+1;
          $i=$row1['duration'];
     ?>
          <span style="margin-left:20px;">Time:</span>
          <input type="text" placeholder="&#xf017;" name="time" style="width:80px;font-family:Arial, FontAwesome;height:30px;margin-left:5px;" onfocus="(this.type='time')" onBlur="(this.type='text')" id="time" autocomplete="off" readonly value="<?=$row1['time']?>"oninput="x()">
          
          <span style="margin-left:20px;" >Duration:</span>
          <select class="input_form" style="font-family:'FontAwesome',Helvetica;margin-left:5px; width:90px;height:30px"required name="duration" id="duration" oninput="x()">
      <option value="<?=$i?>" selected><?php $x=floor($i/60);$y=$i%60; if($y==0){ echo $x.":00 Hr";} else { echo $x." : "."$y Hr";}?></option>
           </select>
           
           <span style="margin-left:20px;">Section:</span>
             <select name="section" id="sec" style="font-family:'FontAwesome',Helvetica;height:30px" required oninput="x()">
                  <option value="<?=$row1['section']?>" selected><?=$row1['section']?></option>
              </select>
          <?php }?>
      <!-------------------------------------------------------------------------------------------------------------------------->
      <div style="margin-top:40px; margin-left:40px;">
         
          <input type="number" value="<?=$slno?>" name="slno" hidden="true"><br>
          
          <textarea style="height:60px; width:400px; margin-bottom:10px;" placeholder="Question" required name="question"></textarea><br>
          
          <input type="text" placeholder="Option 1" required name="o1" autocomplete="off">
          <input type="text" placeholder="Option 2" required name="o2" autocomplete="off"><br>
          <input type="text" placeholder="Option 3" name="o3" autocomplete="off">
          <input type="text" placeholder="Option 4" name="o4" autocomplete="off"><br>
          
          <select style="font-family:'FontAwesome',Helvetica; width:auto"required name="correct">
               <option value="" disabled selected hidden="true">Correct Option</option>
               <option value="option1">Option 1</option>
               <option value="option2">Option 2</option>
               <option value="option3">Option 3</option>
               <option value="option4">Option 4</option>
          </select><br>
      <button style="margin-top:20px;">Submit</button>
      </form>
      <!------------------------------------------------------------------------------------------------------------------------->          
      <form action="backend/excel_question_upload.php" enctype="multipart/form-data" method="post">
          <div style="margin-left:450px; margin-top:-220px;">OR
               <input type="file" name="file" id="file" >
               <input type="text" name="sub" value="<?=$sub?>" hidden="true">
               <input type="date" name="date" value="<?=$date?>" hidden="true">
               <input type="time" id="vtime" name="vtime" hidden="true">
               <input type="text" id="vdur" name="vdur" hidden="true">
               <input type="text" id="vsec" name="vsec" hidden="true" >
               <button onClick="return upload()" >UPLOAD</button><br>   
               <span id="error2" style="color:#DD2225; margin-left:60px">   </span>
          </div>
       </form>
      </div>
</body>
</html>
