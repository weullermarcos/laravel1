
@extends('layouts.admin')

@section('title', 'configurações')

@section('conteudo')

{{--    @component('components.alert')--}}
{{--        @slot('type')--}}
{{--            Alerta--}}
{{--        @endslot--}}

{{--        Testando 123...--}}
{{--    @endcomponent--}}

    <x-alert>

        @slot('type')
            Alerta
        @endslot

        Conteúdo
    </x-alert>

    <h1> CONFIG </h1>

    <a href="/logout">Desconectar</a>

    <p>Meu nome é {{$nome}}</p>
    <p>Minha idade é {{$idade}}</p>

    @if($idade > 20)
        eu tenho mais do que 20 anos
    @else
        eu não tenho mais do que 20 anos
    @endif

    <form method="POST">
        @csrf
        <br/> Nome: <input type="text" name="nome">
        <br/> Idade: <input type="text" name="idade">
        <br/> Nome: <input type="submit" value="Enviar">
    </form>


    <a href="/config/info"> Informações </a>

    @isset($versao)
        <p>{{$nomeProjeto}} - Versão: {{$versao}}</p>
    @endisset

    @empty($nomeProjeto)
        está vazio
    @endempty

    @for($i=0; $i<10; $i++)

        {{$i}} <br/>

    @endfor

    Lista do Bolo:
    <ul>
        @foreach($lista as $item)
            <li>Item do bolo: {{$item}}</li>
        @endforeach
    </ul>

@endsection
