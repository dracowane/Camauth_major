<?php session_start();
?>
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
.qr
{
    position:absolute;
    top: 50%;
    width:100%;
    height:22em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    border: 1px solid #ccc;
    background-color: #f3f3f3;
}

.qrcode
{
    position:absolute;
    top: 64%;
	left: 15%;
    width: 13em;
    height:13em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    border: 1px solid #ccc;
}
.scan
{
    position:absolute;
    top: 50%;
	right: 15%;
    width: 340;
    height:260;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    border: 1px solid #ccc;
	background-color: black;
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
	left: 30%;
	z-index: 2;
}

.header div{
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 40px;
	font-weight: 200;
}

#scanner{
width: 100%;
height: 100%;
}

.header div span{
	color: #5379fa !important;
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
</head>
<body>
<div class="header">
	<div>STEP 2 Authentication</div>
</div>
  <div class="body"></div>
		<div class="grad"></div>

		<div class="qr">
<img class="qrcode" id="qrrcode" <?php echo "src=\"checkk.php?q=".$_GET['q']."\""?> ></img>

</div>

	<div class="scan">
  <iframe id="scanner" src="http://127.0.0.1/Camauth/WebCodeCam-master/sample.php" ></iframe>
</div>
  
</body>

</html>