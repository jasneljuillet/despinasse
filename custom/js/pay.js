
$(document).ready(function(){


$("#submitPaiementForm").unbind('submit').bind('submit',function(){

	var amountTotal = $("#amount").val();
	var amountPay = $("#amountPay").val();
	
	console.log(amountPay);

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


});// fin de jquery
