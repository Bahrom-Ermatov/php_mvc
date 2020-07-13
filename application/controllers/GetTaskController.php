<?php
require_once 'application/models/GetTaskModel.php';
require_once 'application/core/View.php';

class GetTaskController {
    public function GetTask() {
        $params["id"] = filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING);
        $request = new GetTaskModel($params["id"]);
        $result = $request->GetTask($params);
        $vars = [
            'task' => $result
        ];
   
        $view = new View();
        $view->render('change_task', 'Изменение задачи', $vars);
  
    }
}
