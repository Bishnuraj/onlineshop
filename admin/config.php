<?php
session_start();
$currency = '$';

$db_username = 'root';
$db_password = '';
$db_name = 'demo';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
?>