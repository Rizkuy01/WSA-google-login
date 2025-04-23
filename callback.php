<?php
require_once 'config.php';
use Google\Service\Oauth2;

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

if (!$token || isset($token['error'])) {
    echo "<h3>Gagal mendapatkan access token:</h3>";
    var_dump($token);
    exit;
}

    if (!$token || !is_array($token)) {
        echo "<pre>";
        echo "Gagal mengambil token. Dump token:\n";
        var_dump($token);
        echo "</pre>";
        exit;
    }

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        $google_oauth = new Oauth2($client);
        $user_info = $google_oauth->userinfo->get();

        session_start();
        $_SESSION['user'] = [
            'name' => $user_info->name,
            'email' => $user_info->email,
            'picture' => $user_info->picture,
        ];

        header('Location: welcome.php');
        exit;
    } else {
        echo "Error saat mengambil token: " . $token['error_description'];
        exit;
    }
}
