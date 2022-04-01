<?php

	require_once 'core.php';

	$valid['success'] = array('success' =>false, 'messages'=>array());
	if($_POST){
		$clientName = $_POST['editClientName'];
		$clientAddress = $_POST['editClientAddress'];
		$clientPhone = $_POST['editClientPhone'];
		$clientId = $_POST['clientId'];
		 $sql ="UPDATE client SET nomClient = '$clientName',adresse ='$clientAddress' WHERE numClient = '$clientId'";
		// $result = $connect->query($sql);
	
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'Successfully Updated';
	}
	else
	{
		$valid['success'] = false;
		$valid['messages'] = 'Error while tryind updating the brand';
	}
	
		$connect->close();
	echo json_encode($valid);
	
	}
	
?>

