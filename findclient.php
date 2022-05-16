<?php 
session_start();

	if($_SESSION['status'] == 'adm') {
		require_once ('includes/header.php');
	} else {
		require_once ('includes/header2.php');
	}


?>

<?php
    $id = $_GET['id'];
    $dossier = $_GET['dossierid'];
    $nomDossier = $_GET['nom'];
    $nomClient = "";
    $adresse = "";
    $phone = "";
       $clientId = $_GET['id'];
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
                            <option value="<?= $data['serviceName'] ?>"><?= $data['serviceName'] ?></option>
    <?php }}} else {  echo "Error in ".$sqlClient."<br>".$connect->error; } ?>	
												  </select>
                             <!-- <label for="qtservice" class="col-sm-3 control-label">Quantite</label> -->
                             <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix" required>
                            <input type="number" class="form-control" id="qtservice" name="qtservice" placeholder="Quantite" required>
												</div>
									</div>
											
											
										  
							
                      </div>
                      <div class="modal-footer editFolderFooter">
                        <button type="submit" class="btn btn-primary" name="addService">Save changes</button>
                      </div>
				 </form>

         
         <!-- end -->
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
               
                    $reqq = "SELECT * FROM service WHERE client = '$clientId' AND dossier = '$dossier' ";
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
                                <button type="submit" class="btn btn-primary " name=""><a target="_blank" href="./php_action/facturesans.php?id=<?php echo $clientId; ?>&dossierid=<?php echo $dossier; ?>&se=1" style="color: #fff;"><i class="glyphicon glyphicon-print"></i> Imprimer</a></button> 
                                <button type="submit" class="btn btn-primary text-center" name="">Service(s): <?php echo mysqli_num_rows($results); ?></button>     <br><br>
                                <hr>
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
                                <form method="post" action="#">
                                <div class="form-group">
															<label for="folderName" class="col-sm-3 control-label">References</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="reference" id="nameFolder" placeholder="Reference" autocomplete="off" required>
														</div>

                            <button type="submit" class="btn btn-primary text-center" name="ref">Ajouter</button>
												</div>

                         <!-- reference -->
         <div class="panel">
         <div class="panel-body">
			    <div class="remove-msg-client"></div>
			    	<table class="table table-bordered table-striped">
			    		
			    			<thead>
			    				<tr>
                    <th>Reference</th>
                    <th>Action</th>
			    				</tr>
			    			</thead>
                        <?php
                        $dos = $_GET['dossierid'];

                        $req = "SELECT * FROM reference WHERE dossier = '$dos' ";
                        $results = $connect->query($req); ?>

                        
                        <?php if($results->num_rows > 0){ ?>
                          <?php
                            $idd = $_GET['id'];
                            $dos = $_GET['dossierid'];
                            $nom = $_GET['nom'];

                            foreach($results as $data){ ?>
                            <tr>
                                <td><?= $data['no_reference']?></td>   
                                <td> <a href="findclient.php?id=<?php echo $idd?>&dossierid=<?php echo $dos ?>&nom=<?php echo $nom ?>&ideref=<?php echo $data['id'] ?>">Supprimer</a> </td>
                          </tr>
                        
                           <?php }}

                           ?>
                                
                        
                       
                <tbody>
                <?php 
                
                  if(isset($_GET['ideref'])) {
                    $del = $_GET['ideref'];

                    $del = "DELETE FROM reference WHERE id = '$del' ";
                    $rr = $connect->query($del);
                    echo "<script>
                    window.onload = function() {
                      if(!window.location.hash) {
                        window.location = window.location + '#loaded';
		                    window.location.reload();
                      }
                    }
                    </script>";
                  }

                  ?>
                </tbody>
			    	</table>

			  </div>
			</div>
      
                              </form>

                              <?php 

                                if(isset($_POST['ref'])) {
                                 $ref = $_POST['reference'];
                                 $dossierid = $_GET['dossierid'];
                                 
                                 $sql ="INSERT INTO reference (no_reference, dossier) VALUES('$ref', '$dossier')";
                                  if($connect->query($sql)==TRUE) {
                                    echo "<script>
                                            window.onload = function() {
                                              if(!window.location.hash) {
                                                window.location = window.location + '#loaded';
                                                window.location.reload();
                                              }
                                            }
                                            </script>";
                                  } else {
                                    echo"<div class='alert alert-danger' role='alert'>
                                      Echec
                                  </div>";
                                  }
                                }
                              
                              
                              ?>
                              <br>
                            </div> <br>
                             <?php  } ?>	
											
                </tbody>
			    	</table>

			  </div>
			</div>

<?php 

  if(isset($_POST['addService'])) {
    $serviceName = $_POST['serviceName'];
    $test = explode(" ", $serviceName);
    $qt = $_POST['qtservice'];
    $prix = $_POST['prix'];
    $sql ="INSERT INTO service (nom,prix,quantite,client, dossier) VALUES('$test[0]', '$prix','$qt','$id','$dossier')";
    
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

                    <!-- reference -->
                    <div class="container">
         <div class="panel-body">
			    <div class="remove-msg-client"></div>
			    	<table class="table table-bordered table-striped">
			    		
			    			<thead>
			    				<tr>
                    <th>Type Transport</th>
                    <th>Action</th>
			    				</tr>
			    			</thead>
                        <?php
                        $dos = $_GET['dossierid'];

                        $req = "SELECT * FROM transport WHERE dossier = '$dos' ";
                        $results = $connect->query($req); ?>

                        
                        <?php if($results->num_rows > 0){ ?>
                          <?php
                            $idd = $_GET['id'];
                            $dos = $_GET['dossierid'];
                            $nom = $_GET['nom'];

                            foreach($results as $data){ ?>
                            <tr>
                                <td><?= $data['typedossier']?></td>   
                                <td> <a href="findclient.php?id=<?php echo $idd?>&dossierid=<?php echo $dos ?>&nom=<?php echo $nom ?>&idetrans=<?php echo $data['Id'] ?>">Supprimer</a> </td>
                          </tr>
                        
                           <?php }}

                           ?>
                                
                        
                       
                <tbody>
                <?php 
                
                  if(isset($_GET['ideref'])) {
                    $del = $_GET['ideref'];

                    $del = "DELETE FROM reference WHERE id = '$del' ";
                    $rr = $connect->query($del);
                    echo "<script>
                    window.onload = function() {
                      if(!window.location.hash) {
                        window.location = window.location + '#loaded';
		                    window.location.reload();
                      }
                    }
                    </script>";
                  }

                  ?>
                </tbody>
			    	</table>

			  </div>
			</div>
		</div>

    <!-- transport -->
    
    <?php 
                
                if(isset($_GET['idetrans'])) {
                  $del = $_GET['idetrans'];

                  $del = "DELETE FROM transport WHERE Id = '$del' ";
                  $rr = $connect->query($del);
                  echo "<script>
                  window.onload = function() {
                    if(!window.location.hash) {
                      window.location = window.location + '#loaded';
                      window.location.reload();
                    }
                  }
                  </script>";
                }

                ?>
    <!-- end -->

    <?php require_once ('includes/footer.php');?>


 