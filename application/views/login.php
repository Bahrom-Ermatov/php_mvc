<div class="container">
    <h4>Форма авторизации</h4>
    <form  action="http://localhost/projects/php_mvc/login" method="post">
        <input type="text" name="login" id="login" placeholder="Введите логин" class="form-control"/><br>
        <input type="password" name="password" id="password" placeholder="Введите пароль" class="form-control"/><br>
        <button type="button" class="btn btn-sm btn-success" id="btnAuth">Вход</button>
    </form>
    <br>
    <div id="errorMess" style="color:red"></div>
</div>

