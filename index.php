<?php
require_once 'application/controllers/MainController.php';
require_once 'application/controllers/AddTaskController.php';
require_once 'application/controllers/GetTaskController.php';
require_once 'application/controllers/EditTaskController.php';
require_once 'application/controllers/AccountController.php';


$url = $_SERVER['REQUEST_URI'];  //Получаем URL запроса

$url_part = explode('?', $url, 2);


switch($url_part[0])
{
    case '/' :
        $controller = new MainController();
        $controller->IndexAction();
        break;
    case '/add-task': 
        $controller = new AddTaskController();
        $controller->AddTask();
        break;
    case '/get-task' : 
        $controller = new GetTaskController();
        $controller->GetTask();
        break;
    case '/edit-task' : 
        $controller = new EditTaskController();
        $controller->EditTask();
        break;
    case '/auth': 
        $controller = new AccountController();
        $controller->show_login_form();
        break;
    case '/login': 
        $controller = new AccountController();
        $controller->loginAction();
        break;  
    case '/logout': 
        $controller = new AccountController();
        $controller->logOut();
        break;    
    default : 
        echo "Страница не найдена";
    break;
}












