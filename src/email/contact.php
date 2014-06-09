<?php

if (isset($_POST['email'])) {    
    $email_to      = "capacitacion@geniusworkers.com";
    $email_subject = "Solicitud Contacto";    
    function died($error)
    {
        echo "Se produjo un error al realizar el envi&oacute; del correo. ";
        echo "Descripci&oacute;n:.<br /><br />";
        echo $error . "<br /><br />";
        echo "Por favor intente re-cargar la p&aacute;gina y enviar el correo nuevamente.<br /><br />";
        die();
    }    
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['telephone']) || !isset($_POST['comments'])) {
        
        died('Por favor todos lo campos deben estar llenos.');
        
    }    
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
    $email_message .= "Nombre: " . clean_string($first_name) . "\n";
    $email_message .= "Correo: " . clean_string($email_from) . "\n";
    $email_message .= "Telefono: " . clean_string($telephone) . "\n";
    $email_message .= "Comentario: " . clean_string($comments) . "\n";
    $headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
}
