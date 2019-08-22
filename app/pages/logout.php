<?php
session_start();
$_SESSION["login"] = "false";
setcookie("login","");
session_unset();
session_destroy();
header("Location: index.php");
?>