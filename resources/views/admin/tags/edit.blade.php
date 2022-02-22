@extends('adminlte::page')
@section('title', 'Blogs-Daniel')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop

@section('content')
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card-body">
            {!! Form::model($tag, ['route'=>['admin.tags.update', $tag] , 'method'=>'put']) !!}
                 @include('admin.tags.partials.form')
                {!! Form::submit('Actualizar Etiqueta', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection