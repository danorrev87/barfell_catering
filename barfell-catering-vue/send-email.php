<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = '';

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("danorrev87@gmail.com", "Danilo Orrego");
$email->setSubject("Contacto Web Barfell Catering");
$email->addTo("danorrev87@gmail.com", "Danilo Orrego");

$message = "Nombre: " . $_POST['name'] . "\n";
$message .= "Email: " . $_POST['email'] . "\n";
$message .= "Mensaje: " . $_POST['message'] . "\n";

if (isset($_POST['phone'])) {
    $message .= "Teléfono de contacto: " . $_POST['phone'] . "\n";
}

if (isset($_POST['date'])) {
    $date = DateTime::createFromFormat('Y-m-d', $_POST['date']);
    $formattedDate = $date->format('d/m/Y');
    $message .= "Fecha: " . $formattedDate . "\n";
}

if (isset($_POST['eventType'])) {
    $message .= "Tipo de Evento: " . $_POST['eventType'] . "\n";
}

if (isset($_POST['guests'])) {
    $message .= "Número de Invitados: " . $_POST['guests'] . "\n";
}

$email->addContent("text/plain", $message);

$sendgrid = new \SendGrid($apiKey);

try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>