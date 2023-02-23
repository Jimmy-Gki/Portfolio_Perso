<?php

// Inclusion de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer.php'; // Inclusion du fichier PHPMailer.php
require 'vendor/Exception.php'; // Inclusion du fichier Exception.php
require 'vendor/SMTP.php'; // Inclusion du fichier SMTP.php

// Vérification si le formulaire est soumis
if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['text'])){
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    // Vérification si les champs sont remplis et si l'adresse email est valide
    if(!empty($nom) && !empty($email) && !empty($text) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Définition des informations de l'email
        $to_email = "jimmy27.gorecki01@gmail.com";
        $subject = "Nouveau message de votre site web";

        // Création d'un nouvel objet PHPMailer
        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jimmy27.gorecki01@gmail.com'; // Votre adresse email Gmail
            $mail->Password = 'yicynouwhfhuchse'; // Votre mot de passe Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuration de l'email
            $mail->setFrom($email);
            $mail->addAddress($to_email);
            $mail->Subject = $subject;
            $mail->Body = "Nom : " . $nom . "\n" . "Email : " . $email . "\n" . "Message : " . $text;

            // Envoi de l'email
            $mail->send();
            echo 'Message envoyé!'; // Message de confirmation
        } catch (Exception $e) {
            echo 'Une erreur est survenue, veuillez réessayer. Erreur : ' . $mail->ErrorInfo; // Message d'erreur en cas d'échec de l'envoi
        }
    } else {
        echo "Veuillez remplir tous les champs et entrer une adresse email valide."; // Message d'erreur si les champs ne sont pas remplis correctement
    } 
}

?>