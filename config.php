<?php

$database = 'homeassistant';
$user = 'homeassistant';
$pass = 'edynamix';
$host = 'localhost';

$conn = new  mysqli($host, $user, $pass, $database);
if (!$conn){
        die('Connection Failed : '.$conn->connect_error);
}

?>
