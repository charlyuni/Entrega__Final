<?php

include 'src/PHPMailer.php';
/* include 'src/Exception.php';
include 'src/SMTP.php';

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php'; */

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$comentarios = $_POST["comentarios"];

$bodyemail = "Nombre: "  . $nombre . "\nApellido: "  . $apellido ."\nCorreo: " .$correo. "\nTelefono: " . $telefono . "\nComentarios: " .$comentarios;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'c2410364.ferozo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@labotanoticias.com.ar';                     //SMTP username
    $mail->Password   = 'Medic2020';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('charlessactis@gmail.com', 'Charly');
    $mail->addAddress('charlessactis@gmail.com', 'Joe User');     //Add a recipient
/*     $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information'); */
/*     $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    //Attachments
/*     $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name */

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contacto Web';
    $mail->Body    = $bodyemail;
/*     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; */

    $mail->send();
    echo 'Mensaje enviado correctamente';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>
