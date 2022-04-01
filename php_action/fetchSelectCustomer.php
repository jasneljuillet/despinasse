<?php 

	require_once 'core.php';
	var_dump($_POST);
	$id = $_POST['clientId'];

	$sql = "SELECT client from customer where Id=$id";
	$result = $connect->query($sql);

	if($result ->num_rows > 0)
	{
		$row = $result->fetch_array();
	}
	$connect->close();
	echo json_encode($row);


 ?>
 