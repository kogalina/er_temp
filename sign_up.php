<?php
    session_start();
    include_once('functions.php');
    
    $_SESSION["msgError"] = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Проверяем пустые поля
        if(!empty($_POST['userEmail']) && !empty($_POST['userName']) && !empty($_POST['userPassword']) && !empty($_POST['userPasswordConfirm'])) {
            //Проверяем подтверждение пароля
            if($_POST['userPassword'] === $_POST['userPasswordConfirm']){
                //записываем в БД нового пользователя
                $userName     = clearData($_POST["userName"]);
                $userEmail    = clearData($_POST["userEmail"]);
                $userPassword = hash('md5', clearData($_POST["userPassword"]));
                $crDate = date("Y-m-d H:i:s");
                $userAccess = $_POST['access'];
               $conn = mysqli_connect('localhost', 'root', '', 'easyride_db');
                $format = "INSERT INTO er_users(email, us_password, us_name, cr_date, access) VALUES ('%s','%s','%s','%s','%s');";
                $sql = sprintf($format, $userEmail, $userPassword, $userName, $crDate, $userAccess);
                //$_SESSION["msgError"] = $sql;
                $regSucceed = mysqli_query($conn, $sql);
               mysqli_close($conn);
               $_SESSION['er_user'] = ($regSucceed) ? $_POST['userEmail'] : "";
            }else $_SESSION["msgError"] = "*пароль введен неверно!";
        }else $_SESSION["msgError"] = "*необходимо заполнить все поля!";
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
?>