@extends('layouts.admin')

@section('title', 'Login')

@section('conteudo')

    @if(session('warning'))
        {{session('warning')}}
    @endif

    @lang('messages.test')

    <form method="POST">

        @csrf

        <br/><br/>
        <input type="text" name="email" placeholder="digite o e-mail">
        <br/><br/>
        <input type="password" name="password" placeholder="digite a senha">
        <br/><br/>

        @if($tries >= 3)
            <p> @lang('messages.tryerror', ['count' => 3]) </p>
        @else
            <input type="submit" value="login">
        @endif

    </form>

    <p> Tentativas de login: {{$tries}}</p>

@endsection
