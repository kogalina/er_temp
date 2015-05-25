<!--        Sign IN POP-UP ------------------------------------------------------------------->
        <div id="signin-modal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Авторизация</h3>
              </div>
              <div class="modal-body">
                <form id="signin-form" role="form" action="sign_in.php" method="POST" name="signin-form" onsubmit="return formDataValidate()">
            	      <div class="form-group">
            	        <label for="userEmail">Email</label>
            	        <input name="userEmail" type="email" class="form-control" id="userEmail" placeholder="Email"><span id="email_f" class="text-danger"></span>
            	      </div>
            	      <div class="form-group">
            	        <label for="userPassword">Пароль</label>
            	        <input name="userPassword" type="password" class="form-control" id="userPassword"><span id="pass_f" class="text-danger"></span>
            	      </div>
            	          <input type="hidden" id="signin-type" name="signin-type">
            	      <div class="social-text"><h4>Или войдите с помощью:</h4></div>
            	      <div class="social-button">
            	        <p><a href="sample.html"><img src="img/vk.png"  alt="Vk" ></a></p>
                        <p><a href="sample.html"><img src="img/facebook.png"  alt="facebook" ></a></p>
                        <p><a href="sample.html"><img src="img/twitter.png"  alt="twitter" ></a></p>
                        <p><a href="sample.html"><img src="img/blog.png"  alt="blogest"></a></p>
            	      </div>
            
            	     <div class="buttons-signin">
            	     	<input type="checkbox" name="remember"> Запомнить меня
            	     </div>
	            	<div class="registr">
	            	    <a href="#">Забыл пароль</a> | <a href="#">Регистрация</a>
	            	</div>
	            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary" form="signin-form"></button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
       