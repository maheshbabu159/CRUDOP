<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            
require "autoload.php";

use Parse\ParseClient;
use Parse\ParseACL;
use Parse\ParseObject;

$application_id = 'I8pLOBgiTj7RgNDAKjBtPEFK7tkPVUyTUHX81ynL';
$rest_api_key = 'puje6S1ykPiQZoZ1aSB53wrL4zMUK0uDjwlOTf4z';
$master_key = 'WPWSkvoOAX0U5geWAdawJmtf3WpPbSLEn9KjKWvO';

ParseClient::initialize($application_id, $rest_api_key, $master_key);



$rolePermissions = new ParseACL();
$rolePermissions->setPublicReadAccess(true);

$newRole = ParseRole::createRole("admin", $rolePermissions);
$newRole->save();
      

$newRole = new Parse.Role("Admin", roleACL);
$newRole->getUsers()->add(usersToAddToRole);
$newRole->getRoles()->add(rolesToAddToRole);


$wallPost = new ParseObject("WallPost");
$wallPost->setACL($rolePermissions);
$wallPost->save();

