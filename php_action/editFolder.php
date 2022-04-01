<?php 

		require_once 'core.php';


		$valid['success'] = array('success' =>false, 'messages'=>array());
		if($_POST)
		{
			$nameFolder = $_POST['editFolderName'];
			$folderType = $_POST['editFolderType'];
			$creationDate = $_POST['editCreationDate'];
			$destinataire = $_POST['editDestinataire'];
			$descripCollis = $_POST['editDescripCollis'];
			$poids = $_POST['editPoids'];
			$bLading = $_POST['editBLading'];
			$folderId = $_POST['folderId'];
			$sql =" UPDATE dossier SET Nom='$nameFolder',TypeDossier = '$folderType',Date_creation='$creationDate',Destinataire='$destinataire',Description_collis='$descripCollis',Poids_collis='$poids',Bill_Lading ='$bLading' WHERE Num_Dossier= '$folderId'";

			if($connect->query($sql) == TRUE)
			{
				$valid['success'] = true;
				$valid['messages'] = 'Le dossier est modifie avec succes';
			}	
			else
			{

				$valid['success'] = false;
				$valid['messages'] = 'Erreur ! En essayant de modifier le dossier';

			}
			
			$connect->close();
			echo json_encode($valid);
		}


 ?>