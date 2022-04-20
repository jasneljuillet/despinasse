<?php

	require_once('core.php');
	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){

		$username = $_POST['clientName'];
		$status = $_POST['status'];
		$password = md5($_POST['clientAddress']);

		$sql ="INSERT INTO users (username, password, status) VALUES('$username','$password','$status')";
	
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'L\'utilisateur a ete ajout&eacute; avec succ&egrave;s';
	}
	else
	{
		$valid['success'] = true;
		$valid['messages'] = 'Erreur!!! En ajoutant l\'utilisateur';
	}
	$connect->close();
	echo json_encode($valid);
	}
?>