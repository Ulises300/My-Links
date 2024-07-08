@extends('layouts.master')

@section('titulo', 'Editar link')

@section('content')
    <h1>Editar link</h1>
    <div id="frm1">
        <center> 
        <form class="formulario1" action="{{route('links.update',$link)}}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" class="boton" name="iduser" value="1" id="">
            <label>
                Nombre:<br>
                <input type="text" class="boton" name="name" value="{{old('name',$link->name)}}" id="">
            </label>
            <br>
            <label>
                URL:<br>
                <input type="url" class="boton" name="url" value="{{old('url',$link->url)}}" id="">
            </label>
            <br>
            <label>
                Categoria:<br>
                <input type="text" class="boton" name="category" value="{{old('category',$link->category)}}" id="">
            </label>
            <br>
            <button type="submit">Actualizar link</button>
        </form>
        </center>
    </div>
    @if ($errors->any())
    <div>
        <h2>Error</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@stop
