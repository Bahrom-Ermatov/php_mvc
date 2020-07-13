function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
      return false;
    }else{
      return true;
    }
}

$("#addTask").on("click", function(){
    let name = $("#name").val().trim();
    let email = $("#email").val().trim();
    let task = $("#task").val().trim();

    if (name=="") {
        $("#errorMess").text("Введите имя");
        return false;
    } else if (email=="") {
        $("#errorMess").text("Введите email");
        return false;
    } else if(IsEmail(email)==false){
        $('#errorMess').text("Некорректный Email");
        return false;
    } else if (task=="") {
        $("#errorMess").text("Введите текст задачи");
        return false;
    }

    $("#errorMess").text("");

    $.ajax({
        url: 'http://f0454640.xsph.ru/add-task',
        type: 'POST',
        cache: false,
        data: {'name': name, 'email': email, 'task': task},
        dataType: 'html',
        beforeSend: function() {
            $("#addTask").prop("disabled", true);
        },
        success: function(data) {
            alert(data);
            location.reload();
            $("#addTask").prop("disabled", false);

        }
    });

});


$("#EditTask").on("click", function(){
    let id = $("#id").val().trim();
    let name = $("#name").val().trim();
    let email = $("#email").val().trim();
    let task = $("#task").val().trim();
    let status = $("#check_task").is(':checked');

    if (name=="") {
        $("#errorMess").text("Введите имя");
        return false;
    } else if (email=="") {
        $("#errorMess").text("Введите email");
        return false;
    } else if(IsEmail(email)==false){
        $('#errorMess').text("Некорректный Email");
        return false;
    } else if (task=="") {
        $("#errorMess").text("Введите текст задачи");
        return false;
    }

    $("#errorMess").text("");

    $.ajax({
        url: 'http://f0454640.xsph.ru/edit-task',
        type: 'POST',
        cache: false,
        data: {'id': id, 'name': name, 'email': email, 'task': task, 'status': status},
        dataType: 'html',
        beforeSend: function() {
            $("#EditTask").prop("disabled", true);
        },
        success: function(data) {
            var jsondata = JSON.parse(data);
            if (jsondata.error_code==0) {
                $(location).attr('href', 'http://f0454640.xsph.ru/')
            } else {
                $(location).attr('href', 'http://f0454640.xsph.ru/auth')
            }

            $("#EditTask").prop("disabled", false);
        }
    });

});

$("#btnAuth").on("click", function(){
    let login = $("#login").val().trim();
    let password = $("#password").val().trim();

    if (login=="") {
        $("#errorMess").text("Введите имя");
        return false;
    } else if (password=="") {
        $("#errorMess").text("Введите email");
        return false;
    }

    $("#errorMess").text("");

    $.ajax({
        url: 'http://f0454640.xsph.ru/login',
        type: 'POST',
        cache: false,
        data: {'login': login, 'password': password},
        dataType: 'html',
        beforeSend: function() {
            $("#btnAuth").prop("disabled", true);
        },
        success: function(data) {
            var jsondata = JSON.parse(data);
            if (jsondata.error_code==0) {
                $(location).attr('href', 'http://f0454640.xsph.ru/')
            } else {
                alert(jsondata.error_msg);
            }
            $("#btnAuth").prop("disabled", false);
        }
    });

});


$(document).ready(function() {
      $('#example').bootstrapTable(
        {
                  pageSize: 3, //specify 5 here
                  pageList: [3]//list can be specified here
              }
      )  
});





