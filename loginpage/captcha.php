<?php
function buatCaptcha() {
    $a = random_int(1, 9);
    $b = random_int(1, 9);
    $_SESSION["captcha"] = $a + $b;
    return "$a + $b";
}

function cekCaptcha($input) {
    $benar = isset($_SESSION["captcha"]) && (int)$input === $_SESSION["captcha"];
    unset($_SESSION["captcha"]);
    return $benar;
}