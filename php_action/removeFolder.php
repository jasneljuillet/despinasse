<?php

	require_once 'core.php';

		$valid['success'] = array('success' =>false, 'messages'=>array());
		$folderId = $_POST['folderId'];
		

		if($folderId)
		{
			$sql = "DELETE FROM dossier WHERE Num_Dossier = {$folderId}";
			if($connect->query($sql) == TRUE)
			{
				$valid['success'] = true;
				$valid['messages'] =  "Le dossier est supprim&eacute; avec succ&egrave;s";

			}
			else
			{
				$valid['success'] = false;
				$valid['messages'] =  "Erreur en essayant de supprimer le dossier";

			}
			
			
		$connect->close();
		

		echo json_encode($valid);
		}
		

?>