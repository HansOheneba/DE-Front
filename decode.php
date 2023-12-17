<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/jwtHandler.php';


$headers = getallheaders();
if (isset($headers['Authorization'])) {
    $token = str_replace('Bearer ', '', $headers['Authorization']);
    $decodedData = decodeToken($token);


    $userID = $decodedData->userID;
    $username = $decodedData->username;
    $name = $decodedData->name;
    $email = $decodedData->email;
    $dateJoined = $decodedData->dateJoined;


    echo "User ID: $userID\n";
    echo "Username: $username\n";
    echo "Name: $name\n";
    echo "Email: $email\n";
    echo "Date Joined: $dateJoined\n";
} else {
    http_response_code(401);
    echo "Unauthorized";
}
?>