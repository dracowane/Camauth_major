<?php
session_start();
if($_SESSION['login'] == "false")
{
echo "Session expired, please login again http://localhost/Camauth";
return;
}
echo "this is a profile";

?>