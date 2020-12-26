@extends('layouts.admin')

@section('title', 'Listar Tarefas')

@section('conteudo')

    <h1> Listar Tarefas: </h1>

    <a href="{{route('tarefas.add')}}"> Adicionar nova tarefa</a>

    @if(count($list) > 0)

        <ul>
            @foreach($list as $item)

                <li>
                    <a href="{{route('tarefas.done', ['id'=> $item->id])}}">
                        @if($item->resolvido)
                            Desmarcar
                        @else
                            Marcar
                        @endif
                    </a>
                    {{$item->titulo}}

                    <a href="{{route('tarefas.edit', ['id' => $item->id])}}"> [Editar] </a>
                    <a href="{{route('tarefas.delete', ['id'=> $item->id])}}" onclick="return confirm('deseja realmente excluir?')"> [Excluir] </a>

                </li>

            @endforeach
        </ul>

    @else
        Não há itens a serem listados
    @endif

@endsection


