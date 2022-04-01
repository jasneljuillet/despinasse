<?php
    $id = $_GET['id'];
    $dossier = $_GET['dossierid'];
    $nomDossier = $_GET['nom'];
    $nomClient = "";
    $adresse = "";
    $phone = "";
   
    require_once('./php_action/core.php');
    require_once('./includes/header.php');
  
    $sql = "SELECT * FROM client WHERE numClient = '$id' ";
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
        <div class="form-group">
				<label for="clientPhone" class="col-sm-3 control-label">Nom dossier</label>
				<div class="col-sm-9">
        <input type="text" class="form-control" id="clientPhone" name="clientPhone" value=<?php echo $nomDossier ?> disabled>
				</div>
			  </div>
  
        <div class="form-group">
				<label for="clientPhone" class="col-sm-3 control-label">No dossier</label>
				<div class="col-sm-9">
        <input type="text" class="form-control" id="clientPhone" name="clientPhone" value=<?php echo $dossier ?> disabled>
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
                            <option value="<?= $data['serviceName'].' '.$data['servicePrix']?>"><?= $data['serviceName'].' '. $data['servicePrix'].'$ht' ?></option>
    <?php }}} else {  echo "Error in ".$sqlClient."<br>".$connect->error; } ?>	
												  </select>
                             <label for="qtservice" class="col-sm-3 control-label">Quantite</label>
                            <input type="number" class="form-control" id="qtservice" name="qtservice" required>
												</div>
									</div>
											
											
										  
							
                      </div>
                      <div class="modal-footer editFolderFooter">
                        <button type="submit" class="btn btn-primary" name="addService">Save changes</button>
                      </div>
				 </form>
<?php 

  if(isset($_POST['addService'])) {
    $serviceName = $_POST['serviceName'];
    $test = explode(" ", $serviceName);
    $qt = $_POST['qtservice'];
    $sql ="INSERT INTO service (nom,prix,quantite,client, dossier) VALUES('$test[0]', '$test[1]','$qt','$id','$dossier')";
    
    if($connect->query($sql)==TRUE) {
      echo"<div class='alert alert-success' role='alert'>
        Success
      </div>";
    } else {
      echo"<div class='alert alert-danger' role='alert'>
        Echec
    </div>";
    }
	
  }

?>
		</div>


    <?php require_once ('includes/footer.php');?>


 