<!DOCTYPE html>
<html>
<head>
</head>
<body onLoad="show()" >
<?php  
     $n= $_GET['q']; 
     while($n !=0){
 ?>
<div style="margin:0;padding:0;">
    <input type="text" name="paper_name" class="input_form" placeholder="Paper Name" required style="margin-right:30px;">
    <input type="text" name="paper_code" placeholder="Paper Code" required>
</div>
<?php 
$n--;
     }
     ?>
</body>
</html>
