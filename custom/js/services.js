var manageClientTable
$(document).ready(function(){
$("#navClient").addClass('active');
// manage client table

manageClientTable = $("#manageClientTable").DataTable({
		'ajax': 'php_action/fetchServices.php',
		'order':[]
});

$("#submitFormClient").unbind('submit').bind('submit',function(){

							// remove the text error
							$(".text-danger").remove();
							// remove the form error
							$(".form-group").removeClass('has-error').removeClass('has-success');

	var clientName = $("#clientName").val();

	if(clientName =="")
			{
				$("#clientName").after('<p class="text-danger">Le nom du service est obligatoire</p>');
				$("#clientName").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#clientName").find('.text-danger').remove();
				$("#clientName").closest('.form-group').addClass('has-success');
			}

			
			if(clientName)
			{

				var form = $(this);
				// $("createClientBtn").button('loading');

				$.ajax({
					url :form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success : function(response)
					{
						$("#createClientBtn").button('reset');
						if(response.success == true)
						{
							// console.log(response)
							// reload the manage member table
							manageClientTable.ajax.reload(null,false);
							// reset the form text 
							$("#submitFormClient")[0].reset();

							// remove the text error
							$(".text-danger").remove();
							// remove the form error
							$(".form-group").removeClass('has-error').removeClass('has-success');
							$("#add-client-messages").html('<div class="alert alert-success">'+
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
			}

			// fin de la concatenation


	return false;
});// fin de ajax


});// fin de jquery


/*------------------- editer le client-----------------*/

	function editClient(clientId = null)
	{
		if(clientId)
		{ 	// remove clientId
			$("#clientId").remove();
			// refresh the form 
			$("#editFormClient")[0].reset();
			$(".editClientFooter").after('<input type="hidden" name ="clientId" id="clientId" value="'+clientId+'"/>');
			
			$.ajax({
				url : 'php_action/fetchSelectService.php',
				type :'post',
				data : {clientId : clientId},
				dataType : 'json',
				success:function(response)
				{
					$("#editClientName").val(response.username);
					$("#editClientAddress").val("");
					
					// $("#editClientPhone").val(response.phone);

$("#editFormClient").unbind('submit').bind('submit',function(){

							// remove the text error
							$(".text-danger").remove();
							// remove the form error
							$(".form-group").removeClass('has-error').removeClass('has-success');

	var clientName = $("#editClientName").val();

	if(clientName =="")
			{
				$("#editClientName").after('<p class="text-danger">Le nom du client est obligatoire</p>');
				$("#editClientName").closest('.form-group').addClass('has-error');
			}
			else
			{
				// remove text field
				$("#editClientName").find('.text-danger').remove();
				$("#editClientName").closest('.form-group').addClass('has-success');
			}

			if(clientName)
			{
				var form = $(this);
				//$("createClientBtn").button('loading');

				$.ajax({
					url :form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success : function(response)
					{
						//$("#createClientBtn").button('reset');
						if(response.success == true)
						{
							// reload the manage member table
							manageClientTable.ajax.reload(null,false);
							// reset the form text 
							$("#editFormClient")[0].reset();

							// remove the text error
							$(".text-danger").remove();
							// remove the form error
							$(".form-group").removeClass('has-error').removeClass('has-success');
							$("#edit-client-messages").html('<div class="alert alert-success">'+
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
			}

			// fin de la concatenation


	return false;
});// fin de ajax

				}

			});
		}// fin de ifbrandid
	}// fin de la fonction


/* ------------Supprimer le client---------------------*/
function removeClient(clientId = null)
{
	if(clientId)
	{
		console.log(clientId)
		$("#removeClientBtn").unbind('click').bind('click',function(){
			$.ajax({
				url : 'php_action/removeService.php',
				type : 'post',
				data : { clientId : clientId},
				dataType : 'json',
				success:function(response)
				{
					if(response.success== true)
					{
						// hide the modal 
						$("#removeClientModal").modal('hide');
						// reload the table
							manageClientTable.ajax.reload(null,false);
							$(".remove-msg-client").html('<div class="alert alert-success">'+
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