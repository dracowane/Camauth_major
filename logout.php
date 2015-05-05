<?php
session_start();
$_SESSION['login'] = 'false';
header('Location: http://127.0.0.1/Camauth/index.php'); 
?>