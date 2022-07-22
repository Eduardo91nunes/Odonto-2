<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

if (isset($_POST['comentar'])) {
    if (!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {

        try {

            //Server settings
            $mail = new PHPMailer(true);             //Create an instance; passing `true` enables exceptions
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'gustavo@lrapplications.com';                     //SMTP username
            $mail->Password   = 'senha#';                               //SMTP password 
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('gustavo@lrapplications.com', 'Titulo do Email');
            $mail->addAddress('gustavoqueirozmit@gmail.com', 'Nome do destinatario');     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $_POST['subject'];
            $mail->Body    = $_POST['message'];
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_POST['message'] = 'Mensagem Enviada';
            header('location: /');
        } catch (Exception $e) {
            echo "Mensagem não enviada. Mailer Error: {$mail->ErrorInfo}";
            header('location: /');
        }
    }
}else{
    header('location: /');
}
