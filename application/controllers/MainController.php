<?php
require_once 'application/models/MainModel.php';
require_once 'application/core/View.php';

class MainController {
   public function IndexAction() {
      $request = new MainModel();
      $result = $request->getTasks();
      $vars = [
         'tasks' => $result
      ];

      $view = new View();
      $view->render('main', 'Главная страница', $vars);
   }
}
