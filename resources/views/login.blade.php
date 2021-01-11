@extends('layouts.admin')

@section('title', 'Login')

@section('conteudo')

    @if(session('warning'))
        {{session('warning')}}
    @endif


    <form method="POST">

        @csrf

        <br/><br/>
        <input type="text" name="email" placeholder="digite o e-mail">
        <br/><br/>
        <input type="password" name="password" placeholder="digite a senha">
        <br/><br/>
        <input type="submit" value="login">

    </form>

@endsection
