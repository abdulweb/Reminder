<?php
// session_start();

error_reporting(0);
/**
* 
*/
class user extends dbh
{

	

	
	// function __construct(argument)
	// {
	// 	# code...
	// }
	// public $created_at = date('Y-m-d');

	public function login($username, $password)
	{
		$hashPassword = md5($password);
		if($username == 'admin@admin.com' && $password == 'pass3word')
		{
			$this->cookies('admin', $username, 'admin_name', 'admin');
			$_SESSION['usertype'] = 'superAdmin';
			$error = 0;
			header('location:admin/index.php');
		}
		else{

			$stmt = "SELECT * from users where email = '$username' && password = '$hashPassword'";
			$result = $this->connect()->query($stmt);
			$numberrows = $result->num_rows;
			if ($numberrows > 0 ) 
			{
				$rows= $result->fetch_assoc();
				if ($rows['active'] == 1) 
				{
					# code...
					$userType = $rows['user_type'];
					if($userType == 'SD')
					{	
						// $get_image = "SELECT * FROM application_document where user_id = '$rows['user_id']'";
					// 	$result = $this->connect()->query($get_image)->fetch_assoc();
						$_SESSION['user'] = $username;
						$_SESSION['usertype'] = $userType;
						$_SESSION['user_id'] = $rows['id'];
						$error = 0;
						header('location:salesDirector/index.php');
					}
					elseif($userType == 'Shop Owner' || $userType == 'Driver')
					{
						$_SESSION['user'] = $username;
						$_SESSION['usertype'] = $userType;
						$_SESSION['user_id'] = $rows['id'];
						$error = 0;
						header('location:payer/index.php');
					}
					else
					{
						$error = 1;
						$oldmail = $username;
						//return $oldmail;
						echo  $this->messages($error);	
					}

				}
				else
				{
					// $error = 3;
					// echo $this->messages($error);
					echo '<div class ="alert alert-danger">'.$rows['message'].'</div>';
				}	
				
			}
			else{
				$error = 2;
				echo $this->messages($error);
			}
		}
		
	}

	public function messages($message)
	{
		if ($message == 1) {
			return '<div class ="alert alert-danger"> Wrong username and password </div>';
		}
		if($message == 2)
		{
			return '<div class ="alert alert-danger"> Attension!!! Unathorize user </div>';
		}
		if($message == 3)
		{
			return '<div class ="alert alert-danger"> User account has been revorked.. Please Contact system Administrator for help </div>';
		}
	}

	public function sessioncheck($sess)
	{
		if ($sess =='' or empty($sess) or $sess == null) 
		{
			header('location:..\index.php');
		}
		else{
			//return $sess;
		}
	}
	public function emptysession ($cookie_name){
		unset($set);
		header('location:..\index.php');
	}

	// Insert health worker into database
	public function insertHealthWorker($name,$email,$phone,$hospital){
		if (empty($this->checkUser($email))) 
		{
			$password = md5($phone);
			$date = date('Y-m-d');
			$insert = "INSERT INTO users(username,password,user_type,created_at)Values('$email','$password','HW','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger alert-dismissible"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				$this->insertname($email,$name,$hospital,$phone);
				
			}

		}
		else{
			echo $this->checkUser($email);
		}
	}

	// Delete health worker
	public function deleteHealthWorker($id)
	{
		$getSmtm = $this->connect()->query("SELECT * FROM healthworker where id = '$id'");
		$rows= $getSmtm->fetch_assoc(); $user_id = $rows['user_id'];
		// 
		$checkHW = $this->connect()->query("SELECT * from users where id = '$user_id'");

		$stmt = "DELETE FROM healthworker where id = '$id'";
		$result = $this->connect()->query($stmt);
		if ($result) {
			$stmtx = "DELETE FROM users where id = '$user_id'";
			$resultx = $this->connect()->query($stmtx);
			if ($resultx) {
				echo "success";
			}
			else{
				echo '<script>alert("Please Try Agin. Error Occured")</script>';
			}
		}
		else{
			echo '<script>alert("Please Try Agin. Error Occured")</script>';
		}
		exit();
	}
	// End of Health worker
	
	// check if user already exist
	public function checkUser($email)
	{
		if (!empty($email)) {
			# code...
			$stmt = "SELECT * FROM users where username = '$email' ";
			$result = $this->connect()->query($stmt);
			$numberrows = $result->num_rows; 
			if (($numberrows)> 0) {
				return '<div class ="alert alert-danger alert-dismissible"> <strong> Sorry !!! User  Already Exist  </strong> </div>'; 
			}

		}
		else{
			return '<div class ="alert alert-danger alert-dismissible"> <strong> All fielda are required </strong> </div>';
		}
		
	}

	public function gethospitalName($id){
		$stmt = "SELECT name from health_facility where id = '$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows > 0) {
			$data = $result->fetch_assoc();
			$string = implode('|',$data);
			return $string;
		}
		else{
			return '';
		}
	}

	public function insertname($email,$name,$hospital,$phone)
	{
		$stmty = "SELECT id from users where username = '$email'";
		$result = $this->connect()->query($stmty);
		$data =   $result->fetch_assoc();
		$id =      $data['id'];
		$insert = "INSERT INTO healthworker(full_name,phone_no,hospital_id,user_id) Values('$name','$phone','$hospital','$id')";
		$occ = 	$this->connect()->query($insert);
		if ($occ) 
		{
			echo '<div class ="alert bg-teal alert-dismissible"> <strong> New healthworker  Added Successfully  </strong> </div>';
		}
		else
		{
			// print_r($data);
			echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again!!! </strong> </div>';
		}
	}

	public function getHealthWorker()
	{
		$stmt = "SELECT * FROM healthworker ORDER By id DESC";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_data [] = $rows;
		}
		 return $row_data;
			
		}
		else{
			return '';
		}
	}

	// include ('function.php');
	public function uniqueCodeHW($name,$serialNo){
		return 'HW/'.strtoupper(substr($name,0,2)).'/'.$this->serialNoLength($serialNo);
	}
	public function serialNoLength($serialNo)
	{
		if (strlen($serialNo) == 1) {
			return '000'.$serialNo;
		}
		if (strlen($serialNo) == 2) {
			return '00'.$serialNo;
		}
		if (strlen($serialNo) == 3) {
			return '0'.$serialNo;
		}
		if (strlen($serialNo) == 4) {
			return $serialNo;
		}
	}

	// Update health worker
	public function updateHealthWorker($name,$hopital,$phone,$username,$id,$userID)
	{

	}

	public function getAllHospital()
	{
		$stmt = "SELECT * FROM health_facility";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_data [] = $rows;
		}
		 return $row_data;
			
		}
		else{
			return '';
		}
	}

	public function getVaccine()
	{
		$stmt = "SELECT * FROM vaccine ORDER By id DESC";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_data [] = $rows;
		}
		 return $row_data;
			
		}
		else{
			return '';
		}
	}
	public function insertVaccine($name,$age){
			$date = date('Y-m-d');
			$insert = "INSERT INTO vaccine(name,child_age,created_at)Values
			('$name','$age','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger alert-dismissible"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<div class ="alert bg-teal alert-dismissible"> <strong> New Vaccine Record Added Successfully  </strong> </div>';
				
			}
	}

	// Delete Vaccine
	public function deleteVaccine($id)
	{
		$stmt = "DELETE FROM vaccine where id = '$id'";
		$result = $this->connect()->query($stmt);
		if ($result) {
			echo '<div class ="alert bg-teal alert-dismissible"> <strong> Vaccine Record Deleted Successfully  </strong> </div>';
		}
		else{
			echo '<script>alert("Please Try Agin. Error Occured")</script>';
		}
	}

	// Update Vaccine
	public function updateVaccine($name,$age,$id){

	 $stmt = "UPDATE vaccine set name = '$name', child_age = '$age' where id = '$id'";
	 $result = $this->connect()->query($stmt);
	 if($result)
	 {
	 	echo '<div class ="alert bg-teal alert-dismissible"> <strong> Vaccine Record Updated Successfully  </strong> </div>';	 }
	 else{
	 	echo '<div class ="alert bg-danger alert-dismissible"> <strong> Please Try Agin. Error Occured!!!  </strong> </div>';
	 }

	}


	// Health Facility
	public function getHealthFacility()
	{
		$stmt = "SELECT * FROM health_facility ORDER By id DESC";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_data [] = $rows;
		}
		 return $row_data;
			
		}
		else{
			return '';
		}
	}

	// Insert health Facility into database
	public function insertHealthFacility($name){
		if (empty($this->checkHealthFacility(strtoupper($name)))) 
		{
			$date = date('Y-m-d');
			$insert = "INSERT INTO health_facility(name,created_at)Values('$name','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger alert-dismissible"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<div class ="alert bg-teal alert-dismissible"> <strong> Health Facility Added Successfully  </strong> </div>';
				
			}

		}
		else{
			echo $this->checkHealthFacility($name);
		}
	}
	
	// check if user already exist
	public function checkHealthFacility($name)
	{
		$stmt = "SELECT * FROM health_facility where name = '$name' ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows; 
		if (($numberrows)> 0) {
			return '<div class ="alert alert-danger alert-dismissible"> <strong> Sorry !!! Health Facilty  Already Exist  </strong> </div>'; 
		}
	}
	
	// Update Health Facility
	public function updateHealthFacility($name,$id){

	 $stmt = "UPDATE health_facility set name = '$name' where id = '$id'";
	 $result = $this->connect()->query($stmt);
	 if($result)
	 {
	 	echo '<div class ="alert bg-teal alert-dismissible"> <strong> Health Facility Record Updated Successfully  </strong> </div>';	 }
	 else{
	 	echo '<div class ="alert bg-danger alert-dismissible"> <strong> Please Try Agin. Error Occured!!!  </strong> </div>';
	 }

	}

	// Delete Health Facility
	public function deleteHealthFacility($id)
	{
		// fetch record from health_facility
		$getSmtm = $this->connect()->query("SELECT * FROM health_facility where id = '$id'");
		$rows= $getSmtm->fetch_assoc(); $hospital_id = $rows['id'];
		// 
		$checkHW = $this->connect()->query("SELECT * from healthworker where hospital_id = '$hospital_id'");
		if ($checkHW->num_rows > 0) {
			echo '<div class ="alert bg-danger alert-dismissible"> <strong> You can not delete this record, Because Some Health workers are link to this Health facility   </strong> </div>';
		}
		else{
			$stmt = "DELETE FROM health_facility where id = '$id'";
			$result = $this->connect()->query($stmt);
			if ($result) {
				echo '<div class ="alert bg-teal alert-dismissible"> <strong> Health Facility Record Deleted Successfully  </strong> </div>';
			}
			else{
				echo '<script>alert("Please Try Agin. Error Occured")</script>';
			}
		}
		
	}

	// Get Particular Health Worker Login Credentials
	public function getOneUser($userID){
		$stmt = "SELECT * FROM users where id ='$userID'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_date [] = $rows;
		}
		 return $row_date;
			
		}
		else{
			return '';
		}
	}

	// Add caregiver
	function checkNumber($number)
	{
		$stmt = "SELECT * FROM caregiver where phone_no = '$number'";
		$result = $this->connect()->query($stmt);
		if ($result->num_rows > 0) {
			return '<div class ="alert bg-danger alert-dismissible"> <strong> Phone Already Exist. You can add a child to the number by using the search box  </strong> </div>';
		}
	}

	function checkChild($firstName,$lastName,$middleName,$phone,$dob)
	{
		$stmt = "SELECT * FROM caregiver where phone_no = '$phone'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		$user_id = $rows['id'];

		// Get child data
		$child_result = $this->connect()->query("SELECT * FROM children where caregiver_id = '$user_id'");
		while ($data = $child_result->fetch_assoc())
		{
			$row_date [] = $data;
		}
		foreach ($data as $value) {
			if ($firstName = $value['first_name'] && $lastName = $value['last_name'] && $middleName = $value['other_name'] && $dob = $value['dob']) {
				return '<div class ="alert bg-success alert-dismissible"> <strong>'.$lastName." ".$firstName. " ".$middleName.'Already Added to this number'.$phone.'</strong> </div>';
			}
		}
	}
	function insertCaregiverAndChild($phone,$firstName,$other_name,$child_firstName,$child_middleName,$dob,$vaccine)
	{
		if (!empty($phone) || !empty($firstName)|| !empty($dob) || !empty($child_firstName)) 
		{
			if (empty($this->checkNumber($phone))) 
			{
				if (empty($this->checkChild($child_firstName,$firstName,$child_middleName,$phone,$dob))) {
					// 
						$date = date('Y-m-d');
						$explod_date = explode(" ",$dob);
	                    $main = $explod_date[1]."/".$this->getMonth($explod_date[2])."/".$explod_date[3];
						$insert = "INSERT INTO caregiver(first_name,other_name,phone_no,created_at)Values('$firstName','$other_name','$phone','$date')";
						$stmt = $this->connect()->query($insert);
						if (!$stmt) {
							echo '<div class ="alert alert-danger alert-dismissible"> <strong> Error Occured !!! Please Try Again </strong> </div>';
						}
						else
						{
							$stmty = "SELECT id from caregiver where phone_no = '$phone'";
							$result = $this->connect()->query($stmty);
							$data =   $result->fetch_assoc();
							$caregiver_id =      $data['id'];
							$insert = "INSERT INTO children(first_name,last_name,middle_name,dob,caregiver_id,created_at) Values('$child_firstName','$firstName','$child_middleName','$main','$caregiver_id','$date')";
							$occ = 	$this->connect()->query($insert);
							if ($occ) 
							{
								// vacinntion insertion
								$select = $this->connect()->query("SELECT * FROM children ORDER BY id LIMIT 1")->fetch_assoc();
								$gotID = $select['id'];
									if (empty($vaccine) or count($vaccine) < 1) {
										echo "not vaccine added";
									}
									else
									{
										if($this->child_vacinnation($vaccine,$gotID)){
											echo '<div class ="alert bg-teal alert-dismissible"> <strong> New Caregiver and child  Added Successfully  </strong> </div>';
										}
										else{
											echo '<div class ="alert alert-danger alert-dismissible"> <strong> Error Occured !!! Please Try Again at added child </strong> </div>';
										}
									}
								// 
								
							}
							else
							{
							echo '<div class ="alert alert-danger alert-dismissible"> <strong> Error Occured !!! Please Try Again at added child </strong> </div>';
						}
					}
					// 
				}
				else{
					echo $this->checkChild($child_firstName,$firstName,$child_middleName,$phone,$dob);
				}
			}
			else{
				echo $this->checkNumber($phone);
			}
		}
		else{
			echo  '<div class ="alert bg-danger alert-dismissible"> <strong> All field are required  </strong> </div>';
		}
	}

	// Month method
	function getMonth($month)
	{
		if ($month == 'January' || $month == 'january') {
			return '01';
		}
		if ($month == 'February' || $month == 'february') {
			return '02';
		}
		if ($month == 'March' || $month == 'march') {
			return '03';
		}
		if ($month == 'April' || $month == 'april') {
			return '04';
		}
		if ($month == 'May' || $month == 'may') {
			return '05';
		}
		if ($month == 'June' || $month == 'june') {
			return '06';
		}
		if ($month == 'July' || $month == 'july') {
			return '07';
		}
		if ($month == 'August' || $month == 'august') {
			return '08';
		}
		if ($month == 'September' || $month == 'september') {
			return '09';
		}
		if ($month == 'October' || $month == 'october') {
			return '10';
		}
		if ($month == 'November' || $month == 'november') {
			return '11';
		}
		if ($month == 'December' || $month == 'december') {
			return '12';
		}
	}

	function child_vacinnation($vaccine,$childID)
	{
		 $created_at = date('Y-m-d');
		foreach ($vaccine as $storeVaccine) {
	        $this->connect()->query("INSERT INTO child_vaccine(child_id,vaccine_id,created_at)Values('$childID','$storeVaccine','$created_at')");
	    }
	}

/* ===================================================================*/
}
// end of class
$object = new user();