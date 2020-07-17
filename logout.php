<?php

ob_start();
session_start();

$_SESSION["login"] = null;
header("Location: login.php");

?>