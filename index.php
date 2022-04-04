<?php 

    require_once 'php_action/db_connect.php';
	session_Start();
	
	$errors = array();
	if($_POST)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) || empty($password))
		{
			if($username =="")
			{
				$errors[]="Le nom utilisateur est obligatoire";
			}
			if($password=="")
			{
				$errors[]="Le mot de passe est obligatoire";
			}
		}
		else
			
			{
				
				$sql ="SELECT * FROM users wHERE username ='$username'";
				$result = $connect->query($sql);
				if($result->num_rows==1)
				{
					$password = md5($password);
					$mainSql = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
					$mainResult = $connect->query($mainSql);
					
					if($mainResult->num_rows==1)
					{
						$value = $mainResult->fetch_assoc();
						$user_id = $value['user_id'];
						// set session
						$_SESSION['userId']= $user_id;
						header('location:http:127.0.0.1/systeme_beaudyne/dashboard.php');
					}
					else
					{
						$errors[]="Le nom utilisateur et/ou le mot de passe est incorrect";
					}
				}
				else
				{
					
					$errors[]= "Le nom utilisateur n'existe pas";
				}
			}
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
      <script type="text/javascript" src="./includes/js/main.js"></script>

    <title>Syst&egrave;me de Gestion de Beaudyne Logistics</title>
     <!-- -->
</head>
<body>  
	<?php
        include_once("./includes/entete.php");
		?>
		<br/>
    <div class="container">
	
											    <div class="messages"> 
												<?php if($errors)
												{
													foreach($errors as $key => $value)
													{
														echo '<div class="alert alert-warning" role="alert">
														
														<i class="glyphicon glyphicon-exclamation-sign"> </i>'.$value.'</div>' ;
													}
												} 
												?>
												</div>
      
			<div class="card mx-auto" style="width: 18rem;">
						<img class="card-img-top mx-auto" style="width:90%;" src="images/beaudyne.jpg" alt="Logo">
				<div class="card-body">
        
							<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginForm"> 
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" id="username">
            
             
            
							</div>
          <div class="form-group">
            <label for="username">Password</label>
            <input type="password" name="password" class="form-control" 
            id="password">
             
            
          </div> <br/>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>
              Connexion</button>
        </form>
        
        </div>
      </div>



    
</body>
</html>