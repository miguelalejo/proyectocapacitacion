<?php
    $first_name = $_POST['name'];    
    $email_from = $_POST['email'];    
    $telephone = $_POST['telephone'];    
    $comments = $_POST['comments'];       
    $email_message = "Detalles del correo.\n\n"; 
	function clean_string($string)
    {        
        $bad = array(
            "content-type",
            "bcc:",
            "to:",
            "cc:",
            "href"
        );        
        return str_replace($bad, "", $string);        
    }
	$email_to      = "capacitacion@geniusworkers.com";
	$email_subject = "Solicitud Contacto";  
    $email_message .= "Nombre: " . clean_string($first_name) . "\n";
    $email_message .= "Correo: " . clean_string($email_from) . "\n";
    $email_message .= "Telefono: " . clean_string($telephone) . "\n";
    $email_message .= "Comentario: " . clean_string($comments) . "\n";	
	if (filter_var($email_from, FILTER_VALIDATE_EMAIL)) { 
		if(mail($email_to, $email_subject, $email_message))
		{			
			echo "enviadocorrectamente";
		}
		else
		{
			echo "errorenvio";  
		}
	}
	else
	{
		echo "correoinvalido"; 
	}