@extends('layouts.admin')

@section('title', 'Adicionar Tarefa')

@section('conteudo')

    <h1> Editar Tarefa: </h1>

    @if(session('Alerta'))
        <x-alert>

            @slot('type')
                {{session('Alerta')}}
            @endslot

        </x-alert>
    @endif


    <form method="POST" action="">
        @csrf
        <br/>
        Titulo <input type="text" name="titulo" value="{{$data->titulo}}"> <br/>
        <input type="submit" value="Salvar">
        <br/>
    </form>

@endsection


