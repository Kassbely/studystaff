<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "fyadmbmr_base";
$user = "fyadmbmr_base";
$password = "gorodo4ek";
$mysqli = mysqli_connect($host, $user, $password, $db);

