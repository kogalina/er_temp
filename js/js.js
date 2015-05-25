$(function(){
  $("#reg-btn").click(function(){
      document.forms["signin-form"]["signin-type"].value = "reg";
      $("#signin-modal button[type='submit']").html("Регистрация");
  });
    $("#signin-btn").click(function(){
        document.forms["signin-form"]["signin-type"].value = "signin";
        $("#signin-modal button[type='submit']").html("Войти");
  });
  });


function formDataValidate() {
    //Считаем значения из полей name и email в переменные x и y
    var EMPTY_WARNING = "*данное поле обязательно для заполнения";
    var emailVal    = document.forms["signin-form"]["userEmail"].value;
    //var nameVal     = document.forms["regForm"]["userName"].value;
    var pass        = document.forms["signin-form"]["userPassword"].value;
    //var passCon     = document.forms["regForm"]["userPasswordConfirm"].value;
    
    //Если поле Email пустое
    if (emailVal.length == 0){
      document.getElementById("email_f").innerHTML = EMPTY_WARNING;
      return false;
   }else document.getElementById("email_f").innerHTML = "";
   //Если поле Name пустое
//   if (nameVal.length == 0){
//      document.getElementById("name_f").innerHTML = EMPTY_WARNING;
//      return false;
//   }else document.getElementById("name_f").innerHTML = "";
    //Если поле Пароль пустое
   if (pass.length == 0){
      document.getElementById("pass_f").innerHTML = EMPTY_WARNING;
      return false;
   }else document.getElementById("pass_f").innerHTML = "";
    //Если поле подтвердить пароль пустое
//   if (passCon.length == 0){
//      document.getElementById("passCon_f").innerHTML = EMPTY_WARNING;
//      return false;
//   }else document.getElementById("passCon_f").innerHTML = "";
    //Если пароль не подтвержден
//   if (pass === passCon){
//      document.getElementById("passCon_f").innerHTML = "";
//   }else{
//      document.getElementById("passCon_f").innerHTML = "*пароль введен неверно";
//      return false; 
//   } 

}
