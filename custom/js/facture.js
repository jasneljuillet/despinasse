var manageClientTable
var manageFactureTable
$(document).ready(function(){
$("#navClient").addClass('active');
// manage client table

manageClientTable = $("#manageClientTable").DataTable({
    'ajax': 'php_action/fetchFacture.php',
    'order':[]
});

manageFactureTable = $("#manageFactureTable").DataTable({
    'ajax': 'php_action/fetchTemp.php',
    'order':[]
});

$("#submitClForm").unbind('submit').bind('submit',function(){

	var clientName = $("#clientName").val();
	var dateSales = $("#dateSales").val();
	

	if(clientName =="")
			{
				$("#clientName").after('<p class="text-danger">Le nom du client est obligatoire</p>');
				$("#clientName").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#clientName").find('.text-danger').remove();
				$("#clientName").closest('.form-group').addClass('has-success');
			}

			if(dateSales =="")
			{
				$("#clientAddress").after('<p class="text-danger">L\'adresse du client est obligatoire</p>');
				$("#clientAddress").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#clientAddress").find('.text-danger').remove();
				$("#clientAddress").closest('.form-group').addClass('has-success');
			}

			
			if(clientName && $dateSales)
			{
				var form = $(this);

                $("#createdSalesClientBtn").button('loading');
					$.ajax({
							url:form.attr('action'),
							type:form.attr('method'),
							data:form.serialize(),
							dataType:'json',
							success: function(response)
							{
								// button loading
								$("#createdSalesClientBtn").button('reset');
								if(response.success==true)
								{
									// reload the manage table
									manageFolderTable.ajax.reload(null,false);
									// reset the form text
									$("#submitClientForm")[0].reset();
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
});// fin de ajax*/



$("#submitPaiementForm").unbind('submit').bind('submit',function(){

	var amountTotal = $("#amount").val();
	var amountPay = $("#amountPay").val();
	
	

	if(amountPay =="")
			{
				$("#amountPay").after('<p class="text-danger">ce champs est obligatoire</p>');
				$("#amountPay").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#amountPay").find('.text-danger').remove();
				$("#amountPay").closest('.form-group').addClass('has-success');
			}

			

			
			if(amountPay)
			{
				console.log(amountPay);
				var form = $(this);
				console.log(form);
                $("#createPaiementBtn").button('loading');
					$.ajax({
							url:form.attr('action'),
							type:form.attr('method'),
							data:form.serialize(),
							dataType:'json',
							success: function(response)
							{
								console.log(response);
								// button loading
								$("#createPaiementBtn").button('reset');
								if(response.success==true)
								{
									// reload the manage table
									manageFactureTable.ajax.reload(null,false);
									manageFactureTable.ajax.reload(null,false);
									// reset the form text
									$("#submitPaiementForm")[0].reset();
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
});// fin de ajax*/




});// fin de jquery

function addService(clientId = null)
{
	if(clientId)
	{	
		$("#clientId").remove();
		// refresh the form
		$("#editFolderForm")[0].reset();
		// remove text
		$(".text-danger").remove();
		// remove form error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".editFolderFooter").after('<input type="hidden" name="clientId" id="clientId" value="'+clientId+'"/>');
		$.ajax({

			url:'php_action/fetchSelectCustomer.php',
			type : 'post',
			data : {clientId:clientId},
			dataType :'json',
			success:function(response)
			{
				
				$("#editServiceCustomer").val(response.client);
							
							// La modification 
										
				$("#editFolderForm").unbind('submit').bind('submit',function(){

				//remove the text error
				$(".text-danger").remove();
				// remove the form error
				$(".form-group").removeClass('has-error').removeClass('has-success');

				var nameCustomer = $("#editServiceCustomer").val();
				var service = $("#editServiceType").val();
				

				if(service =="")
				{
					$("#editServiceType").after('<p class="text-danger">Le nom du service est obligatoire</p>');
					$("#editServiceType").closest('.form-group').addClass('has-error');
				}
				else
				{
					// remove text field
					$("#editServiceType").find('.text-danger').remove();
					$("#editServiceType").closest('.form-group').addClass('has-success');
				}
				
				
				 
					if(nameFolder)
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

		});
	}
}
		