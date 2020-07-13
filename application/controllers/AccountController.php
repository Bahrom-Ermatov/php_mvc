<?php
require_once 'application/models/LoginModel.php';
require_once 'application/core/View.php';

class AccountController {
   public function show_login_form(){
    $view = new View();
    $view->render('login', 'login');
   } 

   public function loginAction() {
      $params["user_name"] = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
      $params["password"] = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
      
      $request = new LoginModel();
      $result = $request->auth_user($params);      
   }

   public function logOut() {
    $request = new LoginModel();
    $result = $request->logout_user();
   }

}
