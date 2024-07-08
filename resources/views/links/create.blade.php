@extends('layouts.master')

@section('titulo', 'Crear link')

@section('content')
    <h1>Nuevo link</h1>


    <div id="frm1">

        <form class="formulario1" action="{{route('links.store')}}" method="post">
            @csrf
            <input type="hidden" class="boton" name="iduser" value="{{ Auth::id() }}" id=""><br>
            <label>
                Nombre:<br>
                <input type="text" class="boton" name="name" value="{{old('name')}}" id=""><br>
            </label>
            <br>
            <label>
                URL:<br>
                <input type="url" class="boton" name="url" value="{{old('url')}}" id=""><br>
            </label>
            <br>
            <label>
                Categoria:<br>
                <input type="text" class="boton" name="category" value="{{old('category')}}" id=""><br>
            </label>
            <br>
            <button class="boton" type="submit">Crear link</button>
        </form>
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
