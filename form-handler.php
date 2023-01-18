<?php
  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = "jimmy27.gorecki01@gmail.com";
    $subject = "Nouveau message de $name";
    $headers = "From: $email";
    mail($to, $subject, $message, $headers);
    echo "L'e-mail a été envoyé avec succès.";
  }
?>