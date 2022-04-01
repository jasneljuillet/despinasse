<?php

	require_once('core.php');
	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){
		$clientName = $_POST['clientName'];
		
		$clientAddress = $_POST['clientAddress'];
		$clientPhone = $_POST['clientPhone'];
		$sql ="INSERT INTO client (nomClient,adresse,phone) VALUES('$clientName','$clientAddress','$clientPhone')";
	
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'Le client est ajout&eacute; avec succ&egrave;s';
	}
	else
	{
		$valid['success'] = false;
		$valid['messages'] = 'Erreur!!! En ajoutant le client ';
	}
	$connect->close();
	echo json_encode($valid);
	}
?>