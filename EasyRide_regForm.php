<?php
session_start();
include_once('functions.php');
?>
<!doctype html>
<html>
<head>
    <title>EasyRide registration</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!--   <link href="js/bootstrap-3.3.2-dist/css/bootstrap.css" rel="stylesheet" media="screen">-->
<!--   <link href="js/bootstrap-3.3.2-dist/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">-->
<!--   <script src="js/bootstrap-3.3.2-dist/js/jquery-2.1.3.min.js"></script>-->
<!--   <script src="js/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>-->
    <script src="js/js.js"></script>
</head>
<body>
    <div class="container">
       <div class="row">
           <nav class="navbar navbar-default">
               <div class="col-sm-9">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#er_menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">EasyRide</a>
                    </div>
               
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="er_menu">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Водителям <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Пассажиры</a></li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">Форум</a></li>
                        <li><a href="#">FAQ</a></li>
                      </ul>
                    </div>
                   </div>
               </div>
               <?php if(isset($_SESSION['er_user'])): ?>
                   <div class="col-sm-2">
                       <span class="pull-right">привет, <?=getUserName($_SESSION['er_user']) ?></span>
                   </div>
                   <div class="col-sm-1">
                       <form action="sign_out.php" method="POST" name="exit_form" id="exit_form" class="hidden">
                           <input id="ex" name="ex" type="hidden" value="exit">
                       </form>
                       <a href="#" onClick="document.getElementById('exit_form').submit(); return false;">выйти</a>
                   </div>
               <?php endif; ?>
            </nav>
       </div>
<!--        Вывод формы регистрации-->
        <?php if(!isset($_SESSION['er_user'])): ?>
            <div class="row">
                <div class="col-md-5">
                    <form action="sign_up.php" method="POST" name="regForm" onsubmit="return formDataValidate()">
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input name="userEmail" type="email" class="form-control" id="userEmail" placeholder="Email"><span id="email_f" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Имя</label>
                            <input name="userName" type="text" class="form-control" id="userName" placeholder="Name"><span id="name_f" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="userPassword">Пароль</label>
                            <input name="userPassword" type="password" class="form-control" id="userPassword"><span id="pass_f" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="userPasswordConfirm">Подтверждение пароля</label>
                            <input name="userPasswordConfirm" type="password" class="form-control" id="userPasswordConfirm"><span id="passCon_f" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <h4>Хотите создать учетную запись как:</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="access_ps">Пассажир</label>
                                    <input id="access_ps" name="access" type="radio" checked="checked" value="ps">
                                </div>
                                <div class="col-sm-6">
                                    <label for="access_dr">Водитель</label>
                                    <input id="access_dr" name="access" type="radio" value="dr">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <button type="submit" class="btn btn-default">создать аккаунт</button>
                        </div>
                    </form>
                    <?php if($_SESSION['msgError'] != ""): ?>
                        <span><?=$_SESSION['msgError']; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>