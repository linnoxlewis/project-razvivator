@extends('admin::layouts.master')
@section('content')
    <h1 class="page-title">Пользователь {{$model->name}} </h1>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>id</th>
            <td>{{$model->id}}</td>
        </tr>
        <tr>
            <th>Псевдоним</th>
            <td>{{$model->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$model->email}}</td>
        </tr>
        <tr>
            <th>Роль</th>
            <td>{{$model->role}}</td>
        </tr>
        <tr>
            <th>Хобби</th>
            <td>{{$model->hobies}}</td>
        </tr>
        <tr>
            <th>Информация</th>
            <td>{{$model->info}}</td>
        </tr>
        <tr>
            <th>Дата регистрации</th>
            <td>{{$model->created_at}}</td>
        </tr>
        </tbody>

    </table>
    <h1 class="page-title">Персонаж</h1>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Персонаж</th>
            <td>@if($model->character) {{$model->character->character->name}} @else Без персонажа @endif</td>
        </tr>
        <tr>
            <th>Очки персонажа</th>
            <td>@if($model->character) {{$model->character->score}} @else Нет отчков @endif</td>
        </tr>
        </tbody>
        @if(!empty($model->character) && !empty($model->character->scopeLevel))
            @foreach($model->character->scopeLevel as $scopeLevel)
            <tr>
                <th>Уровень "{{$scopeLevel->scope->name}}"</th>
                <td>{{$scopeLevel->level}} ({{$scopeLevel->score}})</td>
            </tr>
            @endforeach
        @endif
    </table>

@endsection

