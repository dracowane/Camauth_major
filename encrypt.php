<?php
    include('Crypt/RSA.php');
    set_time_limit(0);

    $rsa = new Crypt_RSA();
    $rsa->setHash('sha1');
    $rsa->setMGFHash('sha1');
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_OAEP);

    $rsa->loadKey('-----BEGIN RSA PUBLIC KEY----- MIGJAoGBAItSPIJeCcakIDdctfl6xkdYwORfO4cdSk3qoaQLXCQExWp1QGhuR5tx lZso9gQAU5CtVrunXjZh89qI1Unnhr0mMl3cF+pMbluAf/+83Fq4P/EOxYnZ4kk8 VaUqqp5VsaCJTPj4r9KGekM2BfhBqta1tySGB406BY6DtC0TwYd5AgMBAAE= -----END RSA PUBLIC KEY-----'); // public key

    $plaintext  = "hello";
    $ciphertext = $rsa->encrypt($plaintext);
    $md5        = md5($ciphertext);
   // file_put_contents('md5.txt', $md5);
   // file_put_contents('encrypted.txt', base64_encode($ciphertext));

    echo base64_encode($ciphertext);
    echo "<br>";

    $rsa->loadKey('-----BEGIN RSA PRIVATE KEY-----
MIICWQIBAAKBgQCLUjyCXgnGpCA3XLX5esZHWMDkXzuHHUpN6qGkC1wkBMVqdUBo
bkebcZWbKPYEAFOQrVa7p142YfPaiNVJ54a9JjJd3BfqTG5bgH//vNxauD/xDsWJ
2eJJPFWlKqqeVbGgiUz4+K/ShnpDNgX4QarWtbckhgeNOgWOg7QtE8GHeQIDAQAB
An88H5hmB1H2hHTuWA5HREX7j9d/zbB/3pKVR5q0NkoS+1k2ncu/RXsKNwu777z1
lF0HUoDbhkG/KqlF/RhrjFYebBwphS5hjKQxKmjzDQLDLndAmblxNVU5ovktUeR/
hMyT91+4p2a0xGG5Fj2KBfnk7heshL61EySAtqbDfkg9AkEA1gNG3n5ieR4N6OKb
/OVw51TJu+972GK5GT+cCk3MdgSrcD4pnWEjLFn/zJBfsAEr5+vAUWxMYakHr6GG
7rUmtQJBAKanmZyWOxYXqArRaxu+rfcmgFSFzRGpHHO6kZWJbTpA7g7LYvZUbwci
cgorao+7PL4hn/w7uVZCpZoMYd9s9DUCQA76nbw25leJ1fll2vshZ/yY/6GqymVD
y6bLv/UsqtHb09AAWdNNGDQjfHbp5/ierF8ILibEyLfRJ9uQF6yfez0CQFdFJvTP
2usrwizAE5W42YK2H7ejRYr9AtA7n+ctywwZWlBXA2C5QFb9G7jlmWzhAOMT2qKM
Z/aa+ftchpgohw0CQFXionylx0Lv7ZDDg4np08c7Cwrd8GV3HPCgLKrSthLYNAwC
h+jKK5RTE+uSCU5tRUbwhq/ccIqw+8YheqepE/Y=
-----END RSA PRIVATE KEY------');
    echo $rsa->decrypt($ciphertext);


?>