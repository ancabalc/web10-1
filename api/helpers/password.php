<?php

function passEnc($pass) {
    $salt = '$1$12!ab';
    return crypt($pass, $salt);
    }
    
function hashPass() {
    $newPass = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
    return $newPass;
}

?>