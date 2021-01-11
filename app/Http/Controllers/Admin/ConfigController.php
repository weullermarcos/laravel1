<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{

    /**
     * ConfigController constructor.
     */
    public function __construct()
    {
        //configurando middleware para todas as actions desse controller
        $this->middleware('auth');
    }

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

        //recuperando o usuário logado
        $user = $request->user();
        $nome = $user->name;
        $idade = 28;

        if(Gate::allows('see-form')){

            echo "Este usuário pode ver o form";
        }
        else{
            echo "Este usuário NÃO pode ver o form";
        }

        $lista = ['farinha', 'ovo', 'leite', 'etc'];

        return view('admin.config', ['nome' => $nome,
                                     'idade'=> $idade,
                                     'lista' => $lista,
                                     'showform' => Gate::allows('see-form')]);
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
