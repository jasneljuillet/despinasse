



<?php 

		session_start();
		require_once('db_connect.php');
		//echo $_SESSION['userId'];
		if(!$_SESSION['userId'])
		{
			header('location:http://127.0.0.1/systeme_beaudyne/index.php');
			
		}


?>