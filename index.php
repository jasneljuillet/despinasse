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
						$_SESSION['status'] = $value['status'];
						
						header('location:http://127.0.0.1/systeme_beaudyne/dashboard.php');
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

<section class="vh-100" style="background-color: 9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/beaudyne.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginForm">

                  <!-- <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                  </div> -->

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
				  	Syst&egrave;me de Gestion de Beaudyne Logistics
				  </h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" name="username" class="form-control form-control-lg" placeholder="Nom utilisateur" />
                    <label class="form-label" for="form2Example17">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" placeholder="Mot de Passe" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
				  	<button type="submit" class="btn  btn-success btn-lg btn-block"><i class="fa fa-lock"></i> Connexion</button>
                    <!-- <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button> -->
                  </div>

				  <div class="messages"> 
					<?php
 						{
							foreach($errors as $key => $value)
							{
								echo '<div class="alert alert-warning" role="alert">
								<i class="glyphicon glyphicon-exclamation-sign"> </i>'.$value.'</div>' ;
							}
						} 
											
						?>
    				</div>
                  <!-- <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


							<!-- <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginForm">  -->
							
</body>
</html>