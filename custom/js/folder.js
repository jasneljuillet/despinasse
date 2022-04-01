var manageFolderTable;

$(document).ready(function () {

	// top bar active
	$("#navDossier").addClass('active');
	// manage BrandTable
	manageFolderTable = $("#manageFolderTable").DataTable({

		'ajax': 'php_action/fetchFolder.php',
		'order':[]
	});
	// submit brand form function

	$("#submitFolderForm").unbind('submit').bind('submit',function(){

			//remove the text error
			$(".text-danger").remove();
			// remove the form error
			$(".form-group").removeClass('has-error').removeClass('has-success');

			var nameFolder = $("#nameFolder").val();
			var folderType = $("#folderType").val();
			var creationDate = $("#creationDate").val();
			var destinataire = $("#destinataire").val();
			var descripCollis = $("#descripCollis").val();
			var poids = $("#poids").val();
			var bLading = $("#bLading").val();

			if(nameFolder =="")
			{
				$("#nameFolder").after('<p class="text-danger">Le nom du Dossier est obligatoire</p>');
				$("#nameFolder").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#nameFolder").find('.text-danger').remove();
				$("#nameFolder").closest('.form-group').addClass('has-success');
			}
			
			// Type du dossier
			if(folderType =="")
			{
				$("#folderType").after('<p class="text-danger">Le type du dossier est obligatoire</p>');
				$("#folderType").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#folderType").find('.text-danger').remove();
				$("#folderType").closest('.form-group').addClass('has-success');
			}
			
			// date de creation
			
			if(creationDate =="")
			{
				$("#creationDate").after('<p class="text-danger">La date de creation est obligatoire</p>');
				$("#creationDate").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#creationDate").find('.text-danger').remove();
				$("#creationDate").closest('.form-group').addClass('has-success');
			}
			// destinataire
			
			if(destinataire =="")
			{
				$("#destinataire").after('<p class="text-danger">Le destinataire est obligatoire</p>');
				$("#destinataire").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#destinataire").find('.text-danger').remove();
				$("#destinataire").closest('.form-group').addClass('has-success');
			}
			
			// bill Lading
			if(bLading =="")
			{
				$("#bLading").after('<p class="text-danger">Le num&eacute;ro de Bill est obligatoire</p>');
				$("#bLading").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#bLading").find('.text-danger').remove();
				$("#bLading").closest('.form-group').addClass('has-success');
			}
			
			
				if(nameFolder && folderType && creationDate && destinataire && bLading)
				{
					var form =$(this);
					// button loading
					$("#createdFolderBtn").button('loading');
					$.ajax({
							url:form.attr('action'),
							type:form.attr('method'),
							data:form.serialize(),
							dataType:'json',
							success: function(response)
							{
								// button loading
								$("#createdFolderBtn").button('reset');
								if(response.success==true)
								{
									// reload the manage table
									manageFolderTable.ajax.reload(null,false);
									// reset the form text
									$("#submitFolderForm")[0].reset();
									// remove the text error
									$(".text-danger").remove();
									// remove the form error
									$(".form-group").removeClass('has-error').removeClass('has-success');
									$("#add-brand-messages").html('<div class="alert alert-success">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong>'+response.messages+
									'</div>');
									$(".alert-success").delay(500).show(10, function(){
										$(this).delay(3000).hide(10, function(){
											$(this).remove();

										});
									});
								}
							}

					});
				}
			return false;
	});
	// fin de la forme

});



		

		function editFolder(folderId = null)
		{
			if(folderId)
			{	// remove folder Id
				$("#folderId").remove();
				// refresh the form
				$("#editFolderForm")[0].reset();
				// remove text
				$(".text-danger").remove();
				// remove form error
				$(".form-group").removeClass('has-error').removeClass('has-success');
				$(".editFolderFooter").after('<input type="hidden" name="folderId" id="folderId" value="'+ folderId+'"/>');
				$.ajax({

						url:'php_action/fetchSelectFolder.php',
						type : 'post',
						data : {folderId:folderId},
						dataType :'json',
						success:function(response)
						{
							$("#editdFolderName").val(response.Nom);
							$("#editFolderType").val(response.TypeDossier);
							$("#editCreationDate").val(response.Date_creation);
							$("#editDestinataire").val(response.Destinataire);
							$("#editDescripCollis").val(response.Description_collis);
							$("#editPoids").val(response.Poids_collis);
							$("#editBLading").val(response.Bill_Lading);
							// La modification 
										
	$("#editFolderForm").unbind('submit').bind('submit',function(){

			//remove the text error
			$(".text-danger").remove();
			// remove the form error
			$(".form-group").removeClass('has-error').removeClass('has-success');

			var nameFolder = $("#editdFolderName").val();
			var folderType = $("#editFolderType").val();
			var creationDate = $("#editCreationDate").val();
			var destinataire = $("#editDestinataire").val();
			var descripCollis = $("#editDescripCollis").val();
			var poids = $("#editPoids").val();
			var bLading = $("#editBLading").val();

			if(nameFolder =="")
			{
				$("#editdFolderName").after('<p class="text-danger">Le nom du Dossier est obligatoire</p>');
				$("#editdFolderName").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#editdFolderName").find('.text-danger').remove();
				$("#editdFolderName").closest('.form-group').addClass('has-success');
			}
			
			// Type du dossier
			if(folderType =="")
			{
				$("#editFolderType").after('<p class="text-danger">Le type du dossier est obligatoire</p>');
				$("#editFolderType").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#editFolderType").find('.text-danger').remove();
				$("#editFolderType").closest('.form-group').addClass('has-success');
			}
			
			// date de creation
			
			if(creationDate =="")
			{
				$("#editCreationDate").after('<p class="text-danger">La date de creation est obligatoire</p>');
				$("#editCreationDate").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#editCreationDate").find('.text-danger').remove();
				$("#editCreationDate").closest('.form-group').addClass('has-success');
			}
			// destinataire
			
			if(destinataire =="")
			{
				$("#editDestinataire").after('<p class="text-danger">Le destinataire est obligatoire</p>');
				$("#editDestinataire").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#editDestinataire").find('.text-danger').remove();
				$("#editDestinataire").closest('.form-group').addClass('has-success');
			}
			
			// bill Lading
			if(bLading =="")
			{
				$("#editBLading").after('<p class="text-danger">Le num&eacute;ro de Bill est obligatoire</p>');
				$("#editBLading").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#editBLading").find('.text-danger').remove();
				$("#editBLading").closest('.form-group').addClass('has-success');
			}
			
			 
				if(nameFolder && folderType && creationDate && destinataire && bLading)
				{
					var form =$(this);
					// button loading
					//$("#createdFolderBtn").button('loading');
					$.ajax({
							url:form.attr('action'),
							type:form.attr('method'),
							data:form.serialize(),
							dataType:'json',
							success: function(response)
							{
								// button loading
								//$("#createdFolderBtn").button('reset');
								if(response.success==true)
								{
									// reload the manage table
									manageFolderTable.ajax.reload(null,false);
									// reset the form text
									$("#editFolderForm")[0].reset();
									// remove the text error
									$(".text-danger").remove();
									// remove the form error
									$(".form-group").removeClass('has-error').removeClass('has-success');
									$("#edit-folder-messages").html('<div class="alert alert-success">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong>'+response.messages+
									'</div>');
									$(".alert-success").delay(500).show(10, function(){
										$(this).delay(3000).hide(10, function(){
											$(this).remove();

										});
									});
								}
							}

					});
				}
			return false;
	});
							
										
 // fin de l'ajour
						}


				}); // fin ajax select
			} // if folderId
		}// fin de function


		
// remove folder

function removeFolder(folderId = null)
{
	if(folderId)
	{
		$("#removeFolderBtn").unbind('click').bind('click',function(){
			$.ajax({
				url : 'php_action/removeFolder.php',
				type : 'post',
				data : { folderId : folderId},
				dataType : 'json',
				success:function(response)
				{
					if(response.success== true)
					{
						// hide the modal 
						$("#removeFolderModal").modal('hide');
						// reload the table
							manageFolderTable.ajax.reload(null,false);
							$(".remove-messages").html('<div class="alert alert-success">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong>'+response.messages+
									'</div>');
									$(".alert-success").delay(500).show(10, function(){
										$(this).delay(3000).hide(10, function(){
											$(this).remove();

										});
									});
					}
				}



			});// fin de ajax
			
		});// fin de remove folder btn
	}
	
}