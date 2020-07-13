<?php
require_once 'application/lib/Db.php';

class EditTaskModel {
    public function EditTask($params) {
        if (isset($_COOKIE['user']) && $_COOKIE['user'] == 'admin'){        
            $db = connect_db ();
            $sql = 'select id, user_name, email, task_text, task_status, task_rewrite from tasks where id = :id';
            $stmt = $db -> prepare($sql);
            $stmt->bindValue(':id', $params['id']);
            $stmt -> execute();
            $result = $stmt -> fetchall(PDO::FETCH_ASSOC);

            $sql = 'update tasks set user_name = :user_name, email=:email, task_text=:task_text, task_status=:task_status, task_rewrite=:task_rewrite where id = :id';
            $stmt = $db -> prepare($sql);
            $stmt->bindValue(':id', $params['id']);
            $stmt->bindValue(':user_name', $params['name']);
            $stmt->bindValue(':email', $params['email']);
            $stmt->bindValue(':task_text', $params['task']);
            $stmt->bindValue(':task_status', $params['status']);
            if ($result[0]['task_text']!=$params['task']) {
                $stmt->bindValue(':task_rewrite', 1);
            } else {
                $stmt->bindValue(':task_rewrite', $result[0]['task_rewrite']);
            }

            $stmt -> execute();

            $results = [
                "error_code" =>0,
                "error_msg" => "Задача успешно изменена"
            ];
            
        } else {
            $results = [
                "error_code" =>-1,
                "error_msg" => "Необходимо пройти авторизацию"
            ];
        }
        echo json_encode($results);
    }
}

