@extends('layouts.admin')

@section('title', 'Adicionar Tarefa')

@section('conteudo')

    <h1> Adicionar Tarefa: </h1>

    @if($errors->any())

        <x-alert>

            @slot('type')
                @foreach($errors->all() as $error)
                        {{$error}} <br/>
                @endforeach
            @endslot
        </x-alert>

    @endif

    <br/><br/>
    <form method="POST" action="">
        @csrf
        Titulo <input type="text" name="titulo"> <br/><br/>
        <input type="submit" value="Enviar">
    </form>

@endsection


