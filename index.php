<?php
session_start();
$_SESSION['login'] = "false";
$_SESSION['qpage'] = "true";
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Cam Auth - A secure login page</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url("imgg.jpg");
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}

span
{
color:black;
}
</style>
<script src="jquery.js"></script>
<script src="Bigint.js"></script>
<script src="md5.js"></script>
<script src="mdd5.js"></script>
</head>
<script>
function utf8_encode(argString) {
  //  discuss at: http://phpjs.org/functions/utf8_encode/
  // original by: Webtoolkit.info (http://www.webtoolkit.info/)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: sowberry
  // improved by: Jack
  // improved by: Yves Sucaet
  // improved by: kirilloid
  // bugfixed by: Onno Marsman
  // bugfixed by: Onno Marsman
  // bugfixed by: Ulrich
  // bugfixed by: Rafal Kukawski
  // bugfixed by: kirilloid
  //   example 1: utf8_encode('Kevin van Zonneveld');
  //   returns 1: 'Kevin van Zonneveld'

  if (argString === null || typeof argString === 'undefined') {
    return '';
  }

  var string = (argString + ''); // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
  var utftext = '',
    start, end, stringl = 0;

  start = end = 0;
  stringl = string.length;
  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n);
    var enc = null;

    if (c1 < 128) {
      end++;
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(
        (c1 >> 6) | 192, (c1 & 63) | 128
      );
    } else if ((c1 & 0xF800) != 0xD800) {
      enc = String.fromCharCode(
        (c1 >> 12) | 224, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
      );
    } else { // surrogate pairs
      if ((c1 & 0xFC00) != 0xD800) {
        throw new RangeError('Unmatched trail surrogate at ' + n);
      }
      var c2 = string.charCodeAt(++n);
      if ((c2 & 0xFC00) != 0xDC00) {
        throw new RangeError('Unmatched lead surrogate at ' + (n - 1));
      }
      c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000;
      enc = String.fromCharCode(
        (c1 >> 18) | 240, ((c1 >> 12) & 63) | 128, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
      );
    }
    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end);
      }
      utftext += enc;
      start = end = n + 1;
    }
  }

  if (end > start) {
    utftext += string.slice(start, stringl);
  }

  return utftext;
}


function expmod( base, exp, mod ){
  if (exp == 0) return 1;
  if (exp % 2 == 0){
    return Math.pow( expmod( base, (exp / 2), mod), 2) % mod;
  }
  else {
    return (base * expmod( base, (exp - 1), mod)) % mod;
  }
}


function showHint(username,password) {
     if (username.length == 0 || password.length == 0) {
        document.getElementById("error").innerHTML = "Invalid username or password";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        var randnum = Math.floor(Math.random()*1000); 
        var p = 99999989;
        var g = 2;
        var rnum = bigInt(g);
        rnum = rnum.modPow(randnum,p); 
       // var rnum = expmod(g,randnum,p);
        //alert(rnum);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var cc = "Username or Password is invalid";
				var res = xmlhttp.responseText;
				//alert(res);
				//alert(randnum);
				//res = res.slice(14,res.length);
				var n = res.localeCompare(cc);
				//alert(cc);
				//alert(res);
				if(n==0)
				{
				document.getElementById("error").innerHTML = res;
				}
				else
				{
					var arr = res.split(" ");
					//alert(arr.length);

					var sharedsecret = bigInt(arr[2]);
					sharedsecret = sharedsecret.modPow(randnum,p);
					//alert(sharedsecret + " " + arr[0]);
					//alert(sharedsecret + " " + arr[3])
					// here we hve to use a hash function on sharedsecret , that too md5
					var hash = hex_md5(utf8_encode(sharedsecret));
					//alert(arr[0]);
					//arr[0] = arr[0].split("+").join("==");
					//alert(arr[0]);
					// alert(hash);
					var com = arr[1] + "--" + arr[0] + "--" + hash;
					//alert(com);
				//document.getElementById("error").innerHTML = res.slice(13,res.length);
				window.location="http://127.0.0.1/Camauth/qrpage.php?q=" + com;				
				}
				
            }
        }

		var params = "uname=" + username + "&pname=" + password + "&rnum=" + rnum;

        xmlhttp.open("POST", "gethash.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-length", params.length);
		xmlhttp.setRequestHeader("Connection", "close");
        xmlhttp.send(params);
    }
}

</script>
<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Cam<span>Auth</span></div>
		</div>
		<br>
		<div class="login">
		<form id="loginform" method="post">
				<input id="name" type="text" placeholder="username" name="username"><br>
				<input id="password" type="password" placeholder="password" name="password"><br>
				<input type="submit" value="Login">
				<br><span id="error" style="font-size:20px;color:black"></span>
		</form>		
		</div>
		<script>
$(document).ready(function() {

$('#loginform').submit(function (e) {
        e.preventDefault();
        var fields = $('#loginform').serializeArray();
		var username = fields[0]['value'];
		var password = fields[1]['value'];
	//	alert(username);
	//	alert(password);
		showHint(username,password);
		return false;
});

});
</script>


  

</body>

</html>