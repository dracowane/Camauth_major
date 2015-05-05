<?php

 header("Content-type: image/png");
 include ("phpqrcode/qrlib.php");
  $var_value = $_GET['q'];
 QRcode::png($var_value);


 ?>