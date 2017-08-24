<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//variaveis
$nome = filter_input(INPUT_POST, "nome");
$email = filter_input(INPUT_POST, "email"); 
$texto =  filter_input(INPUT_POST, "msg");

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../siteOficial/componentes/PHPMailer-5.2.23/class.phpmailer.php';

//Create a new PHPMailer instance
$mail = new PHPMailer(TRUE);

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'TLS';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "site.kalebecalixto@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "Vitrola55";

$mail->IsSendmail();

//Set who the message is to be sent from
$mail->setFrom('site.kalebecalixto@gmail.com', 'Contato Via Site - '.$nome);

//Set who the message is to be sent to
$mail->addAddress('kalebe.calixto@gmail.com.br', 'Site Kalebe Calixto');

//Set the subject line
$mail->Subject = 'Contato Via Site Kalebe Calixto';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$msgFormat = "<H3>Mensagem enviada por: ".$nome." </3><br>";
$msgFormat .= "Email: ".$email;
$msgFormat .= "<br>";
$msgFormat .= "<h2>Mensagem:</h2><br>";
$msgFormat .= $texto;

$mail->MsgHTML($msgFormat);

$mail->IsHTML(TRUE);

//Replace the plain text body with one created manually
$mail->AltBody = 'Mensagem enviada via Site Kalebe Calixto';

//Attach an image file

try{
    $mail->send();
} catch (phpmailerException $ex) {
    echo "Message sent!"+$ex->ErrorInfo;
}
