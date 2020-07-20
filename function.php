<?php
	// public function getHealthWorker()
	// {
	// 	$stmt = "SELECT * FROM healthworker ORDER By id DESC";
	// 	$result = $this->connect()->query($stmt);
	// 	$numberrows = $result->num_rows;
	// 	if ($numberrows >0) {
	// 		while ($rows= $result->fetch_assoc()) {
	// 			$row_data [] = $rows;
	// 	}
	// 	 return $row_data;
			
	// 	}
	// 	else{
	// 		return '';
	// 	}
	// }
	//  function uniqueCodeHW($name,$serialNo){
	// 	return 'HW/'.substr($name,0,2).'/'.$this->serialNoLength($serialNo);
	// }
	//  function serialNoLength($serialNo)
	// {
	// 	if (strlen($serialNo) == 1) {
	// 		return '000'.$serialNo;
	// 	}
	// 	if (strlen($serialNo) ==2) {
	// 		return '00'.$serialNo;
	// 	}
	// 	if (strlen($serialNo) == 3) {
	// 		return '0'.$serialNo;
	// 	}
	// 	if (strlen($serialNo) == 4) {
	// 		return $serialNo;
	// 	}
	// }
?>