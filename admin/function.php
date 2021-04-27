<?php
	include ('..\dbh.php'); 
    include ('..\user.php');
	// Delete Health worker record from the database
	if (isset($_POST['deleteHW'])) {
		$id = $_POST['id'];
		$object = $object->deleteHealthWorker($id);
	}

	// Delete child record from the database
	if (isset($_POST['deleteChild'])) {
		$id = $_POST['id'];
		$object = $object->deleteChild($id);
	}

?>