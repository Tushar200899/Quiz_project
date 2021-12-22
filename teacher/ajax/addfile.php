<?php
include("Classes/PHPExcel.php");
include("connection.php");

$test=$_POST['test'];
if(!empty($_FILES["excel"]))
{
	$file_array = explode(".", $_FILES["excel"]["name"]);
	if($file_array[1] == "xls" || $file_array[1] == "xlsx")
	{
		$uploadFilePath = 'upload/'.basename($_FILES['excel']['name']);
		move_uploaded_file($_FILES['excel']['tmp_name'], $uploadFilePath);
		$filename = $_FILES["excel"]["name"];
		$object = PHPExcel_IOFactory::load($uploadFilePath);
		foreach ($object->getWorksheetIterator() as $worksheet)
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
?>