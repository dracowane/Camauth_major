<?php
session_start();
if($_POST['uname'] == "")
{

	echo "ERROR, SESSION NOT INITIATED";
	return ;
}
include('Crypt/RSA.php');
    set_time_limit(0);
$rsa = new Crypt_RSA();
    $rsa->setHash('sha1');
    $rsa->setMGFHash('sha1');
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_OAEP);

    $rsa->loadKey('-----BEGIN RSA PUBLIC KEY----- MIGJAoGBAItSPIJeCcakIDdctfl6xkdYwORfO4cdSk3qoaQLXCQExWp1QGhuR5tx lZso9gQAU5CtVrunXjZh89qI1Unnhr0mMl3cF+pMbluAf/+83Fq4P/EOxYnZ4kk8 VaUqqp5VsaCJTPj4r9KGekM2BfhBqta1tySGB406BY6DtC0TwYd5AgMBAAE= -----END RSA PUBLIC KEY-----'); // public key

// Define $username and $password
$username=$_POST['uname'];
$password=$_POST['pname'];
$randnum =$_POST['rnum'];
//$check = $_SESSION['login'];
$_SESSION['uame'] = $username;
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
$query = mysql_query("select * from users where password='$password' AND name='$username'", $connection);
//echo $query;
$rows = mysql_num_rows($query);
if ($rows == 1) {
// will apply deffie hellman here
// let p = 99999989 and q be 2
	$p = 99999989;
	$g = 2;
    $myrand = rand(1,1000);
	$sharedsecret = bcpowmod($randnum, $myrand, $p);
	$timeout = time() + 60;
	//S||U||T ||h(h(OP T S ))
	$otph = hash('md5',hash('md5',$sharedsecret));
	//file_put_contents('hashed',hash('md5',$sharedsecret));
	$hashed = hash('md5',"1121".$username.$timeout.$otph);
	$afterhash = hash('md5',"1121".$username.$timeout.hash('md5',$sharedsecret));
	$_SESSION['later'] = $afterhash;
	//file_put_contents('later', $_SESSION['later']);
$vr5 = "1121"."~".$timeout."~".$hashed;
$ciphertext = $rsa->encrypt($vr5);
$tt = base64_encode($ciphertext);

$str  = $tt." 1121 ".bcpowmod($g,$myrand,$p);
echo $str;

} else {
echo "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection

?>