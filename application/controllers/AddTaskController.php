<?php
require_once 'application/models/AddTaskModel.php';

class AddTaskController {
    public function AddTask() {
        $params["name"] = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $params["email"] = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $params["task"] = filter_var(trim($_POST['task']), FILTER_SANITIZE_STRING);
        $request = new AddTaskModel();
        $result = $request->AddTask($params);
    }
}
