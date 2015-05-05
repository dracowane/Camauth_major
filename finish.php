<?php
session_start();
$var = $_POST['res'];
$var = preg_replace("/ /","+",$var);
echo $var;
 include('Crypt/RSA.php');
    set_time_limit(0);

    $rsa = new Crypt_RSA();
    $rsa->setHash('sha1');
    $rsa->setMGFHash('sha1');
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_OAEP);

$connection = new mysqli("localhost", "root", "","camauth");
$key = "";
$username = $_SESSION['uame'];
$sql = "select * from users where name='$username'";
$result = $connection->query($sql);
if($result->num_rows > 0)
{

While($row = $result->fetch_assoc())
{
$key = base64_decode($row['publickey']);
$_SESSION['email'] = $row['email'];

}

}

$rsa->loadKey($key);
$ciphertext = $rsa->decrypt(base64_decode($var));
file_put_contents('check2', $_SESSION['later']);
file_put_contents('check', $ciphertext);
if($_SESSION['later'] == $ciphertext )
{
$_SESSION['login'] = "true";
echo "Login initialized";
}
else
{
echo "Hash invalid";
}

?>