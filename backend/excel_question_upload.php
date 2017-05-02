<?php
     include("../admin/connection.php");
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
 
// Include Spout library
require_once '../admin/spout-2.4.3/src/Spout/Autoloader/autoload.php';
 
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
                
                if ($count > 1) {
                    // Data of excel sheet
                    $sub=$_POST['sub'];
                    $date=$_POST['date'];
                    $time=$_POST['vtime'];
                    $dur=$_POST['vdur'];
                    $sec=$_POST['vsec'];
                    $q_id=$sub.$sec.$date.$row[0];
                    $question=$row[1];
                    $option1=$row[2];
                    $option2=$row[3];
                    $option3=$row[4];
                    $option4=$row[5];
                    $coption=$row[6];
                    $coption = preg_replace('/\s+/', '', $coption);
                    //echo $q_id,$sub,$date,$time,$dur,$question,$option1,$option2,$option3,$option4,$coption."<br>";
                    $sql=mysql_query("INSERT INTO 
                    question(q_id,paper_code,section,date,time,duration,question,option1,option2,option3,option4,c_option)
                    VALUES('$q_id','$sub','$sec','$date','$time','$dur','$question','$option1','$option2','$option3','$option4','$coption')",$connect);
                    if (!$sql) {
                          echo "<script>
                         alert('Error!!');
                         window.location.href='../set_question.php';
                         </script>";   
                         exit(); 
                    }   
                }
                $count++;
            }
           break; 
        }
        
        $reader->close();
     echo "<script>
     alert('successfully added');
     window.location.href='../set_question.php';
     </script>";
    } 
    else {
        echo "<script>
          alert('Select A valid EXCEL File');
          window.location.href='../set_question.php';
          </script>";
    }
 
} else {
 
          echo "<script>
          alert(' Select Excel File');
          window.location.href='../set_question.php';
          </script>";
     
}
?>