@extends('layouts.admin')

@section('title', 'Cadastro')

@section('conteudo')

    @if($errors->any())

        <x-alert>

            @slot('type')
                @foreach($errors->all() as $error)
                    {{$error}} <br/>
                @endforeach
            @endslot
        </x-alert>

    @endif


    <form method="POST">

        @csrf

        <br/><br/>
        <input type="text" name="name" placeholder="Digite o nome" value="{{old('name')}}">
        <br/><br/>
        <input type="text" name="email" placeholder="Digite o e-mail" value="{{old('email')}}">
        <br/><br/>
        <input type="password" name="password" placeholder="Digite a senha">
        <br/><br/>
        <input type="password" name="password_confirmation" placeholder="Confirme sua senha">
        <br/><br/>
        <input type="submit" value="Cadastrar">

    </form>

@endsection
