<?php

	require_once('core.php');
	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){
		$clientName = $_POST['clientName'];
		
		$clientAddress = $_POST['clientAddress'];
		$contact = $_POST['contact'];

		$clientPhone = $_POST['clientPhone'];
		$tel = $_POST['tel'];
		
		$sql ="INSERT INTO client (nomClient,adresse,personne,phone,tel) VALUES('$clientName','$clientAddress','$contact','$clientPhone','$tel')";
	
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