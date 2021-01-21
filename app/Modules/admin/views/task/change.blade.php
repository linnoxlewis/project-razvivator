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
            <form method="post" action="#" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Название</label>
                    <input name="name" @if(!empty($model)) value="{{$model->name}}" @endif type="text" class="form-control"  placeholder="Введите название">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea id="summernote" name="description" class="form-control"  placeholder="Введите описание">@if(!empty($model)) {{$model->description}} @endif </textarea>
                </div>
                <div class="form-group">
                    <label for="scope_id">Сфера</label>
                    <select name="scope_id" class="form-control">
                        @foreach(App\Http\Models\Scope::getList() as $key => $value)
                            <option value="{{$key}}" @if (!empty($model) && $key == $model->scope_id) selected @endif>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Статус</label>
                    <select name="status" class="form-control">
                        @foreach(App\Modules\admin\helpers\StatusHelper::list() as $key => $value)
                            <option value="{{$key}}" @if (!empty($model) && $key == $model->status) selected @endif>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="/admin/task">Отмена</a>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
        });
    </script>
@endsection
