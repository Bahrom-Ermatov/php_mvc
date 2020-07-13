<?php
require_once 'application/lib/Db.php';

class AddTaskModel {
    public function AddTask($params) {        

        $db = connect_db ();
        $sql = 'insert into tasks (user_name, email, task_text, task_status, task_rewrite) values (:name, :email, :task, 0, 0)';
        $stmt = $db -> prepare($sql);
        $stmt -> execute($params);

        echo 'Успешно добавлена задача';
    }
}

