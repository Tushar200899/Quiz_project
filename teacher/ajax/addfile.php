<?php 
  include("Classes/PHPExcel.php");  
  include('connection.php');
    

 if(!empty($_FILES["excel_file"]))  
 {   
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xls" || $file_array[1] == "xlsx")  
      {  
           //upload
         $uploadFilePath = 'upload/'.basename($_FILES['excel_file']['name']);
         move_uploaded_file($_FILES['excel_file']['tmp_name'], $uploadFilePath);
         $filename= $_FILES["excel_file"]["name"];
         echo $filename;
           $object = PHPExcel_IOFactory::load($uploadFilePath);
           foreach($object->getWorksheetIterator() as $worksheet)
           {
             $rowcount = $worksheet->getHighestRow();
             for($row=2;$row<=$rowcount;$row++)
             {
                $question=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
				$option1=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $option2=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
                $option3=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
                $option4=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
                $correct=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
				$query = $db->prepare('INSERT INTO addquestion(test,question,option1,option2,option3,option4,correct) Values (?,?,?,?,?,?,?)');
				$data = array($test,$question,$option1,$option2,$option3,$option4,$correct);
				$execute=$query->execute($data);
                if($execute)
                {
                    echo 0;
                }
             }
           }
        }
}















      function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function validiate_input($data, $type){

    if($type==0){
        //echo "0";
        if(preg_match('/[^a-zA-Z0-9 ._-]+/i', $data)) {
            //echo "injection";
            return false;
        }else{
            //echo "match";
            return true;
        }
    }
    if($type==1){
        //echo "1";
        if (preg_match("/^[a-zA-Z0-9 ._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $data)) {
            //echo "match";
            return true;
        }else{
            //echo "injection";
            return false;
        }

    }
    if($type==2){
        //echo "2";
        if (preg_match('/[^a-zA-Z0-9@&_-]+/i', $data)) {
            //echo "injection";
            return false;
        }else{
            //echo "match";
            return true;
        }

    }
    if($type==3){
        //echo "2";
        if (preg_match('/[^a-zA-Z0-9 _,]+/i', $data)) {
            //echo "injection";
            return false;
        }else{
            //echo "match";
            return true;
        }

    }

}
?>