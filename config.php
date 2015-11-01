<?php
session_start();
$currency = '$'; //Currency sumbol or code

$db_username = 'root';
$db_password = '';
$db_name = 'demo';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
?>