@extends('layouts.master')

@section('titulo', 'Detalles')

@section('content')
<center><br><div class="formulario">

            <h1>Nombre: {{$link->name}} </h1><br>
            <p>Url: {{$link->url}} </p><br>
            <a href="{{route('links.edit',$link)}}">Editar</a>
            <form action="{{route('links.destroy',$link)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar Post</button>
            </form>
            <a href="{{route('links.index')}}">Volver a links</a>

            </div></center>
@stop
