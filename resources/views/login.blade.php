@extends('layouts.admin')

@section('title', 'Login')

@section('conteudo')

    @if(session('warning'))
        {{session('warning')}}
    @endif


    <form method="POST">

        @csrf

        <input type="text" placeholder="digite o e-mail">
        <br/>
        <input type="password" placeholder="digite a senha">
        <br/>
        <input type="submit" value="login">

    </form>

@endsection
