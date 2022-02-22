@extends('adminlte::page')
@section('title', 'Blogs-Daniel')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
   <div class="card">
       <div class="card-body">
           {!! Form::open(['route'=>'admin.posts.store', 'autocomplete'=>'off', 'files'=>true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                <div class="form-group">
                    {!! Form::label('name', 'name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del Post']) !!}
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del Post primero', 'readonly']) !!}
                    @error('slug')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Categorias') !!}
                    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                    @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="fw-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{$tag->name}}
                        </label>
                    @endforeach
                    @error('tags')
                        <br>
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="fw-bold">Estados</p>
                    <label class="mr-2">
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>
                    <label class="mr-2">
                        {!! Form::radio('status', 2) !!}
                        Publicado
                    </label>
                    @error('status')
                        <br>
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="image_wrapper">
                            <img src="https://cdn.pixabay.com/photo/2021/06/24/11/18/background-6360865_960_720.png" alt="imagen_defecto" id="picture">
                        </div>
                    </div>
                    <div class="col px-3">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen del Post:') !!}
                            {!! Form::file('file', ['class'=>'form-control-file']) !!}
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni minima, quas amet assumenda quisquam 
                            necessitatibus atque praesentium adipisci aperiam obcaecati architecto, aut qui, 
                            beatae vero optio suscipit. Assumenda, placeat magni?
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Exctracto') !!}
                    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
                    @error('extract')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo del post') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                    @error('body')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                {!! Form::submit('Crear Post', ['class'=>'btn btn-success']) !!}
           {!! Form::close() !!}
       </div>
   </div>
@stop

@section('css')
   <style>
       .image_wrapper{
           position: :relative;
           padding-bottom:56.25%;

       }
       .image_wrapper img{
           position: absolute;
           object-fit: cover;
           width: 100%;
           height: 100%;
       }
   </style>

@stop


@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        $(document).ready(function(){

            $('#file').change(function(e){

            let file= e.target.files[0];

            let reader= new FileReader();

            reader.onload= (event) => {

            $('#picture').attr('src', event.target.result)

            };

            reader.readAsDataURL(file);

            })

            });
    </script>
@endsection