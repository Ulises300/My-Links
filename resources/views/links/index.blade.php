@extends('layouts.master')

@section('titulo', 'inicio')

@section('content')
    {{-- <a href=" {{route('links.create')}} ">Nuevo Link</a> --}}
    <div id="frm1">
        <a href="{{route('links.create')}}">Agregar link</a><br>
        
    </div><br>'
    <center>
        <div id="listado-items">
            @foreach ($links as $link)
                <a href="{{$link->url}}" >

                    <div class="renglon-datos">
                        <p>{{$link->name}}</p>
                        <div class="opciones"><a href="{{route('links.show',$link)}}">☰</a></div>
                    </div>
                </a>
            @endforeach
        </div>
    </center>

    {{$links->Links()}}
@stop
