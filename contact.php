<?php
require_once("inc/init.php");

if($_POST) {
   $to = "email@example.com"; // Votre adresse email
   $from = $_POST['email']; // L'adresse email de destination
   $first_name = $_POST['first_name']; // Récupération du prénom
   $last_name = $_POST['last_name']; // Récupération du nom
   $subject = "Formulaire de contact";
   $subject2 = "Copie de votre formulaire de contact";
   $message = $first_name . " " . $last_name . " a écrit le message suivant:" . "\n\n" . $_POST['message'];
   $message2 = "Ceci est une copie de votre message " . $first_name . "\n\n" . $_POST['message'];

   $headers = "From:" . $from;
   $headers2 = "From:" . $to;
   // Fonction prédéfinie PHP permettant d'envoyer un email
   mail($to,$subject,$message,$headers); // envoi du mail au propriétaire du site
   mail($from,$subject2,$message2,$headers2); // envoi une copie du message à l'envoyeur
   // Possibilité d'utiliser header('Location: thank_you.php'); pour rediriger vers une autre page.

   // Ajout de la demande de contact en BDD
   $pdo->exec("INSERT INTO contact (first_name, last_name, email, message)
   VALUES( '$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[message]' )");

   // Message de confirmation affiché à l'écran
   $content = "Message envoyé. Merci nous vous contacterons prochainement.";

}

require_once("inc/header.php");

?>

<div class="col-md-10 mx-auto">

   <?php echo $content; ?>

   <form id="contact-form" method="post" action="" role="form" novalidate="true">

      <div class="messages"></div>
      <div class="controls">
         <div class="row">
            <div class="col-md-4">
                  <div class="form-group has-error has-danger">
                     <label for="form_name">Prénom *</label>
                     <input id="form_name" type="text" name="first_name" class="form-control" placeholder="Entrer un prénom *" required="required" data-error="Prénom requis.">
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="form-group">
                     <label for="form_lastname">Nom *</label>
                     <input id="form_lastname" type="text" name="last_name" class="form-control" placeholder="Entrer un nom de famille *" required="required" data-error="Nom requis.">
                     <div class="help-block with-errors"></div>
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="form-group">
                     <label for="form_lastname">Email *</label>
                     <input id="form_lastname" type="text" name="email" class="form-control" placeholder="Entrer une adresse email *" required="required" data-error="Email requis.">
                     <div class="help-block with-errors"></div>
                  </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
                  <div class="form-group">
                     <label for="form_message">Message *</label>
                     <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                     <div class="help-block with-errors"></div>
                  </div>
            </div>
            <div class="col-md-12">
                  <input type="submit" class="btn btn-success btn-send disabled" value="Envoyer le message">
            </div>
         </div>
      </div>

   </form>
</div>


<?php
require_once("inc/footer.php");
?>