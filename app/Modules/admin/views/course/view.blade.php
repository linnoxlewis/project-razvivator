@extends('admin::layouts.master')
@section('content')
    <h1 class="page-title">{{$model->name}} </h1>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>id</th>
            <td>{{$model->id}}</td>
        </tr>
        <tr>
            <th>Название</th>
            <td>{{$model->name}}</td>
        </tr>
        <tr>
            <th>Описание</th>
            <td>{{$model->description}}</td>
        </tr>
        <tr>
            <th>Статус</th>
            <td>{{$model->status}}</td>
        </tr>
        </tbody>
    </table>

    @if(!empty($model->tasks))
        <h1 class="page-title">Задачи в курсе </h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Сфера</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($model->tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td><a href="/admin/task/view/{{$task->id}}"> {{$task->name}}</a></td>
                    <td>{{$task->scope->name}}</td>
                    <td>{{App\Modules\admin\helpers\StatusHelper::getStatus($task->status)}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>
                        <a href="/admin/task/change?id={{$task->id}}" class="settings" title="Settings"
                           data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="/admin/task/delete/{{$task->id}}" class="delete" title="Delete"
                           data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

