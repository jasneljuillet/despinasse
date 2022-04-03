<?php

	require_once 'core.php';

	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){
		$clientName = $_POST['editClientName'];
		$clientAddress = md5($_POST['editClientAddress']);
		$clientId = $_POST['clientId'];
		 $sql ="UPDATE users SET username = '$clientName',password ='$clientAddress' WHERE user_id = '$clientId'";
		// $result = $connect->query($sql);
	
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'L\'utilisateur a ete modifi&eacute; avec succ&egrave;s';
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

