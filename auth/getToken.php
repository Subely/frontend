<?php

$token = (exec("~/Desktop/getToken"));

setcookie('t', $token, time()+3600, "/", ".localhost");

echo "1";

?>
