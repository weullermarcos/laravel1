@extends('layouts.admin')

@section('title', 'Adicionar Tarefa')

@section('conteudo')

    <h1> Editar Tarefa: </h1>

    @if($errors->any())

        <x-alert>

            @slot('type')
                @foreach($errors->all() as $error)
                    {{$error}} <br/>
                @endforeach
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


