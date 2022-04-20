<?php

	require_once('core.php');
	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){

		$serviceName = $_POST['clientName'];

		$sql ="INSERT INTO pservices (serviceName) VALUES('$serviceName')";
	
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'Le service a ete ajout&eacute; avec succ&egrave;s';
	}
	else
	{
		$valid['success'] = true;
		$valid['messages'] = 'Erreur!!! En ajoutant le service';
	}
	$connect->close();
	echo json_encode($valid);
	}
?>