<?php
     include("../connection.php");
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
 
// Include Spout library
require_once '../spout-2.4.3/src/Spout/Autoloader/autoload.php';
 
// check file name is not empty
if (!empty($_FILES['file']['name'])) {
      
    // Get File extension  'xlsx' to check file is excel sheet
    $pathinfo = pathinfo($_FILES["file"]["name"]);
     
    // check file has extension xlsx, xls and also check
    // file is not empty
   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')
           && $_FILES['file']['size'] > 0 ) {
         
        // Temporary file name
        $inputFileName = $_FILES['file']['tmp_name'];
    
        // Read excel file by using ReadFactory object.
        $reader = ReaderFactory::create(Type::XLSX);
 
        // Open file
        $reader->open($inputFileName);
        $count = 1;
        $rows = array();
        // Number of sheet in excel file
        foreach ($reader->getSheetIterator() as $sheet) {
             
            // Number of Rows in Excel sheet
            foreach ($sheet->getRowIterator() as $row) {
                $a=sizeof($row);
                if($a>7){
                    if ($count > 1) {
                         // Data of excel sheet
                         
                         $fname = $row[0];
                         $mname=$row[1];
                         $lname=$row[2];
                         if($mname){
                              $name=$fname." ".$mname." ".$lname;
                         }
                         else{
                              $name=$fname." ".$lname;
                         }
                         $uppername=strtoupper($name);
                         $email = $row[3];
                         $reg = $row[4];
                         $regyear = $row[5];
                         $stream = $row[6];
                         $sec=$row[7];
                         $roll= $row[8];
                         $rs=mysql_query("SELECT * from student where regyear='$regyear' AND email='$email'",$connect);
                         $num_rows = mysql_num_rows($rs);
                         if($num_rows>0){
                              echo "<script>
                              alert('Error Occured!!!Data For This Batch Already Entered....Either Delete All Data And Enter Again Or Enter Single Data Manualy');
                              window.location.href='student.php';
                              </script>";
                              exit();
                         }
                         $x=strtolower($name);
                         $arr=explode(' ',trim($x));
                         $pass=$arr[0]."@".substr($reg, -4);
                         echo $uppername." ",$email." ",$reg." ",$regyear." ",$stream." ",$sec." ",$roll." ",$pass."<br>";     
                         $sql = mysql_query("INSERT INTO student(name,email,registration,regyear,stream,section,roll,password)                           VALUES('$uppername','$email','".$reg."','".$regyear."',UPPER('$stream'),'$sec','$roll','".$pass."')",$connect);
                         
                     }
                }
                else{
                     if ($count > 1) {
                         // Data of excel sheet
                         
                         $name = $row[0];
                         $uppername=strtoupper($name);
                         $email = $row[1];
                         $reg = $row[2];
                         $regyear = $row[3];
                         $rs=mysql_query("SELECT * from student where regyear='$regyear' AND email='$email'",$connect);
                         $num_rows = mysql_num_rows($rs);
                         if($num_rows>0){
                              echo "<script>
                              alert('Error Occured!!!Data For This Batch Already Entered....Either You Delete All Data And Enter Again Or Enter Single Data Manualy');
                              window.location.href='student.php';
                              </script>";
                              exit();
                         }
                         $stream = $row[4];
                         $sec=$row[5];
                         $roll= $row[6];
                         $x=strtolower($name);
                         $arr=explode(' ',trim($x));
                         $pass=$arr[0]."@".substr($reg, -4);
                          echo $uppername." ",$email." ",$reg." ",$regyear." ",$stream." ",$sec." ",$roll." ",$pass,$x."<br>";     
                         $sql = mysql_query("INSERT INTO student(name,email,registration,regyear,stream,section,roll,password)                           VALUES('$uppername','$email','".$reg."','".$regyear."',UPPER('$stream'),'$sec','$roll','".$pass."')",$connect);
                         
                     }
                }
                $count++;
            }
            break;
        }
        
        $reader->close();
        echo "<script>
     alert('successfully added');
     window.location.href='student.php';
     </script>";
    } 
    else {
        echo "<script>
          alert('Select A valid EXCEL File');
          window.location.href='student.php';
          </script>";
    }
 
} else {
 
          echo "<script>
          alert(' Select Excel File');
          window.location.href='student.php';
          </script>";
     
}
?>