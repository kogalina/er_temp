<?php
    session_start();
    include_once('functions.php');
    
    $_SESSION["msgError"] = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Проверяем пустые поля
        if(!empty($_POST['userEmail']) && !empty($_POST['userPassword'])) {
            
            ($_POST['signin-type'] == "signin") ? signInController($_POST['userEmail'], $_POST['userPassword']) : 
                                                regController($_POST['userEmail'], $_POST['userPassword']);
        
        
        }else $_SESSION["msgError"] = "*необходимо заполнить все поля!";
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
?>