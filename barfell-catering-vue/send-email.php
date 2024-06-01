<?php
require 'vendor/autoload.php';

$apiKey = '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';

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("danorrev87@gmail.com", "Danilo Orrego");
$email->setSubject("Contacto Web Barfell Catering");
$email->addTo("danorrev87@gmail.com", "Danilo Orrego");
$email->addContent("text/plain", $_POST['message']);

$sendgrid = new \SendGrid($apiKey);

try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>