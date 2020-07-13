<?php
require_once 'application/models/EditTaskModel.php';

class EditTaskController {
    public function EditTask() {
        $params["id"] = $_POST['id'];
        $params["name"] = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $params["email"] = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $params["task"] = filter_var(trim($_POST['task']), FILTER_SANITIZE_STRING);
        if ($_POST['status']) {
            $params["status"] = 1;
        } else {
            $params["status"] = 0;
        }
        $request = new EditTaskModel();
        $result = $request->EditTask($params);
    }
}
