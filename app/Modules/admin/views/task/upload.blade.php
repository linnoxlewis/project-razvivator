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
                <li class="breadcrumb-item active" aria-current="page">Сферы</li>
                <li class="breadcrumb-item active" aria-current="page"> @if(!empty($model)) {{$model->name}} @else Создать задачу @endif  </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="description">Файл с задачами</label>
                    <input type='file' name='file' class='form-control'>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="users/"><button class="btn btn-danger">Отмена</button></a>
            </form>
        </div>
    </div>
@endsection
