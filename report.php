<?php 
session_start();

	if($_SESSION['status'] == 'adm') {
		require_once ('includes/header.php');
	} else {
		require_once ('includes/header2.php');
	}
?>

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
                                 <div class="panel-heading"> <i class=" glyphicon glyphicon-edit"></i> Impression d'un dossier </div>
                                 <div class="panel-body">
                                          <div class="remove-messages"> </div>

                                          <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                                <button class="btn btn-default" data-toggle="modal" data-target="#addFolderModal">
												 <i class="glyphicon glyphicon-plus-sign"></i>Selectionner Dossier</button>
                                           </div><!-- end of div action-->
<!-- 
                                           <table class="table table-bordered table-striped" id="manageClientTable">
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

        <?php if($requeteT) { if($requeteT->num_rows >0){?>
    	<?php } } else { echo "Error in ".$sqlT."<br>".$connect->error; } ?>




         <!-- modal customer sales-->
        <div class="modal fade" tabindex="-1" role="dialog" id="addFolderModal">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<!-- <h4 class="modal-title"> <i class="fa fa-plus"></i>Ajouter un client</h4> -->
				  </div>
				   <form class="form-horizontal" id="submitClForm" action="php_action/facturepdf.php" method="POST" target="_blink">
						<div class="modal-body">
							  <div id="add-brand-messages"></div>
												<div class="form-group">
															<!-- <label for="folderName" class="col-sm-3 control-label">Date vente</label>
														<div class="col-sm-9">
															<input type="date" class="form-control" name="dateSales" id="dateSales" placeholder="Date du vente" autocomplete="off">
														</div> -->
												</div>
									<div class="form-group">
											<label for="folderType" class="col-sm-3 control-label">Dossier</label>
												<div class="col-sm-9">
												  <select class="form-control" id="clientName" name="clientName">
												  
													<option value="">-----Selectionner Un Dossier---------</option>
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
                        <button type="submit" class="btn btn-primary" id="createdSalesClientBtn" name="submitForm" data-loading-text="loading...">Procceder</button>
                      </div>
				 </form>
				  
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		

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
		
	<script type="text/javascript" src="custom/js/facture.js"></script>
	<!--<script type="text/javascript" src="custom/js/pay.js"></script>-->

 <?php require_once ('includes/footer.php');?>
