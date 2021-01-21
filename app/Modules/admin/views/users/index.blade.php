@extends('admin::layouts.master')
@section('content')
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style-1">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
            </ol>
        </nav>
    </div>
    @if(session('info'))
        <div class="row">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                {{session('info')}}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <span style=" position: absolute; right: 0; margin-right: 21px; margin-bottom: 20px" >
                        <a href="/admin/users/change">
                            <button style="margin: 1px 1px 1px 1px" type="button" class="btn btn-primary">Добавить</button>
                        </a>
                        <a href="/admin/users">
                            <button style="margin: 1px 1px 1px 1px" button type="button" class="btn btn-primary">Сбросить
                                фильтры
                            </button>
                        </a>
                    </span>
                    <h1 class="card-title">Пользователи</h1>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Персонаж</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td><a href="/admin/users/view/{{$user->id}}">@if(!empty($user->image))<img class="avatar" src='/images/avatars/{{$user->image}}'>@endif{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>@if(!empty($user->character)) {{$user->character->character->name}} (ур.{{$user->character->level}}) @else Без персонажа @endif</td>
                                <td>{{App\Modules\admin\helpers\StatusHelper::getStatus($user->status)}}</td>
                                <td>
                                    <a href="/admin/users/change?id={{$user->id}}" class="settings" title="Settings"
                                       data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                    <a href="/admin/users/delete/{{$user->id}}" class="delete" title="Delete"
                                       data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>{{ $model->appends(request()->query())->links() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Фильтрация</h5>
                    <form action="users" method="GET" class=" mr-auto">
                        @foreach($orderBy as $key => $value)
                            <div class="form-group">
                                <label for={{$key}}>{{$value}}</label>
                                <input name={{$key}} type="text" class="form-control "
                                       @if (isset($filter[$key])) value="{{$filter[$key]}}" @endif>
                            </div>
                        @endforeach
                            @if(!empty($selectFilter))
                                @foreach($selectFilter as $key => $value)
                                    <div class="form-group">
                                        <label for={{$key}}>{{$key}}</label>
                                        <select name="{{$key}}" class="form-control">
                                            <option value=""> Без сортировки</option>
                                            @foreach($value as $subKey => $subValue)
                                                <option value="{{$subKey}}">{{$subValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            @endif
                        <div class="form-group">
                            <label for="sort">Сортировка</label>
                            <select name="sort" class="form-control">
                                <option value=""> Без сортировки</option>
                                @foreach($orderBy as $key => $value)
                                    <option value="{{$key}}:asc">{{$value}} ASC</option>
                                    <option value="{{$key}}:desc">{{$value}} DESC</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Применить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>
<style>
    .avatar {
        vertical-align: middle;
        border-radius: 50%;
        width: 70px;
        height: 70px;

    }
</style>

