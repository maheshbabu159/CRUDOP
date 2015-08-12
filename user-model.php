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
        $postData = array('username' => $username,'password' => $password);
        $response = HTTPRequest::sendRequest("loginCheck",json_encode($postData));
        return $response;
    }
}