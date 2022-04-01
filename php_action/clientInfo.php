<?php 
	 require_once('core.php');

	 $client = $_POST['clientName'];

	 $sql = "SELECT * FROM dossier WHERE Nom = '$client' ";
	$result = $connect->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		 header("Location:../findclient.php?id=".$row['clientId']."&dossierid=".$row['Num_Dossier']."&nom=".$client  );
		}
	  } else {
		echo "0 results";
	  }

?>