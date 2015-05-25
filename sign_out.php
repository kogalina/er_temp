<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['ex'])){
        unset($_SESSION['er_user']);
        setcookie(session_name(), "", time() - 3600);
        session_destroy();
    }
    $_SESSION["msgError"] = "";
}
header('location: ' . $_SERVER['HTTP_REFERER']);
?>