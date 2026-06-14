<?php
session_start();
if (isset($_SESSION["usuario"])){
    session_destroy();
    setcookie("user", "", time() - 1, "/");
}
header("Location: ../index.php");