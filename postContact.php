<?php

include ('configReCaptcha.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if ($decode['success'] == true) {
    // C'est un humain
echo 'papa';

//Si Nom est non nul 
if (isset ($_POST['nom']) && (!empty($_POST['nom']))) {
    echo " nom bien entré";
    echo '<br>';


//Si Mail correct. 
    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse email  est considérée comme valide.";


//Si téléphone valide.
        if (isset($_POST['telephone']) && (!empty($_POST['telephone']) && preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))) {
            echo '<br>';
            echo 'numéro ok';


//Si objet vide
            if (isset($_POST['objet']) && (!empty($_POST['objet']))) {

//Si message vide
                if (isset($_POST['message']) && (!empty($_POST['message']))) {

                    // On se connecte à la BDD
                    include('config-bdd.php');


// Insérer dans la BDD : le nom , le numéro de téléphone
// l'objet et le message .
                $req = $bdd->prepare('INSERT INTO messages(ID, nom, objet, message, téléphone, mail  ) VALUES (NULL, :nom, :objet, :message ,:telephone, :mail  )');
                $req->execute(array(
                    'nom' => htmlspecialchars($_POST['nom']),
                    'objet' => htmlspecialchars($_POST['objet']),
                    'message' => htmlspecialchars($_POST['message']),
                    'telephone' => htmlspecialchars($_POST['telephone']),
                    'mail' => htmlspecialchars($_POST['mail'])
                ));


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/SMTP.php';


// Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                    $mail->Username = 'norelosurfschool@gmail.com';           // SMTP username
                    $mail->Password = 'quentin032489';                        // SMTP password
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('ne-pas-repondre@nerolesurfchool.com', 'Service contact');
                    $mail->addAddress('norelosurfschool@gmail.com', "admin");     // Add a recipient
                    $mail->addReplyTo($_POST['mail'], $_POST['nom']);
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');

                    // Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $_POST['objet'];
                    $mail->Body = $_POST['message'];
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


                header('Location: contact.php?messageEnvoyé=Message bien envoyé!!! ');

            } else {
                header('Location: contact.php?messagepasdemessage=Entrer un message!!! ');
                    include ('cookie/cookieSauvegardeContact.php');
            }
        } else {

            header('Location: contact.php?messagepasdobjet=Entrer un objet!!! ');
                include ('cookie/cookieSauvegardeContact.php');
        }
    } //Si le téléphone n'est pas valide.
    else {
        header('Location: contact.php?messagemauvaistéléphone=Mauvais numéro de téléphone!!! ');
        include ('cookie/cookieSauvegardeContact.php');
    }
} // Si l'adresse mail n'est pas valide.
else {
    header('Location: contact.php?messagemauvaiseAdresse=Adresse Internet non valide !!! ');
    include ('cookie/cookieSauvegardeContact.php');
    echo '<br>';
    echo 'adresse mail non valide';
}

}
else
{

    header('Location: contact.php?messagePasdenom=Entrer un nom  !!! ');
    include ('cookie/cookieSauvegardeContact.php');
}
}

else {
    echo'gros ';
    // C'est un robot ou le code de vérification est incorrecte
}

?>