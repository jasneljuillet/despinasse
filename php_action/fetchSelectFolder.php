<?php 

	require_once 'core.php';
	$folderId = $_POST['folderId'];

	$sql = " SELECT  Nom, TypeDossier, Date_creation,Destinataire,Description_collis,Poids_collis,Bill_Lading FROM dossier WHERE Num_Dossier = $folderId";
	$result = $connect->query($sql);

	if($result ->num_rows > 0)
	{
		$row = $result->fetch_array();
	}
	$connect->close();
	echo json_encode($row);


 ?>