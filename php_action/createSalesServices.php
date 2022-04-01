<?php

	require_once('core.php');
	$valid['success'] = array('success' =>false, 'messages'=>array());

	if($_POST){
        	
       		//search client 

       		$id = $_POST['clientId'];

			$sqlF = "SELECT client from customer where Id=$id";
			$result = $connect->query($sqlF);

			
			if($result->num_rows >0){
				$row = $result->fetch_array();
				
			}
			$clientName = $row[0];
			$service = explode(' ', $_POST['serviceName']);
			$idService = $service[0];
			$name = $service[1];
			$price = $service[2];
			$isActive = true;

			//insertion
			$sql ="INSERT INTO tempcart (client,product,price,isactive) VALUES('$clientName','$name','$price','$isActive')";

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

        
		/*$clientName = $_POST['clientName'];
        $dateSales = $_POST['dateSales'];
        $salesOpen = true;
		/*
		$clientAddress = $_POST['clientAddress'];
		$clientPhone = $_POST['clientPhone'];*/
		/*$sql ="INSERT INTO customer (client,sales,dateSales) VALUES('$clientName','$salesOpen','$dateSales')";
	
	if($connect->query($sql)==TRUE)
	{
		$valid['success'] = true;
		$valid['messages'] = 'Le client est ajout&eacute; avec succ&egrave;s';
	}
	else
	{
		$valid['success'] = false;
		$valid['messages'] = 'Erreur!!! En ajoutant le client ';
	}*/
	$connect->close();
	echo json_encode($valid);
	}
?>