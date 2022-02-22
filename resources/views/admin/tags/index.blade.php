@extends('adminlte::page')
@section('title', 'Blogs-Daniel')

@section('content_header')
    <a href="{{route('admin.tags.create')}}" class="btn btn-primary float-right">Agregar Etiqueta</a>
    <h1>Todas las Etiquetas</h1>
@stop

@section('content')
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="20px">
                                <a class="btn btn-warning btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                            </td>
                            <td width="20px">
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

