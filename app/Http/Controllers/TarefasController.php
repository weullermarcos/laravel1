<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{

    public function list()
    {
        //$list = DB::select("SELECT * FROM tarefas"); //buscando itens do banco - Query

        //usando eloquent para listar todas as tarefas
        $list = Tarefa::all();

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

        //insert com query
//        DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
//            'titulo' => $titulo
//        ]);

        //fazendo insert com eloquent
        $tarefa = new Tarefa();
        $tarefa->titulo = $titulo;
        $tarefa->save();

        //redireciona para a tela de listagem de tarefas
        return redirect()-> route('tarefas.list');

    }

    public function edit($id)
    {

        //select com query
//        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
//            'id' => $id
//        ]);

        //select com eloquent
        $data = Tarefa::find($id);

        //verificando se o elemento existe, caso não exista volta para a página de listagem
        if($data){
            return view('tarefas.edit', [
                'data' => $data
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

//        DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
//
//            'titulo' => $titulo,
//            'id' => $id
//
//        ]);

//        //opção 1 de atualização via eloquent
//        $tarefa = Tarefa::find($id);
//        $tarefa->titulo = $titulo;
//        $tarefa->save();

        //opção 2 para atualização de dados - necessário configurar fillable na model
        Tarefa::find($id)->update(['titulo' => $titulo]);

        return redirect()->route('tarefas.list');
    }

    public function delete($id)
    {
        //delete via query
//        DB::delete('DELETE FROM tarefas WHERE id = :id', [
//            'id' => $id
//        ]);

        //deleção via eloquent
        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');
    }

    public function done($id)
    {

        $tarefa = Tarefa::find($id);

        if($tarefa){
            $tarefa->resolvido = 1 - $tarefa->resolvido;
            $tarefa->save();
        }
        
//        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
//            'id' => $id
//        ]);

        return redirect()->route('tarefas.list');
    }

}
