<?php
session_start();
include_once('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EasyRide</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/private.css" rel="stylesheet">
    <link href="css/signIn.css" rel="stylesheet">
    
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
<?php
include "signinForm.php";
?>
<!------------------------HEADER-------------------->
        <div class="header">
           <!-- -----------------------  MENU--->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">EasyRide</a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Найти попутку<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Создать маршрут</a></li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">FAQ</a></li>
                      </ul>
                    <!-- Right block-->
                      <ul class="nav navbar-nav navbar-right">
                       <?php if(isset($_SESSION['er_user'])): ?>
                           <form action="sign_out.php" method="POST" name="exit_form" id="exit_form" class="hidden">
                               <input id="ex" name="ex" type="hidden" value="exit">
                           </form>
                           <li><a href="#">привет, <?=getUserName($_SESSION['er_user']) ?></a></li>
                           <li><a href="#" onClick="document.getElementById('exit_form').submit(); return false;">выйти</a></li>
                       <?php else: ?>
                            <li><a id="reg-btn" href="#" data-toggle="modal" data-target="#signin-modal">регистрация</a></li>
                            <li><a id="signin-btn" href="#" data-toggle="modal" data-target="#signin-modal">войти</a></li>
                       <?php endif; ?>
                      </ul>
                      
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
    <!--   -------------------END MENU--------------------------->
        </div>
    <?php if($_SESSION['msgError'] != ""): ?>
        <span><?=$_SESSION['msgError']; ?></span>
    <?php endif; ?>
    
<!--    ------------------CONTENT------------------------------>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3>Приветствуем Вас, Владимир!</h3></div>
                <div class="col-sm-3"><span>Ваш профиль заполнен на </span></div>
<!--                Progress bar profile-->
                <div class="col-sm-3">
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                      </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
<!--                Tabs block-->
                
                    <ul id="user-profile-tabs" class="nav nav-pills">
                        <li role="presentation" class="active"><a href="#user-profil-tab" id="user-profil" role="tab" data-toggle="tab" aria-controls="user-profil-tab" aria-expanded="true">Мой профиль</a></li>
                        <li role="presentation"><a href="#user-messages-tab" id="user-messages" role="tab" data-toggle="tab" aria-controls="user-messages-tab" aria-expanded="false">Сообщения</a></li>
                        <li role="presentation"><a href="#user-routs-tab" id="user-routs" role="tab" data-toggle="tab" aria-controls="user-routs-tab" aria-expanded="false">Мои поездки</a></li>
                        <li role="presentation"><a href="#user-feedback-tab" id="user-feedback" role="tab" data-toggle="tab" aria-controls="user-feedback-tab" aria-expanded="false">Отзывы</a></li>
                        <li role="presentation"><a href="#user-cars-tab" id="user-cars" role="tab" data-toggle="tab" aria-controls="user-cars-tab" aria-expanded="false">Мои авто</a></li>
                    </ul>
                    <div class="tab-content">
<!--                Tabs content block-->
                        <div role="tabpanel" id="user-profil-tab" class="tab-pane fade active in tab jumbotron" aria-labelledby="user-profil">
                            <div class="row">
                              <div class="col-sm-2">
                                <a href="#">
                                  <img class="media-object" src="" alt="FOTO">
                                </a>
                              </div>
                              <div class="col-sm-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="col-sm-4 text-right">Имя:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="Владимир"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Фамилия:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="Коленцев"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Дата рождения:</td>
                                            <td class="col-sm-7"><input type="date" class="form-control" disabled value="1991-05-17"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Пол:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="муж"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">e-mail:</td>
                                            <td class="col-sm-7"><input type="email" class="form-control" disabled value="hhh@i.ua"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Телефон:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="380 562 322222"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Пароль:</td>
                                            <td class="col-sm-7"><input type="password" class="form-control" disabled></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                              <div class="col-sm-4 hidden-xs">
                                  <h2>Совет дня</h2>
                                  <p>Ваш профиль заполнен на 60%.
                                  Заполните недостающие данные, чтобы повысить уровень доверия к Вам на сервисе.</p>
                              </div>
                              <div class="clearfix"></div>
                              <div class="row">
                                  <div class="col-sm-4"><h3>Ваши предпочтения:</h3></div>
                                  <div class="col-sm-1"><input type="button" value="No smoking"></div>
                                  <div class="col-sm-1"><input type="button" value="No pets"></div>
                                  <div class="col-sm-1"><input type="button" value="Tolking"></div>
                                  <div class="col-sm-1"><input type="button" value="Musik"></div>
                              </div>
                            </div>    
                        </div><!--End tab user profil-------------------------------------------------------------------------->

                        <div role="tabpanel" id="user-messages-tab" class="tab-pane fade tab jumbotron" aria-labelledby="user-messages">
                           <div class="row">
                               <div class="col-sm-2">
                                   <button class="btn btn-default">Написать</button>
                                   <button class="btn btn-default">Входящие</button>
                                   <button class="btn btn-default">Отправленные</button>
                                   <button class="btn btn-default">Сортировать<wbr>подате</button>
                                   <button class="btn btn-default">Сортировать<wbr>по имени</button>
                                   <button class="btn btn-default">Удалить<wbr>отмеченные</button>
                               </div>
                               <div class="col-sm-10">
                                   <table class="table table-striped">
                                       <tbody>
                                           <thead>
                                               <tr>
                                                   <th></th>
                                                   <th>От кого</th>
                                                   <th>Кому</th>
                                                   <th>Тема</th>
                                                   <th>Дата</th>
                                               </tr>
                                           </thead>
                                           <tr>
                                               <th>1</th>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                        </div><!--End tab user messages--------------------------------------------------------------->

                        <div role="tabpanel" id="user-routs-tab" class="tab-pane fade tab jumbotron" aria-labelledby="user-routs">
                            <div class="row">
                               <div class="col-sm-3">
                                   <h2>Сегодня 21-00</h2>
                               </div>
                                <div class="col-sm-9">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                          <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Киев-Львов
                                                </a>
                                              </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                              <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                        </div><!--End tab user routs----------------------------------------------------------------------->

                        <div role="tabpanel" id="user-feedback-tab" class="tab-pane fade tab jumbotron" aria-labelledby="user-feedback">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h2>Ваш рейтинг 23</h2>
                                </div>
                                <div class="col-sm-9"><h3 class=" pull-right">Положительных отзывов 98%</h3></div>
                            </div>
                            <ul class="nav nav-pills">
                              <li role="presentation" class="active"><a href="#">Положительные</a></li>
                              <li role="presentation"><a href="#">Нейтральные</a></li>
                              <li role="presentation"><a href="#">Негативные</a></li>
                              <li role="presentation"><a href="#">Все</a></li>
                            </ul>
                            <div class="row">
                               <div class="col-sm-2 col-sm-offset-8 text-right"><span>Период:</span></div>
                                <div class="col-sm-2">
                                    <select class="form-control pull-left">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Отзыв</th>
                                            <th>От</th>
                                            <th>Дата</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <th>+</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- END tab feedback   -->

                        <div role="tabpanel" id="user-cars-tab" class="tab-pane fade tab jumbotron" aria-labelledby="user-cars">
                            <div class="row">
                              <div class="col-sm-3">
                                <a href="#">
                                  <img class="media-object" src="" alt="FOTO">
                                </a>
                              </div>
                              <div class="col-sm-9">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="col-sm-4 text-right">Марка:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="Honda"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Модель:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="Accord"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Цвет:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="Красный"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Гос. номер:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="АЕ3224ЕИ"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Количество мест:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="4"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-4 text-right">Расход топлива л/100км:</td>
                                            <td class="col-sm-7"><input type="text" class="form-control" disabled value="10"></td>
                                            <td class="col-sm-1"><span class="glyphicon glyphicon-edit"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div><!-- END tab user cars  ------------------------------------------------------------------------------------------>
                        
                    </div> <!-- END Tabs block  ------------------------------------------------------------------------------------------------>
            </div>
        </div>
    </div>
<!--    ------------------FOOTER---------------------------------------------------------------------------------------------------------------->
    <div class="footer">
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
    </div>
  </body>
</html>