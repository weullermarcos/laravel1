<?php


use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

//rotas para registro
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//Forma de reescrever a função acima
//Route::view('/', [HomeController::class, '']);

//criando uma rota de redirecionamento de '/' para '/teste'
//Route::redirect('/', '/teste');

//Route::get('/teste', function (){
//
//    //echo "Testando o meu teste"; //fazendo um echo dentro da função
//    return view('teste');//retornando minha view
//
//});

//essa definição de rota se comporta como a rota/função acima - é uma forma resumida de se fazer
Route::view('/teste', 'teste');

//criando uma url dinaminca
Route::get('/noticia/{slug}', function ($slug){

    echo "Olha ei aqui - " . $slug;
});

Route::get('/noticia/{slug}/comentario/{id}', function ($slug, $id){

    echo "Mostrando o comentário " . $id . " da noticia " . $slug;

});

Route::get('/user/{name}', function ($name){
    echo "NOME do usuário - ". $name;
})->where('name', '[a-z]+');

Route::get('/user/{id}', function ($id){
    echo "ID do usuário - ". $id;
})->where('id', '[0-9]+');

//agrupando rotas
Route::prefix('/config')->group(function(){

    //criando rotas e atribuindo responsabilidades aos métodos dos Controllers
    Route::get('/', [ConfigController::class, 'index'])->name('config.index');

    //criando uma rota post
    Route::post('/', [ConfigController::class, 'index']);

    Route::get('/info', [ConfigController::class, 'info']);

    Route::get('/permissoes', [ConfigController::class, 'permissoes']);

//    Route::get('/', function (){
//
//        return view('config'); //retorna a view config.blade.php
//    });
//
//    Route::get('info', function (){
//        echo "INFORMACOES";
//    })->name('info');
//
//    Route::get('permissoes', function (){
//        echo "PERMISSOES";
//    })->name('permissoes');

});

//configurando uma rota de fallback - rota para o caso da página não existir ou não ser encontrada
Route::fallback(function (){

    return view('404');
});

//criando agrupamento de rotas para tarefas
Route::prefix('/tarefas')->group(function (){

    Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list'); //listagem de tarefas

    Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add'); //tela de adição
    Route::post('add', [TarefasController::class, 'addAction']); //Ação de adição

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit'); //tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']); //Ação de edição

    Route::get('delete/{id}', [TarefasController::class, 'delete'])->name('tarefas.delete'); //Ação de deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done'); //marcar/desmarcar como resolvido

});

//Cria todas as rotas padões em uma única linha
Route::resource('todo', TarefasController::class);


//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
