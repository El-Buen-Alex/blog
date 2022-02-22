@extends('adminlte::page')
@section('title', 'Blogs-Daniel')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary btn-sm float-right">Nuevo Post</a>
    <h1>Todos Mis Post</h1>

@stop

@section('content')
   @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop