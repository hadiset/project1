<?php
session_start();
$_SESSION["login"] = "false";
$cookie_name = "login";
unset($_COOKIE[$cookie_name]);
setcookie("login","", time() - 3600);
session_unset();
session_destroy();

header("Location: index.php");
?>