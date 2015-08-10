<?php
require "autoload.php";
require_once('constants.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "autoload.php";
use Parse\ParseClient;

ParseClient::initialize(APPLICATION_ID, REST_API_KEY, MASTER_KEY);


