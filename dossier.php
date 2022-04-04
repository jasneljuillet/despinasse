<?php require_once ('includes/header.php');
 $sqlClient = "SELECT * FROM client";
 $requete = $connect->query($sqlClient);
?>


        <div class="row">

                <div class="col-md-12">
                     <ol class="breadcrumb">
                         <li><a href="dashboard.php">Accueil</a></li>
                          <li class="active">Dossier</li>
                    </ol>

                        <div class="panel panel">
                                 <div class="panel-heading"> <i class=" glyphicon glyphicon-edit"></i> Gestion des dossiers </div>
                                 <div class="panel-body">
                                          <div class="remove-messages"> </div>

                                          <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#addFolderModal">
												 <i class="glyphicon glyphicon-plus-sign"></i>Ajouter un dossier</button>
                                           </div><!-- end of div action-->

                                           <table class="table table-bordered table-striped" id="manageFolderTable">
                                                 <thead>
                                                     <tr>
															<th> # </th>
                                                            <th>Nom du Dossier</th>
                                                            <th>Type du Dossier</th>
															
															<th>Date de Cr&eacute;ation</th>
															<th>Destinataire</th>
															<th>Description du Collis</th>
															<th>Poids Collis </th> 
															<th>Billl Lading</th>
															
                                                            <th style="width:5;"> Options</th>
                                                        </tr>
                                                 </thead>
                                           </table>

                                </div>
                        </div>
                </div> <!-- end of col-md-12-->

        </div> <!-- end of row -->


         <!-- modal-->
        <div class="modal fade" tabindex="-1" role="dialog" id="addFolderModal">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> <i class="fa fa-plus"></i>Ajouter un dossier</h4>
				  </div>
				   <form class="form-horizontal" id="submitFolderForm" action="php_action/createFolder.php" method="POST">
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
												  
													<option value="">----Selectionner un dossier----</option>
													<option value="1">Import</option>
													<option value="2">Export</option>
													<option value="3">Local</option>
													
													
												  </select>
												</div>
									</div>
											<div class="form-group">
															<label for="creationDate" class="col-sm-3 control-label">Date de Cr&eacute;tion</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="creationDate" id="creationDate" value ="<?php echo date("y-m-d");?>" placeholder="Date de cr&eacute;tion du dossier" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="destinataire" class="col-sm-3 control-label">Destinataire</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="destinataire" id="destinataire" placeholder="Destinataire du dossier" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="descripCollis" class="col-sm-3 control-label">Description du Collis</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="descripCollis" id="descripCollis" placeholder="Description du Collis" autocomplete="off">
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
											
										  
											<label for="folderType" class="col-sm-3 control-label">Client</label>
												<div class="col-sm-9">
												  <select class="form-control" id="folderType" name="clientDossier">
												  
													<option value="">----Selectionner un Client----</option>
													<?php
													
													if ($requete->num_rows > 0) {
     
														while($row = $requete->fetch_assoc()) {
															echo '<option value="'.$row['numClient'].'">'.$row['nomClient'].'</option>';
														}
													  }
													
													?>
												  </select>
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
					<h4 class="modal-title"> <i class="fa fa-plus"></i>Modifier un dossier</h4>
				  </div>
				   <form class="form-horizontal" id="editFolderForm" action="php_action/editFolder.php" method="POST">
						<div class="modal-body">
							  <div id="edit-folder-messages"></div>
												<div class="form-group">
															<label for="folderName" class="col-sm-3 control-label">Nom du dossier</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="editFolderName" id="editdFolderName" placeholder="Nom du dossier" autocomplete="off">
														</div>
												</div>
									<div class="form-group">
											<label for="folderType" class="col-sm-3 control-label">Type du dossier</label>
												<div class="col-sm-9">
												  <select class="form-control" id="editFolderType" name="editFolderType">
												  
													<option value="">----Selectionner un dossier----</option>
													<option value="Import">Import</option>
													<option value="Export">Export</option>
													<option value="Local">Local</option>
													
													
												  </select>
												</div>
									</div>
											<div class="form-group">
															<label for="creationDate" class="col-sm-3 control-label">Date de Cr&eacute;tion</label>
														<div class="col-sm-9">
															<input type="date" class="form-control" name="editCreationDate" id="editCreationDate" placeholder="Date de cr&eacute;tion du dossier" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="destinataire" class="col-sm-3 control-label">Destinataire</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="editDestinataire" id="editDestinataire" placeholder="Destinataire du dossier" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="descripCollis" class="col-sm-3 control-label">Description du Collis</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="editDescripCollis" id="editDescripCollis" placeholder="Description du Collis" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="poids" class="col-sm-3 control-label">Poids du Collis</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="editPoids" id="editPoids" placeholder="Poids du Collis" autocomplete="off">
														</div>
											</div>
											<div class="form-group">
															<label for="bLading" class="col-sm-3 control-label">Bill Lading</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="editBLading" id="editBLading" placeholder="Bill Lading" autocomplete="off">
														</div>
											</div>
											
										  
							
                      </div>
                      <div class="modal-footer editFolderFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
	<script type="text/javascript" src="custom/js/folder.js"></script>

 <?php require_once ('includes/footer.php');?>
