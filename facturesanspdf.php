<?php 
session_start();

	if($_SESSION['status'] == 'adm') {
		require_once ('includes/header.php');
	} else {
		require_once ('includes/header2.php');
	}
?>

<?php
    require_once("./php_action/core.php");

    $clientId = $_GET['clientName'];
    $nomClient = "";
    $adresse = "";
    $phone = "";

  
    $sql = "SELECT * FROM client WHERE numClient = '$clientId' ";
   $result = $connect->query($sql);

   $sqlClient = "SELECT * FROM pservices";
   $requete = $connect->query($sqlClient);

   if ($result->num_rows > 0) {
     
       while($row = $result->fetch_assoc()) {
        $nomClient = $row ['nomClient'];
        $adresse = $row['adresse'];
        $phone = $row['phone'];
       }
     } else {
       echo "0 results";
     }

?>
<ol class="breadcrumb">
                         <li><a href="dashboard.php">Accueil</a></li>
                          <li class="active">Dossier</li>
                    </ol>
<div id="add-client-messages"></div>
	  
			  <div class="form-group">
				<label for="clientName" class="col-sm-3 control-label">Nom du Client </label>
				<div class="col-sm-9">
				 <input value="<?php echo $nomClient; ?>" type="text" class="form-control" max="100" id="" name="" placeholder="Nom du client" disabled> 
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="clientAddress" class="col-sm-3 control-label">Adresse</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="clientAddress" name="clientAddress" value=<?php echo $adresse ?> disabled>
				</div>
			  </div>
			  <div class="form-group">
				<label for="clientPhone" class="col-sm-3 control-label">T&eacute;l&eacute;phone</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="clientPhone" name="clientPhone" value=<?php echo $phone ?> disabled>
				</div>
			  </div>
      
  
       
    </br>
    </br>

    <form class="form-horizontal" id="editFolderForm" action="#" method="POST">
						<div class="modal-body">
							  <div id="edit-brand-messages"></div>
									
							  		<div class="form-group">
															
														<div class="col-sm-9">
															<input type="hidden" class="form-control" name="client" id="editServiceCustomer">
														</div>
											</div>

									<div class="form-group">
											<label for="folderType" class="col-sm-3 control-label">Type de services</label>
												<div class="col-sm-9">
												  <select class="form-control" id="editServiceType" name="serviceName" required>
													<option value="">----Selectionner un service----</option>
                          <?php if($requete) { if($requete->num_rows > 0){ foreach($requete as $data){ ?>
                            <option value="<?= $data['serviceName'] ?>"><?= $data['serviceName'] ?></option>
    <?php }}} else {  echo "Error in ".$sqlClient."<br>".$connect->error; } ?>	
												  </select>
                          <!-- <label for="prix" class="col-sm-3 control-label">Prix</label> -->
                          <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix" required>
                             <!-- <label for="qtservice" class="col-sm-3 control-label">Quantite</label> -->
                            <input type="number" class="form-control" id="qtservice" name="qtservice" placeholder="Quantite" required>
                            <input type="number" class="form-control" id="clientId" value="<?php echo $clientId; ?>" name="clientId" style="display: none;" required>
												</div>
									</div>
											
											
										  
							
                      </div>
                      <div class="modal-footer editFolderFooter">
                        <button type="submit" class="btn btn-primary" name="addService">Save changes</button>
                      </div>
				 </form>
        
         <br>
         <r>
           <!-- services -->
           <div class="panel">
			 
			  <div class="panel-body">
			    <div class="remove-msg-client"></div>
			    	<table class="table table-bordered table-striped">
			    		
			    			<thead>
			    				<tr>
									<th>Service </th>
			    					<th>Prix</th>
			    					<th >Quantite</th>
                    <th>Action</th>
			    				</tr>
			    			</thead>

                <tbody>
                  <?php 
                    $reqq = "SELECT * FROM service WHERE client = '$clientId' ";
                    $results = $connect->query($reqq);
                  ?>
													<?php if($results->num_rows > 0){ ?>
                           
                            <?php
                            foreach($results as $data){ ?>
                            <tr>
                                <td><?= $data['nom']?></td>
                                <td><?= $data['prix']?></td>
                                <td><?= $data['quantite']?></td>
                                <td><a href="facturesanspdf.php?clientName=<?php echo $clientId; ?>&del=<?php echo $data['id']; ?>">Supprimer</a></td>
                          </tr>
                        
                                <?php } ?>
                                <div>
                                <button type="submit" class="btn btn-primary " name=""><a href="./php_action/facturesans.php?id=<?php echo $clientId; ?>&dossierid=<?php echo 000 ?>" style="color: #fff;"><i class="glyphicon glyphicon-print"></i> Imprimer</a></button> 
                                <button type="submit" class="btn btn-primary text-center" name="">Service(s): <?php echo mysqli_num_rows($results); ?></button>     <br>

                                  <br>
                                <form method="post" action="#">
                                <div class="form-group">
															<label for="folderName" class="col-sm-3 control-label">Type de transport</label>
														
                              <div class="col-sm-9">
												  <select class="form-control" id="folderType" name="typetransport">
												  
													<option>----Selectionner un Transport----</option>
													<option value="Aerien">Aerien</option>
													<option value="Maritime">Maritime</option>
													<option value="Routier">Routier</option>
												  </select>
												</div>
                              
                        <?php 
                          if(isset($_POST['trans'])) {
                            $trans = $_POST['typetransport'];

                            $dos = $_GET['dossierid'];

                            //$test = "SELECT * FROM transport WHERE dossier = '$dos' ";

                            $results = mysqli_query($connect, "SELECT * FROM transport WHERE dossier = '$dos' ");

                            if(mysqli_num_rows($results)) {
                              $req = "UPDATE transport set typedossier = '$trans' WHERE dossier = '$dossier' ";
                            
                              if($connect->query($req) == TRUE)  {
                                echo"<script type='text/javascript'>alert('Success')</script>";
                              } else {
                                echo"<script type='text/javascript'>alert('Echec')</script>";
                              }
                            } else {
                              $req = "INSERT INTO transport(typedossier, dossier) VALUES ('$trans', '$dos') ";
                            
                              if($connect->query($req) == TRUE)  {
                                echo"<div class='alert alert-success' role='alert'>
                                  Success
                                </div>";
                              } else {
                                echo"<div class='alert alert-danger' role='alert'>
                                  Echec
                              </div>";
                              }
                            }     

                          }
                        
                        ?>

                            <button type="submit" class="btn btn-primary text-center" name="trans">Ajouter</button>
												</div>
                            </form>

                            </div> <br>
                             <?php  } ?>	
											
                </tbody>
			    	</table>

			  </div>
			</div>

           <!-- end -->
<?php 

  if(isset($_POST['addService'])) {
    $serviceName = $_POST['serviceName'];
    $test = explode(" ", $serviceName);
    $qt = $_POST['qtservice'];
    $prix = $_POST['prix'];
    $id = $_POST['clientId'];
    $sql ="INSERT INTO service (nom,prix,quantite,client) VALUES('$test[0]', '$prix','$qt','$id')";
    
    if($connect->query($sql)==TRUE) {
      echo"<div class='alert alert-success' role='alert'>
        Success
      </div>
      ";

      echo '<script type="text/JavaScript"> 
     location.replace("facturesanspdf.php?clientName='.$clientId.'");
      </script>';

     
    } else {
      echo"<div class='alert alert-danger' role='alert'>
        Echec
    </div>";
    }
	
  }

?>

<?php 
   if(isset($_GET['del'])) {
     
     $del = $_GET['del'];

     $del = "DELETE FROM service WHERE id = '$del' ";
     $resdel = $connect->query($del);

     if($resdel) {
      echo '<script type="text/JavaScript">

      location.replace("facturesanspdf.php?clientName='.$clientId.'");
      </script>';
     }
     
   }



?>
		</div>
    <?php require_once ('./includes/footer.php');?>


 