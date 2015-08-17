<?php
require_once('HTTPRequest.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class  UserModel{
    /* Member variables */
     public static function loginCheck($username,$password){
        $postData = array('username' => $username,'password' => $password,'method' => 'loginCheck');
        $response = HTTPRequest::sendRequest(json_encode($postData));
        return $response;
    }
     /* Member variables */
     public static function getAllUsers(){
        $postData = array('method' => 'getAllUsers');
        $response = HTTPRequest::sendRequest(json_encode($postData));
        return $response;
    }
}