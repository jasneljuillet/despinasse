<?php

	require_once('core.php');
	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){
		$nameFolder = $_POST['nameFolder'];
		$folderType = $_POST['folderType'];
		$creationDate =  $_POST['creationDate'];
		$destinataire =  $_POST['destinataire'];
		$descripCollis =  $_POST['descripCollis'];
		$poids =  $_POST['poids'];
		$bLading =  $_POST['bLading'];
		$client = $_POST['clientDossier'];
		$sql ="INSERT INTO dossier (Nom,TypeDossier,Date_creation,Destinataire,Description_collis,Poids_collis,Bill_Lading, clientId) VALUES ('$nameFolder','$folderType','$creationDate','$destinataire','$descripCollis','$poids','$bLading', '$client')";
	}
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'Le dossier est ajout&eacute; avec succ&egrave;s';
	}
	else
	{
		$valid['success'] = true;
		$valid['messages'] = 'Erreur! En essayant dajouter le dossier';
	}
	$connect->close();
	echo json_encode($valid);
?>