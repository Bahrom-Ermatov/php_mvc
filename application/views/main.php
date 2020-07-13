
<div class="container">
    <h4>Добавление задачи</h4>
    <form>
        <input type="text" name="name" id="name" placeholder="Введите имя" class="form-control"/><br>
        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"/><br>
        <textarea name="task" id="task" class="form-control" placeholder="Введите текст задачи"></textarea><br>
        <button type="button" class="btn btn-sm btn-success" id="addTask">Добавить</button>
    </form>
    <br>
    <div id="errorMess" style="color:red"></div>
</div>
<br>
<div class="container">
    <table  id="example"
            data-toolbar=".toolbar"
            data-show-columns="false"
            data-search="false"
            data-show-toggle="false"
            data-pagination="true"
            data-reorderable-columns="true">
        <thead>
            <tr>
                <th data-field="user_name" data-sortable="true">Имя пользователя</th>
                <th data-field="email" data-sortable="true">Email</th>
                <th data-field="text" data-sortable="false">Текст задачи</th>
                <th data-field="status" data-sortable="true">Статус задачи</th>
                <th data-field="edited" data-sortable="false">Изменен администратором</th>
                <?php
                    if (isset($_COOKIE['user']) && $_COOKIE['user'] == 'admin'){
                        echo '<th data-field="action" data-sortable="false">Действие</th>';
                    }
                ?> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $val): ?>
                <tr>
                <td><?php echo $val['user_name']; ?></td>
                <td><?php echo $val['email']; ?></td>
                <td><?php echo $val['task_text']; ?></td>
                <td><?php if ($val['task_status']==1) { echo "Выполнен"; } else {echo "не выполнен";} ?></td>
                <td><?php if ($val['task_rewrite']==1) { echo "Да"; } else {echo "Нет";} ?></td>
                <?php
                    if (isset($_COOKIE['user']) && $_COOKIE['user'] == 'admin'){
                        echo '<td><a href="http://f0454640.xsph.ru/get-task?id='.$val['id'].'">Изменить</a></td>';
                    }
                ?> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

