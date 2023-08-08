<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  //* Paramètres SMTP (protocole utilisé pour les emails, car le HTTP n'est pas conçu pour.)

  // Documentation Google avec les paramètres SMTP Gamil: https://support.google.com/a/answer/176600?hl=fr&sjid=17295809797962007669-EU
  // L'option Google utilisé actuellement est l'Option 2

  // Paramètres SMTP Yahoo: https://fr.aide.yahoo.com/kb/SLN4724.html

  $mail->SMTPDebug  = 0;
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";

  //? Cet email est celui qui everra les emails avec PHPMailer. Il est fortement déconseillé d'utiliser son email perso ici, et de créer un email dédié au projet.
  //? Je recommande l'utilisation de Gmail qui est bien plus simple.
  $mail->Username   = "shizumiproject@gmail.com";

  //? Ce mot de passe, dans le cas de Google est un mot de passe d'application. Il est utilisable uniquement dans un code qui fait appel au serveur SMTP de Google.
  //? Pour le petit malin qui voudrait essayer de se connecter au compte dédié à Shizumi, ne perds pas ton temps, ça ne fonctionnera pas.
  $mail->Password   = "jrpiyrfkkvfeenby";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "esteemed customer");

  //? email d'origine, identique a "$mail->Username" , Nom d'affichage
  $mail->SetFrom("shizumiproject@gmail.com", "Shizumi [ASAKI SYSTEM]");
  
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content);
  if(!$mail->Send()) {
    //echo "Error while sending Email.";
    //echo "<pre>";
    //var_dump($mail);
    return false;
  } else {
    //echo "Email sent successfully";
    return true;
  }
}
?>