<!DOCTYPE html>
<html>
<head>
   
    <style>
     table, td, th {
     text-align:justify;
     padding-left:15px;
}
     table {
    border-collapse: collapse;
    width: 100%;
    height: 500px;
    border-radius:5px;
    margin-top:30px;
    background-color:white;
    overflow-y:scroll;
    margin-left:-30px;
       
}
tr:hover td{
     background: #636363;
     color: #15DFE3;
}
    </style>
</head>
<body>
           <input type="checkbox"  onClick="selectall(this)" style="margin-left:35px;"> Select All
           <button name="delete" onClick="return valid()">DELETE</button>
     <?php
          $stream = $_GET['stream'];
          $year = $_REQUEST['year'];
          $sec=$_GET['section'];
          $curyear=date("Y");
          $m=date("m");
          if($m>=06) $regyear=$curyear-$year+1; else $regyear=$curyear-$year;
          include("../connection.php");
          $sql="SELECT * FROM student WHERE regyear = '$regyear' AND stream='$stream' AND section='$sec' ORDER BY roll";
          $result = mysql_query($sql,$connect);
          $num_rows = mysql_num_rows($result);
          if($num_rows==0){
               exit();
          }
          ?>
          <table>
               <thead>
                    <tr style="background-color: #858585; height:40px;">
                         <th></th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Stream</th>
                         <th>Year</th>
                         <th>Section</th>
                         <th>Roll No.</th>
                    </tr>
               </thead>
           <?php
               $i=1;
               while($row = mysql_fetch_array($result)) {
                   $x=$row[1];?>
                   <tbody>
                         <?php if($i%2==0){ ?> 
                              <tr style="background-color: #AAAAAA; height:40px;">
                    <?php }
                           else{ ?> 
                              <tr style="background-color:white; height:40px;"> 
                    <?php } ?>
                              <td><input type="checkbox" name="checked[]" value=<?=$x ?>> </td>
                              <td><?=$row[0] ?></td>
                              <td><?=$row[1] ?></td>
                              <td><?=$row[4] ?></td>
                              <td><?=$year ?></td>
                              <td><?=$row[5]?></td>
                              <td><?=$row[6]?></td>
                       
                              </tr>
                    </tbody><?php
              $i++; }?>
               </table><?php
     ?>
</body>
</html>
