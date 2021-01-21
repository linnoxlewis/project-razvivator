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
                <li class="breadcrumb-item active" aria-current="page">Параметры системы</li>
                <li class="breadcrumb-item active" aria-current="page"> @if(!empty($model)) {{$model->name}} @else Добавить параметр @endif  </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="#" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Название</label>
                    <input name="name" @if(!empty($model)) value="{{$model->name}}" @endif type="text" class="form-control"  placeholder="Введите название">
                </div>
                <div class="form-group">
                    <label for="email">Ключ</label>
                    <input name="key" @if(!empty($model)) value="{{$model->key}}" @endif type="text" class="form-control"  placeholder="Введите название">
                </div>
                <div class="form-group">
                    <label for="email">Значение</label>
                    <input name="value" @if(!empty($model)) value="{{$model->value}}" @endif type="text" class="form-control"  placeholder="Введите название">
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="/admin/params">Отмена</a>
            </form>
        </div>
    </div>

@endsection
