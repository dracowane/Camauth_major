 <?php

    include "qrlib.php";
    //$var_value = $_GET['login'];
    // outputs image directly into browser, as PNG stream
  QRcode::png($varname, 'test.png', 'L', 4, 2);
?>   