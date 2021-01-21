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
@endsection

