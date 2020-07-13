<br>
<div class="container">
    <h4>Изменение задачи</h4>
    <form>
        <div class="form-group">
            <label for="name">Имя: </label>
            <input type="text" name="name" id="name" class="form-control" value = "<?php echo $task[0]['user_name']; ?>"/>
            <input type="hidden" id="id" value="<?php echo $task[0]['id']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" class="form-control" value = "<?php echo $task[0]['email']; ?>"/>
        </div>
        <div class="form-group">
            <label for="task">Текст задачи: </label>
            <textarea name="task" id="task" class="form-control"><?php echo $task[0]['task_text']; ?></textarea>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" >
            <input type="checkbox" class="form-check-input" id="check_task" <?php if ($task[0]['task_status']==1) {echo "checked";}; ?>>
            <label class="form-check-label" for="check_task">Задача выполнена</label>
        </div>
        <br>
        <button type="button" class="btn btn-sm btn-success" id="EditTask">Изменить</button>
    </form>
    <br>
    <div id="errorMess" style="color:red"></div>
</div>

