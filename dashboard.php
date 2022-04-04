<?php require_once ('includes/header.php');?>

	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				  <li><a href="dashboard.php">Accueil</a></li>
				  
				  <li class="active">Client</li>
			</ol>
			<div class="panel">
			  <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> G&eacute;rer les Utilisateurs</div>
			  <div class="panel-body">
			    <div class="remove-msg-client"></div>

			    	<div class="div-action pull pull-right" style="padding-bottom:20px;">
			    		<button class="btn btn-primary" data-toggle="modal" data-target="#addClientModal"> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter un Utilisateur</button>
			    		

			    	</div> <!-- action-->

			    	<table class="table table-bordered table-striped" id="manageClientTable" >
			    		
			    			<thead>
			    				<tr>
									<th> Num&eacute;ro </th>
			    					<th>Username</th>
			    					<th style="width:15%;">Options</th>
			    				</tr>
			    			</thead>
			    	</table>

			  </div>
			</div>
			

		</div>
		

	</div>

	<!-- --------------Ajouter client----------------------------------->
	<div class="modal fade" tabindex="-1" role="dialog" id="addClientModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"> Ajouter un Utilisateur</i></h4>
      </div>
	  <form class="form-horizontal" id="submitFormClient" action="php_action/createUser.php" method="POST">
      <div class="modal-body">
		<div id="add-client-messages"></div>
	  
			  <div class="form-group">
				<label for="clientName" class="col-sm-3 control-label">Nom d'Utilisateur </label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Nom de l'utilisateur">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="clientAddress" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="clientAddress" name="clientAddress" placeholder="Mot de passe">
				</div>
			  </div> 
		</div>
		
        <!-- fin modal body-->
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="createClientBtn" data-loading-text="Loading...">Enregistrer</button>
      </div>
	  </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------------------- Modifier un Utilisateur ---------------------------->
<div class="modal fade" tabindex="-1" role="dialog" id="editClientModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"> Modifier Utilisateur</i></h4>
      </div>
	  <form class="form-horizontal" id="editFormClient" action="php_action/editUser.php" method="POST">
      <div class="modal-body">
		<div id="edit-client-messages"></div>
				 <div class="form-group">
				<label for="editClientName" class="col-sm-3 control-label">Nom Utilisateur </label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="editClientName" name="editClientName" placeholder="Nom du client">
				</div>
			  </div>
			 
			  <div class="form-group">
				<label for="editClientAddress" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="editClientAddress" name="editClientAddress" placeholder="Adresse du client">
				</div>
			  </div>
        
      </div>
      <div class="modal-footer editClientFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
	  </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ----------------supprimer un client-------------------------------->


<div class="modal fade" tabindex="-1" role="dialog" id="removeClientModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="glyphicon glyphicon-trash"></i>Suppression d'un Utilisateur</h4>
      </div>
      <div class="modal-body">
        <p>Souhaitez-vous vraiment supprimer l'utilisateur?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-ok-sign"></i>Close</button>
        <button type="button" class="btn btn-primary" id="removeClientBtn"><i class="glyphicon glyphicon-ok-sign"></i>Supprimer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


	<script type="text/javascript" src="custom/js/users.js"></script>

 <?php require_once ('includes/footer.php');?>
