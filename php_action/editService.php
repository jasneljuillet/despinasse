<?php

	require_once 'core.php';

	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){
		$clientName = $_POST['editClientName'];
		$clientId = $_POST['clientId'];
		 $sql ="UPDATE pservices SET serviceName = '$clientName' WHERE Id = '$clientId'";
		// $result = $connect->query($sql);
	
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'Le service a ete modifi&eacute; avec succ&egrave;s';
	}
	else
	{
		$valid['success'] = true;
		$valid['messages'] = 'Error while tryind updating the brand';
	}
	
		$connect->close();
	echo json_encode($valid);
	
	}
	
?>

