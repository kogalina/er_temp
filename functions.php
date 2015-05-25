<?php
session_start();
function clearData($data) {
    return trim(strip_tags($data));
}

function getUserName($userId){
    $conn = mysqli_connect('localhost', 'root', '', 'easyride_db');
        $sql = "SELECT us.us_name FROM er_users AS us WHERE us.email='" . $userId . "';";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    mysqli_close($conn);
    return $row['us_name'];
}

function signInController($gotEmail, $gotPassword){
    //Проверяем наличие пользователя в базе
               $conn = mysqli_connect('localhost', 'root', '', 'easyride_db');
                $userEmail    = clearData($gotEmail);
                $userPassword = hash('md5', clearData($gotPassword));
                $format = "SELECT us.us_name FROM er_users AS us WHERE us.email='%s' AND us.us_password='%s';";
                $sql = sprintf($format, $userEmail, $userPassword);
                $userSeek = mysqli_query($conn, $sql);
                mysqli_close($conn);
            
            if($userSeek){
                     $_SESSION['er_user'] = $userEmail;
            }else{
                $_SESSION["msgError"] = "*пользователь с таким именем и паролем не зарегестрирован!";
                $_SESSION['er_user'] = "";}
    
}

function regController($gotEmail, $gotPassword){
         $userEmail    = clearData($gotEmail);
         $userPassword = hash('md5', clearData($gotPassword));
         $crDate = date("Y-m-d H:i:s");
        $conn = mysqli_connect('localhost', 'root', '', 'easyride_db');
         $format = "INSERT INTO er_users(email, us_password, cr_date, access) VALUES ('%s','%s','%s','%s');";
         $sql = sprintf($format, $userEmail, $userPassword, $crDate, "ps");
         $regSucceed = mysqli_query($conn, $sql);
        mysqli_close($conn);
        $_SESSION['er_user'] = ($regSucceed) ? $_POST['userEmail'] : "";
}
?>
