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
                <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
                <li class="breadcrumb-item active" aria-current="page"> @if(!empty($model)) value="{{$model->name}}" @else Создать пользователя @endif  </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="#" autocomplete="off" enctype='multipart/form-data'>
                <input @if(!empty($model)) value="{{$model->id}}" @endif type="hidden" id="course-id">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Псевдоним</label>
                    <input name="name" @if(!empty($model)) value="{{$model->name}}" @endif type="text" class="form-control"  placeholder="Введите псевдоним">
                </div>
                <div class="form-group">
                    <label for="email">Email адрес</label>
                    <input name="email" @if(!empty($model)) value="{{$model->email}}" @endif type="email" class="form-control"  placeholder="Введите email">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input name="password" @if(!empty($model)) value="{{$model->password}}" @endif type="password" class="form-control" placeholder="Введите пароль">
                </div>
                <div class="form-group">
                    <label for="description">Аватар</label>
                    <input type='file' name='image' class='form-control'>
                </div>
                @if(!empty($model->image))
                    <label for="avatar">Аватар</label>
                    <div class="form-group">
                        <img style="width: 200px;height: 200px" src='/images/avatars/{{$model->image}}'>
                    </div>
                @endif
                <div class="form-group">
                    <label for="status">Персонаж</label>

                    <select name="character_id" class="form-control">
                        @foreach(App\http\models\Character::all() as $character)
                            <option value="{{$character->id}}" @if (!empty($model->character) && $model->character->id == $character->id ) selected @endif>{{$character->name}}</option>
                        @endforeach
                    </select>
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
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="users/"><button class="btn btn-danger">Отмена</button></a>
            </form>
        </div>
    </div>

@endsection
