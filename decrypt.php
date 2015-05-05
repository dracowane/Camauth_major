<?php
    include('Crypt/RSA.php');
    set_time_limit(0);

    $rsa = new Crypt_RSA();
    $rsa->setHash('sha1');
    $rsa->setMGFHash('sha1');
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_OAEP);


   $rsa->loadKey('-----BEGIN RSA PUBLIC KEY----- MIGJAoGBAItSPIJeCcakIDdctfl6xkdYwORfO4cdSk3qoaQLXCQExWp1QGhuR5tx lZso9gQAU5CtVrunXjZh89qI1Unnhr0mMl3cF+pMbluAf/+83Fq4P/EOxYnZ4kk8 VaUqqp5VsaCJTPj4r9KGekM2BfhBqta1tySGB406BY6DtC0TwYd5AgMBAAE= -----END RSA PUBLIC KEY-----'); // public key

      $plaintext  = "hello world";

      // run a sql query to get user private key based on userid.

    $ciphertext = $rsa->decrypt(base64_decode('gjnTDtof3WLsgJYg/wCpemkbGABgxJecUoK5mfZAN8q74fYDf52vFPAxlGtGWd6zYZYyCTp3MYzL
0iWg/jdJ5mL53Gj/JJGefy5flbyeWo+Rw5crZeumz7ejhr5pq32wAG6W/T42ZSdRYxnVJfdzhYBb
UVPj80GXohgygqDugao='));
    $md5        = md5($ciphertext);
   // file_put_contents('md5.txt', $md5);
   // file_put_contents('encrypted.txt', base64_encode($ciphertext));

    echo $ciphertext;
?>