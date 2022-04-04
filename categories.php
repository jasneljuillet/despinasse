<?php require_once ('includes/header.php');?>
<?php
$valueT = 0;
$sqlClient = "SELECT Num_Dossier,nom From dossier";
$sqlServices = "SELECT Id,serviceName,serviceDesc,servicePrix FROM pservices";
$requete = $connect->query($sqlClient);
$requeteServices = $connect->query($sqlServices);
$sqlT = "SELECT price FROM tempcart where isActive = true";
$requeteT = $connect->query($sqlT);
// $connect ->close();



?>

        <div class="row">

                <div class="col-md-12">
                     <ol class="breadcrumb">
                         <li><a href="dashboard.php">Accueil</a></li>
                          <li class="active">Dossier</li>
                    </ol>

                        <div class="panel panel-default">
                                 <div class="panel-heading"> <i class=" glyphicon glyphicon-edit"></i> Ajouter des Services dans des dossiers</div>
                                 <div class="panel-body">
                                          <div class="remove-messages"> </div>

                                          <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                                <button class="btn btn-default" data-toggle="modal" data-target="#addFolderModal">
												 <i class="glyphicon glyphicon-plus-sign"></i>Selectionner client</button>
                                           </div><!-- end of div action-->

                                           <!-- <table class="table table-bordered table-striped" id="manageClientTable">
                                                 <thead>
                                                     <tr>
															<th> # </th>
                                                            <th>Date de vente</th>
                                                            <th>Client</th>
															<th>vendre</th>               
                                                        </tr>
                                                 </thead>
                                           </table> -->

                                </div>
                        </div>
                </div> <!-- end of col-md-12-->

        </div> <!-- end of row -->


        <!-- datatable sales -->

        <div class="row">

                <!-- <div class="col-md-12">
                     <ol class="breadcrumb">
                         <li><a href="dashboard.php">Accueil</a></li>
                          <li class="active">Dossier</li>
                    </ol> -->

                        <!-- <div class="panel panel-default"> -->
                                 <!-- <div class="panel-heading"> <i class=" glyphicon glyphicon-edit"></i>Gestion des dossiers </div>
                                 <div class="panel-body">
                                          <div class="remove-messages"> </div> -->
                                          <?php 
                                          	// if($requeteT) {
											// 	if($requeteT->num_rows > 0){
											// 		foreach($requeteT as $dataT){
											// 			$valueT += $dataT['price'];
											// 		}
											// 		echo '<strong>Montant Total: '.$valueT.'$</strong>';
											// 	} else {
											// 		echo "Error in ".$sqlT."<br>".$db->error;
											// 	}
											//   }
                                          ?>
                                          <!--<div class="div-action pull pull-right" style="padding-bottom:20px;">
                                                <button class="btn btn-default" data-toggle="modal" data-target="#addFolderModal">
												 <i class="glyphicon glyphicon-plus-sign"></i>Ajouter un dossier</button>
                                           </div> end of div action-->

                                           <!-- <table class="table table-bordered table-striped" id="manageFactureTable">
                                                 <thead>
                                                     <tr>
															<th> # </th>
                                                            <th>Date de vente</th>
                                                            <th>Client</th>
															
															<th>Services</th>
                                                            <th>Description</th>-->
                                                            <!--<th>Total</th>-->
                                                            <!-- <th>Price</th> -->
                                                            <!--<th>Total Price</th>-->
                                                            <!-- <th>Action</th> -->
															
                                                            
                                                        </tr>
                                                 </thead>
                                           </table>

                                </div>
                        </div>
                </div>

        </div> 

        <?php if($requeteT) { if($requeteT->num_rows >0){?>
        <!-- <div class="div-action pull pull-right" style="padding-bottom:20px;">
            <button class="btn btn-default" data-toggle="modal" data-target="#addPayModal">
				<i class="glyphicon glyphicon-plus-sign"></i>Ajouter Paiement</button>
        </div> -->
    	<?php } } else { echo "Error in ".$sqlT."<br>".$connect->error; } ?>



    	<!-- modal payment -->
    	<div class="modal fade" tabindex="-1" role="dialog" id="addPayModal">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> <i class="fa fa-plus"></i>Ajouter Paiement</h4>
				  </div>
				   <form class="form-horizontal" id="submitPaiementForm" action="php_action/createPaiement.php" method="POST">
						<div class="modal-body">
							  <div id="add-brand-messages"></div>
												<div class="form-group">
															<label for="folderName" class="col-sm-3 control-label">Total : <?= $valueT ?>$</label>
														<div class="col-sm-9">
															<input type="hidden" class="form-control" name="amount" id="amount" placeholder="Date du vente" value="<?= $valueT?>">
														</div>
												</div>
									
												<div class="form-group">
															<label for="folderName" class="col-sm-3 control-label">Pay : </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="amountPay" id="amountPay" placeholder="Paie">
														</div>
												</div>

												
                                    
							
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="createPaiementBtn" name="submitForm" data-loading-text="loading...">Procedder</button>
                      </div>
				 </form>
				  
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

         <!-- modal customer sales-->
        <div class="modal fade" tabindex="-1" role="dialog" id="addFolderModal">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> <i class="fa fa-plus"></i>Ajouter un client</h4>
				  </div>
				   <form class="form-horizontal" id="submitClForm" action="php_action/clientInfo.php" method="POST">
						<div class="modal-body">
							  <div id="add-brand-messages"></div>
												<div class="form-group">
															<!-- <label for="folderName" class="col-sm-3 control-label">Date vente</label>
														<div class="col-sm-9">
															<input type="date" class="form-control" name="dateSales" id="dateSales" placeholder="Date du vente" autocomplete="off">
														</div> -->
												</div>
									<div class="form-group">
											<label for="folderType" class="col-sm-3 control-label">Client</label>
												<div class="col-sm-9">
												  <select class="form-control" id="clientName" name="clientName">
												  
													<option value="">-----Selectionner Client---------</option>
                                                    <!-- list client -->
													<?php if($requete->num_rows > 0){ foreach($requete as $data){ ?>
                                                    <option value="<?= $data['nom']?>"><?= $data['nom']?></option>
                                                    <?php }} ?>	
												  </select>
												</div>
									</div>
                                    
							
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="createdSalesClientBtn" name="submitForm" data-loading-text="loading...">Save changes</button>
                      </div>
				 </form>
				  
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
        <!-- Sales Product-->
        <div class="modal fade" tabindex="-1" role="dialog" id="addFolderModal">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> <i class="fa fa-plus"></i>Ajouter Produit</h4>
				  </div>
				   <form class="form-horizontal" id="submitSalesForm" action="php_action/createFolder.php" method="POST">
						<div class="modal-body">
							  <div id="add-brand-messages"></div>
												<div class="form-group">
															<label for="folderName" class="col-sm-3 control-label">Nom du dossier</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="nameFolder" id="nameFolder" placeholder="Nom du dossier" autocomplete="off">
														</div>
												</div>
									<div class="form-group">
											<label for="folderType" class="col-sm-3 control-label">Type du dossier</label>
												<div class="col-sm-9">
												  <select class="form-control" id="folderType" name="folderType">
												  
													<option value="">----Selectionner un service----</option>
													<option value="1">Import</option>
													<option value="2">Export</option>
													<option value="3">Local</option>
													
													
												  </select>
												</div>
									</div>
											<div class="form-group">
															<label for="creationDate" class="col-sm-3 control-label">Description</label>
														<div class="col-sm-9">
															<textarea name="description" id="" cols="30" rows="10"></textarea>
														</div>
											</div>
											<div class="form-group">
															<label for="destinataire" class="col-sm-3 control-label">Quantity</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="qtyProduct" id="destinataire" placeholder="Destinataire du dossier" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="descripCollis" class="col-sm-3 control-label">Discount</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="descripCollis" id="descripCollis" placeholder="Description du Collis" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="poids" class="col-sm-3 control-label">Poids du Collis</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="poids" id="poids" placeholder="Poids du Collis" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="bLading" class="col-sm-3 control-label">Bill Lading</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="bLading" id="bLading" placeholder="Bill Lading" autocomplete="off">
														</div>
											</div>
											
										  
							
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="createdFolderBtn" data-loading-text="loading...">Save changes</button>
                      </div>
				 </form>
				  
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		 <!-- Editer un dossier-->
         

        

 <div class="modal fade" tabindex="-1" role="dialog" id="editFolderModal">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> <i class="fa fa-plus"></i>Ajouter Services</h4>
				  </div>
				   <form class="form-horizontal" id="editFolderForm" action="php_action/createSalesServices.php" method="POST">
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
												  <select class="form-control" id="editServiceType" name="serviceName">
												  
													<option value="">----Selectionner un dossier----</option>
													<?php if($requeteServices->num_rows > 0){ foreach($requeteServices as $data){ ?>
                                                    <option value="<?= $data['Id'].' '.$data['serviceName'].' '.$data['servicePrix']?>"><?= $data['serviceName']?></option>
                                                    <?php }} ?>
													
													
												  </select>
												</div>
									</div>
											
											
										  
							
                      </div>
                      <div class="modal-footer editFolderFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addService">Save changes</button>
                      </div>
				 </form>
				  
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<!-- supprimer un dossier-->
		
		 <div class="modal fade" tabindex="-1" role="dialog" id="removeFolderModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>Remove Folder</h4>
                      </div>
                      <div class="modal-body">
					  
                        <p>Voulez-vous vraiment supprimer le dossier?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i>Close</button>
                        <button type="button" class="btn btn-primary" id="removeFolderBtn"><i class="glyphicon glyphicon-ok-sign"></i>Supprimer</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
	<script type="text/javascript" src="custom/js/facture.js"></script>
	<!--<script type="text/javascript" src="custom/js/pay.js"></script>-->

 <?php require_once ('includes/footer.php');?>
