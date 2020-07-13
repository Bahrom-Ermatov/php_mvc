<?php
require_once 'application/lib/Db.php';

class MainModel {
    public function getTasks() {
        $db = connect_db ();
        $sql = 'select id, user_name, email, task_text, task_status, task_rewrite from tasks';
        $stmt = $db -> prepare($sql);
        $stmt -> execute();
        $result = $stmt -> fetchall(PDO::FETCH_ASSOC);

        return $result;
    }

}

