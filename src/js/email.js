$(document).ready(function() {
	$('#submitemail').click(function() {
		$.post("email/contact.php", $("#contact-form").serialize(), function(response) {
			$("#success").removeAttr('class');			
			if(response.indexOf("enviadocorrectamente") >= 0)
			{
				$('#success').addClass("alert alert-success");
				$('#success').html("Su mensaje fue enviado");

			}
			else if(response.indexOf("errorenvio") >= 0)
			{
				$('#success').addClass("alert alert-danger");				
				$('#success').html("Error al enviar el mensaje");	
			}
			else if($.contains(response,"correoinvalido"))
			{
				$('#success').addClass("alert alert-warning");
				$('#success').html("El correo electr&oacute;nico no es v&aacute;lido");
			}

			
		});
		return false;
	});
});
