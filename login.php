<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
$message = "wrong answer";
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("camauth", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
echo $query;
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
// insert something into database to check later
//header("location: profile.php"); // Redirecting To Other Page
$str  = "<script>blah = window.open('sample.php?login=".$username;
$str = $str."','Camauth','width=400, height=400 ,toolbar=no, menubar=no, location=no, addressbar=no')</script>";

echo $str;

} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>