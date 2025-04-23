<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();
// $client->setHttpClient(new \GuzzleHttp\Client([
//     'verify' => false  
// ]));
$client->setClientId('727067662120-8r43rcv985ol2pe8sqt5g71hvrjfsaci.apps.googleusercontent.com'); // ganti dengan client ID Anda
$client->setClientSecret('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'); // ganti dengan secret Anda
$client->setRedirectUri('http://localhost/google-login/callback.php');
$client->addScope('email');
$client->addScope('profile');
