<?php

if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['text'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    
    if(!empty($nom) && !empty($email) && !empty($text) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to_email = "jimmy27.gorecki01@gmail.com";
        $subject = "Nouveau message de votre site web";
        $headers = "From: " . $email . "\r\n" .
        "Reply-To: " . $email . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

        ini_set("SMTP", "smtp.gmail.com");
        ini_set("smtp_port", "587");
        ini_set("smtp_crypto", "tls");

        $message = "Nom : " . $nom . "\n" . "Email : " . $email . "\n" . "Message : " . $text;
        
        if(mail($to_email, $subject, $message, $headers)){
            echo "Message envoyé!";
        } else {
            echo "Une erreur est survenue, veuillez réessayer.";
        }
    } else {
        echo "Veuillez remplir tous les champs et entrer une adresse email valide.";
    } 
}

?>



