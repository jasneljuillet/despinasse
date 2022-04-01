<?php

	require_once('core.php');

	//require __DIR__.'/../generatepdf.php';

	//use generate;
	$valid['success'] = array('success' =>false, 'messages'=>array());
	var_dump($_POST);
	if($_POST){
        
		//generer number fiche
		$stringName = "B-";
		$stringDate = date("Y");
		$stringTime = time();

		//recevoir $_POST
		$amount = $_POST['amount'];
		$amountPay = $_POST['amountPay'];
		//create Balance 
		$balance = $amount - $amountPay;

		var_dump($balance);
        $genFicheNumber = $stringName.$stringDate.$stringTime;


		//inserer fiche 
		$iFiche ="INSERT INTO facture(numFacture,totalAmount,Pay,BalancePay) VALUES('$genFicheNumber','$amount','$amountPay','$balance')";
		$iFicheRequete = $connect->query($iFiche);
		$last_id = mysqli_insert_id($iFiche);

		//inserer facture items
		if($last_id > 0){
			$ftempCart = "SELECT * FROM tempcart where isActive= true";
			$ftempCartRequete = $connect->query($ftempCart);

			//insertion facture items
			if($ftempCartRequete->num_rows >0){
				foreach($ftempCartRequete as $tempValue){
					$product = $tempValue['product'];
					$client = $tempValue['client'];
					$prix = $tempValue['price'];
					$iFicheFacture ="INSERT INTO facture_items(factureId,productName,prix,client) VALUES('$last_id','$product','$prix','$client')";

					$iFicheFactureRequete = $connect->query($iFicheFacture);
					$last_idFicheFacture = mysqli_insert_id($iFicheFacture);

					if($iFicheFactureRequete){
						//supression de la table customer{value}
						$dCustomer = "DELETE FROM customer";
						$connect->query($dCustomer);
						//supression de la table tempCart{value}
						$dTempCart = "DELETE FROM tempcart";
						$connect->query($dTempCart);
						//generer pdf

						return new generate($last_id,$last_idFicheFacture)
					}
				}
			}
		}
	
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