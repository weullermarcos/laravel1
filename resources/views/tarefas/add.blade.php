@extends('layouts.admin')

@section('title', 'Adicionar Tarefa')

@section('conteudo')

    <h1> Adicionar Tarefa: </h1>

    @if(session('Alerta'))
        <x-alert>

            @slot('type')
                {{session('Alerta')}}
            @endslot

        </x-alert>
    @endif


    <form method="POST" action="">
        @csrf
        Titulo <input type="text" name="titulo"> <br/>
        <input type="submit" value="Enviar">
    </form>

@endsection


