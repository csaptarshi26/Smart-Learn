<!DOCTYPE html>
<html>
<head>
<style>
.delete{
     margin-left:50%;
}
</style>
</head>
<body>
     
     <?php
          $stream = $_GET['stream'];
          $year = $_GET['year'];
          $sec=$_GET['sec'];
          $curyear=date("Y");
          $m=date("m");
          if($sec=='sec') exit();
          if($m>=06) $regyear=$curyear-$year+1; else $regyear=$curyear-$year;
          include("connection.php");
          $rs=mysql_query("SELECT * from teacher WHERE stream='$stream' AND section='$sec' AND regyear='$regyear';",$connect);
          $num_rows = mysql_num_rows($rs);
          $row=mysql_fetch_array($rs);
          if($num_rows!=0){?>
               <h3 style="margin-left:480px; margin-top:100px; color: #C82224;">Class Teacher Already Assigned::<?=$row[0] ?></h3>
              <?php exit();
           }
            $rs=mysql_query("SELECT * from teacher WHERE stream='NA' AND section='NA'",$connect);
          $num_rows = mysql_num_rows($rs);
          if($num_rows==0){?>
               <h3 style="margin-left:480px; margin-top:100px; color: #C82224;">No Faculty Left To Assign</h3>
              <?php exit();   
          }
          ?>  <select name="teacher" style="width:auto; margin-left:30px;"><?php
         
          while($row=mysql_fetch_array($rs)){
          ?>
          
               <option value="<?=$row[1]?>"><?=$row[0]?></option>
           
     <?php } ?> 
     </select><br>
     <button name="delete" class="delete" onClick="return valid()">Assign</button>
</body>
</html>