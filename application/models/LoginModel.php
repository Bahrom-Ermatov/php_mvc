<?php
require_once 'application/lib/Db.php';

class LoginModel {
    public function auth_user($params) {
        $db = connect_db ();
        $sql = 'select user_login from users where user_login=:user_login and user_password=:password';
        $stmt = $db -> prepare($sql);
        $stmt->bindValue(':user_login',$params['user_name']);
        $stmt->bindValue(':password',md5($params['password']));
        $stmt -> execute(); 
        $result = $stmt -> fetchall(PDO::FETCH_ASSOC);
        if (count($result)>0){
            setcookie('user',$result[0]['user_login'],time()+3600,"/");
            $results = [
                "error_code" =>0,
                "error_msg" => "Авторизация прошла успешно"
            ];
        } else {
            $results = [
                "error_code" =>-1,
                "error_msg" => "Введен неверный логин или пароль"
            ];
        }
        echo json_encode($results);
    }
    public function logout_user()
    {
        setcookie('user','',time(),"/");
        header('Location: /');
    }

}
