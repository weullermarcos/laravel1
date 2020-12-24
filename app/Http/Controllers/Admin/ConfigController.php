<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request)
    {

        //recupera a URl do objeto request
//        $url = $request->url();

        //recupera o metodo de requisicão utilizado
//        $method = $request->method();

        //configura quais parametros devem ser recebidos - Previne que a pessoa mande vários parametros não esperados
//        $dados = $request->only(['nome', 'idade']);

        //recuperando nome do objeto request
        //se não houver valor ele pega por padrão "weuller"
//        $nome = $request->input('nome', 'weuller');
//        echo "<br/>" . $nome;

        //verifica se o parametro idade veio preenchido
//        if($request->filled('idade')){
//            echo "<br/> Veio preenchido a idade";
//        }

        //verifica se o parametro nome não veio no objeto request
//        if($request->missing('nome')){
//
//            echo "<br/> NOME não veio";
//        }

        $nome = "Weuller";
        $idade = 28;

        return view('admin.config', ['nome' => $nome, 'idade'=> $idade]);
    }

    public function info()
    {
        echo "INFORMACAO";
    }

    public function permissoes()
    {
        echo "PERMISSAO";
    }
}
