<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
//Server settings
$mail->SMTPDebug = 0;                                       // Enable verbose debug output
$mail->isSMTP();                                            // Set mailer to use SMTP
$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'prevention.learning.secours@gmail.com';                     // SMTP username
$mail->Password   = 'ch0up1nette';                               // SMTP password
$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
$mail->Port       = 587;                                    // TCP port to connect to

//Recipients
$mail->setFrom('prevention.learning.secours@gmail.com', 'PLS');
$mail->addAddress($_POST['email']);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('prevention.learning.secours@gmail.com', 'PLS');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Réinitialisation du mot de passe';
$mail->Body    = '<h1>Réinitialisation de votre mot de passe</h1><br>
<br> <p>Pour changer votre mot de passe veuillez suivre le lien suivant : </p><a href="http://www.prevention-learning-secours.tk/reinitialisermdp.php?jeton='.$token['jeton'].'">cliquez ici</a>';
$mail->AltBody = 'Pour changer de mot de passe, faites des bulles';

$mail->send();
//echo 'Message has been sent';
    header('Location: connexion.php?message=mailsent');

} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}