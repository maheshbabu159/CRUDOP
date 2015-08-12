<?php

require_once('constants.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HTTPRequest {
    /* Member variables */

    public function __construct() {
        
    }

    public static function sendRequest($requestMethod, $objectData) {

        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, REQUEST_URL . $requestMethod);
        curl_setopt($request, CURLOPT_PORT, 443);
        curl_setopt($request, CURLOPT_POST, 1);
        curl_setopt($request, CURLOPT_POSTFIELDS, $objectData);
        curl_setopt($request,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($request, CURLOPT_HTTPHEADER, array("X-Parse-Application-Id: " . APPLICATION_ID,
            "X-Parse-REST-API-Key: " . REST_API_KEY,
            "Content-Type: application/json"));
        $response = curl_exec($request);
        curl_close($request);
        return $response;
    }

}
