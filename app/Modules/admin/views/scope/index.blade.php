@extends('admin::layouts.master')
@section('content')
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style-1">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Сферы развития</li>
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
                        <a href="/admin/scope/change">
                            <button style="margin: 1px 1px 1px 1px" type="button" class="btn btn-primary">Добавить</button>
                        </a>
                        <a href="/admin/scope">
                            <button style="margin: 1px 1px 1px 1px" button type="button" class="btn btn-primary">Сбросить
                                фильтры
                            </button>
                        </a>
                    </span>
                    <h1 class="card-title">Сферы развития</h1>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $scope)
                            <tr>
                                <th scope="row">{{$scope->id}}</th>
                                <td><a href="/admin/scope/view/{{$scope->id}}"> {{$scope->name}}</a></td>
                                <td>
                                    <a href="/admin/scope/change?id={{$scope->id}}" class="settings" title="Settings"
                                       data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                    <a href="/admin/scope/delete/{{$scope->id}}" class="delete" title="Delete"
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
                    <form action="scope" method="GET" class=" mr-auto">
                        @foreach($orderBy as $key => $value)
                            <div class="form-group">
                                <label for={{$key}}>{{$value}}</label>
                                <input name={{$key}} type="text" class="form-control "
                                       @if (isset($filter[$key])) value="{{$filter[$key]}}" @endif>
                            </div>
                        @endforeach
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
