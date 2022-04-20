<?php 

	require_once 'core.php';
	$clientId = $_POST['clientId'];

	$sql = " SELECT username FROM users WHERE user_id = $clientId";
	$result = $connect->query($sql);

	if($result ->num_rows > 0)
	{
		$row = $result->fetch_array();
	}
	$connect->close();
	echo json_encode($row);


 ?>