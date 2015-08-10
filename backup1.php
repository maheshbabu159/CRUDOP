<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//require "autoload.php";

//use Parse\ParseClient;
//use Parse\ParseACL;
//use Parse\ParseObject;
//use Parse\ParseUser;

$application_id = 'I8pLOBgiTj7RgNDAKjBtPEFK7tkPVUyTUHX81ynL';
$rest_api_key = 'puje6S1ykPiQZoZ1aSB53wrL4zMUK0uDjwlOTf4z';
$master_key = 'WPWSkvoOAX0U5geWAdawJmtf3WpPbSLEn9KjKWvO';
$url = "https://api.parse.com/1/login";

$headers = array(

'X-Parse-Application-Id: ' . $application_id,
'X-Parse-REST-API-Key: ' . $rest_api_key,
'Content-Type: application/json'
);

$curl = curl_init($url); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($curl, CURLOPT_TIMEOUT, '3'); 
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
//option 2 //
curl_setopt($curl, CURLOPT_ENCODING, 'username=mahesh'); 
curl_setopt($curl, CURLOPT_ENCODING, 'password=mahesh');

$content = curl_exec($curl); curl_close($curl);

 echo $content;




/*ParseClient::initialize($application_id, $rest_api_key, $master_key);

try {
    
    $user = ParseUser::logIn("mahesh", "mahesh");
    // Do stuff after successful login.
    echo $user;
} catch (ParseException $error) {
    // The login failed. Check error to see why.
    echo $error;
}*/

/*$rolePermissions = new ParseACL();
$rolePermissions->setPublicReadAccess(true);

$newRole = ParseRole::createRole("admin", $rolePermissions);
$newRole->save();
      

$newRole = new Parse.Role("Admin", roleACL);
$newRole->getUsers()->add(usersToAddToRole);
$newRole->getRoles()->add(rolesToAddToRole);


$wallPost = new ParseObject("WallPost");
$wallPost->setACL($rolePermissions);
$wallPost->save();*/

