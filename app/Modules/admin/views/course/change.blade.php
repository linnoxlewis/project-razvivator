@extends('admin::layouts.master')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style-1">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Курсы</li>
                <li class="breadcrumb-item active" aria-current="page"> @if(!empty($model)) {{$model->name}} @else
                        Создать курс @endif  </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="#" autocomplete="off">
                {{ csrf_field() }}
                <input @if(!empty($model)) value="{{$model->id}}" @endif type="hidden" id="course-id">
                <div class="form-group">
                    <label for="email">Название</label>
                    <input name="name" @if(!empty($model)) value="{{$model->name}}" @endif type="text"
                           class="form-control" placeholder="Введите название">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" class="form-control"
                              placeholder="Введите описание">@if(!empty($model)) {{$model->description}} @endif </textarea>
                </div>
                <div class="form-group">
                    <label for="status">Статус</label>
                    <select name="status" class="form-control">
                        @foreach(App\Modules\admin\helpers\StatusHelper::list() as $key => $value)
                            <option value="{{$key}}" @if (!empty($model) && $key == $model->status) selected @endif>
                                {{$value}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="/admin/course/">
                        <button class="btn btn-danger cancel">Отмена</button>
                    </a>
                </div>
            </form>

            @if(!empty($model))
                <div class="col-lg-12" style="margin-top: 5%;margin-bottom: 5%">
                    <h3 align="center">Добавить задачи</h3>
                    {{ csrf_field() }}
                    <div class="form-group tasks">
                        <div class="form-group">
                            <label for="email">Поиск</label>
                            <input name="search" id="search-task" class="form-control" placeholder="Введите название">
                        </div>
                        <select id="task-select" name="scope_id" class="form-control">
                            <option selected>Не выбрано</option>
                            @foreach(App\Http\Models\Scope::getList() as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div align="center" class="form-group">
                        <button id="add-task" style=" width:40%; margin-top: 5px" class="btn btn-primary">Добавить
                            задачу
                        </button>
                        <a href="generate-random-course/{{$model->id}}">
                            <button style="margin-top: 5px; width:40%" class="btn btn-primary">Случайная генерация
                                курса
                            </button>
                        </a>
                    </div>
                </div>
                <div class="message" style="margin-top: 5%;margin-bottom: 5%">
                    @if(session('info'))
                        <div class="row">
                            <div class="alert alert-success" style="width: 100%" role="alert">
                                <button type="button" style="margin-left:3px;" class="close" data-dismiss="alert"
                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                {{session('info')}}
                            </div>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="row">
                            <div class="alert alert alert-danger" style="width: 100%" role="alert">
                                <button type="button" style="margin-left:3px" class="close" data-dismiss="alert"
                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                {{session('error')}}
                            </div>
                        </div>
                    @endif
                </div>
        </div>
        <div class="col-lg-6">
            <h5>Задач в курсе: <span class="task-count"></span>/{{App\Http\Models\Course::LIMIT_TASK_IN_COURSE}}</h5>
            <table class="table ">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody class="course-task-id">
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
        </div>
    </div>
    @endif
    <script>
        $('#search-task').keyup(function () {
            $('#task').remove();
            var value = $('#search-task').val();
            $.ajax({
                type: 'GET',
                url: 'search-task/' + value,
                success: function (data) {
                    var datas = data["data"];
                    if (datas.length !== 0) {
                        var tasks = data["data"]["tasks"];
                        var select = "<select  id='task' style='margin-top: 5px' class='form-control'>"
                        var array = [];
                        for (var i = 0; i < tasks.length; i++) {
                            select = select + "<option value='" + tasks[i]['id'] + "'>" + tasks[i]['name'] + "</option>"
                        }
                        select = select + "</select>";
                        $('#task').remove();
                        $('.tasks').append(select);
                    }
                }
            });
            // $('#errmsg').empty();
            //$('#errmsg').text(Value);
        });
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);
        $('#task-select').change(function () {
            $('#task').remove();
            $.ajax({
                type: 'GET',
                url: 'get-task-by-scope/' + $(this).val(),
                success: function (data) {
                    var select = "<select  id='task' style='margin-top: 5px' class='form-control'>"
                    var array = [];
                    for (var i = 0; i < data["data"].length; i++) {
                        select = select + "<option value='" + data["data"][i]['id'] + "'>" + data["data"][i]['name'] + "</option>"
                    }
                    select = select + "</select>";
                    $('.tasks').append(select);
                }
            });
        });
        $(document).ready(function (e) {
            getTasks();
            $("#add-task").click(function () {
                var courseId = $('#course-id').val();
                if (courseId === '') {
                    alert('Курс еще не создан!');
                } else {
                    var taskId = $('#task').val();
                    if (taskId === undefined) {
                        alert('Задача не выбрана!');
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: 'add-task-in-course/',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "courseId": courseId,
                                "taskId": taskId
                            },
                            success: function (data) {
                                var id = "<td>" + data['data']['id'] + "</td>";
                                var name = "<td>" + data['data']['name'] + "</td>";
                                var action = "<td>" +
                                    "<a href='/admin/course/delete-task-on-course/" + data['data']['id'] + "' class='task-delete delete' title='Delete' " +
                                    "data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a> </td>"
                                var result = "<tr>" + id + name + action + "</tr>"
                                $(".course-task-id").append(result);

                                var successHtml = '<div class="row">' +
                                    '<div class="alert alert-success" style="width: 100%" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>' +
                                    data['message'] + '</div> </div>';
                                $('.message').html(successHtml);

                                var count = parseInt($('.task-count').text());
                                $('.task-count').text(count + 1);
                                $('#task').remove();
                            },
                            error: function (data) {
                                var errorHtml = '<div class="row">' +
                                    '<div class="alert alert-danger" style="width: 100%" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>' +
                                    data.responseJSON['message'] + '</div> </div>';
                                $('.message').html(errorHtml);
                            }
                        });
                        window.setTimeout(function () {
                            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                                $(this).remove();
                            });
                        }, 2000);
                    }
                }
            });
        });

        function getTasks(taskId = null) {
            var courseId = $('#course-id').val();
            if (courseId === '') {
                return [];
            } else {
                $.ajax({
                    type: 'GET',
                    url: 'get-tasks-by-course/' + courseId,
                    success: function (data) {
                        for (var i = 0; i < data['data'].length; i++) {
                            var id = "<td>" + data['data'][i]['id'] + "</td>";
                            var name = "<td>" + data['data'][i]['name'] + "</td>";
                            var action = "<td>" +
                                "<a href='/admin/course/delete-task-on-course/" + data['data'][i]['id'] + "' class='task-delete delete' title='Delete' " +
                                "data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a> </td>"
                            var result = "<tr>" + id + name + action + "</tr>"
                            $(".course-task-id").append(result);
                        }
                        $('.task-count').text(data['data'].length);
                    }
                });
            }
        }
    </script>
@endsection


