<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{

    public function list()
    {
        $list = DB::select("SELECT * FROM tarefas"); //buscando itens do banco
        return view('tarefas.list', [

            'list' => $list

        ]);
    }

    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {

        //criando validações para os parametros do formulario
        $request->validate([

            'titulo' => ['required', 'string'] //validações para o campo titulo (obrigatorio e se é uma string)

        ]);

        //recuperando o título
        $titulo = $request->input('titulo');

        DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
            'titulo' => $titulo
        ]);

        //redireciona para a tela de listagem de tarefas
        return redirect()-> route('tarefas.list');

    }

    public function edit($id)
    {

        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        //verificando se o id existe, caso não exista volta para a página de listagem
        if(count($data) > 0){
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);
        }
        else{

            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id)
    {

        //criando validações para os parametros do formulario
        $request->validate([

            'titulo' => ['required', 'string'] //validações para o campo titulo (obrigatorio e se é uma string)

        ]);

        //recuperando o titulo passado como parametro
        $titulo = $request->input('titulo');

        DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [

            'titulo' => $titulo,
            'id' => $id

        ]);

        return redirect()->route('tarefas.list');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }

    public function done($id)
    {

        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }

}
