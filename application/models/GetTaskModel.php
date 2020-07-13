<?php
require_once 'application/lib/Db.php';

class GetTaskModel {
    public function GetTask($params) {
        $db = connect_db ();
        $sql = 'select id, user_name, email, task_text, task_status, task_rewrite from tasks where id = :id';
        $stmt = $db -> prepare($sql);
        $stmt->bindValue(':id', $params['id']);
        $stmt -> execute();
        $result = $stmt -> fetchall(PDO::FETCH_ASSOC);

        return $result;
    }

}

