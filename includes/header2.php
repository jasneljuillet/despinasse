<?php

  require_once'php_action/core.php';
  
  
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Syst&egrave;me de Gestion de Beaudyne Logistics
	</title>
    

    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <!--bootstrap theme-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.min.css">
    
    <link rel="stylesheet" type = "text/css" href="custom/css/custom.css">
    <!--dataTable-->
    <link rel="stylesheet" type = "text/css" href="assets/plugins/datatables/datatables.min.css">
    <!--fileinput-->
    <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">
    <!--jquery-->
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <!--jqueryui-->
    
    <link rel="stylesheet" type = "text/css" href="assets/jquery-ui/jquery-ui.min.css">
     <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
    <!--bootstrap js-->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

             <nav class="navbar navbar-static-top" >
                    <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target= "#bs-example-navbar-collapse-1" aria-expended="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>

                                </button>
                                  <a class="navbar-brand" href="#">Syst&egrave;me de Gestion de Beaudyne Logistics</a>

                            </div>
                            <!-- collect the form-->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

											
											
												  <ul class="nav navbar-nav navbar-right" id="navSetting">
                          
						  <li id="navClient"><a href="client.php"><i class="glyphicon glyphicon-user"></i> Client </a></li>
							<li id="navDossier"><a href="dossier.php"><i class="glyphicon glyphicon-folder-open"></i> Dossier </a></li>
						<li id="navCategories"><a href="categories.php"><i class="glyphicon glyphicon-shopping-cart"></i> Facturation</a></li>
												
												<li id="navReport"><a href="report.php"><i class="glyphicon glyphicon-print"></i> Imprimer</a></li>
												<li id="navReport"><a href="proformat.php"><i class="glyphicon glyphicon-print"></i> Pro-forma</a></li>


														
														<li class="dropdown">
																<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
																aria-expended="false"><i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
															<ul class="dropdown-menu">
																	<li id="topNavSetting"> <a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i>Param&egrave;tres</a></li>
																	<li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i>Se D&eacute;connecter</a></li>
																	
																
															</ul>
															
														</li>
												  </ul>

								</div>

                    </div>


             </nav>



                <div class="container">
