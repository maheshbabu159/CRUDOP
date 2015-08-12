<?php

$url = 'https://api.parse.com/1/functions/loginCheck';

$appId = '9Mmd4Saxte56qniVFyfqYASwwoDbjNmbOYNWphWc';
$restKey = '35xuRYYj1i7iVKEsDFZmRJgdQ2N6KaGDP3HEyC9O';

$objectData = '{"username":"admin","password":"admin"}';

$rest = curl_init();
curl_setopt($rest,CURLOPT_URL,$url);
curl_setopt($rest,CURLOPT_PORT,443);
curl_setopt($rest,CURLOPT_POST,1);
curl_setopt($rest,CURLOPT_POSTFIELDS,$objectData);
curl_setopt($rest,CURLOPT_HTTPHEADER, 
    array("X-Parse-Application-Id: " . $appId,
        "X-Parse-REST-API-Key: " . $restKey,
        "Content-Type: application/json"));

$response = curl_exec($rest);

