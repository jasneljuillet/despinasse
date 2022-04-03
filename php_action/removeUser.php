<?php

	require_once 'core.php';

		$valid['success'] = array('success' =>false, 'messages'=>array());
		$clientId = $_POST['clientId'];
		

		if($clientId)
		{
			$sql = "DELETE FROM users WHERE user_id = {$clientId}";
			if($connect->query($sql) == TRUE)
			{
				$valid['success'] = true;
				$valid['messages'] =  "Le client est supprim&eacute; avec succ&egrave;s";

			}
			else
			{
				$valid['success'] = false;
				$valid['messages'] =  "Erreur en essayant de supprimer le client";

			}
			
			
		$connect->close();
		

		echo json_encode($valid);
		}
		

?>