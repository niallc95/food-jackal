<?php
session_start();
unset($_COOKIE['user']);
setcookie('user, $cookie_value, time() - 3600, "/");

session_destroy();
header("Location: ../");


?>
