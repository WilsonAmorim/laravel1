<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\TarefasController;
Route::get('/', HomeController::class);
Route::view('/teste', 'teste');

Route::prefix('/tarefas')->group(function(){
    Route::get('/',[TarefasController::class, 'list'])->name('tarefas.list'); // liatagem de tarefas

    Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add'); // Tela de adição
    Route::post('add', [TarefasController::class, 'addAction']); // açao de adição

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit'); // Tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']); // açao de edição

    Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del'); // Tela de adição

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done'); // Tela de resolvido/não
    

});
// grupo de rotas
    Route::prefix('/config')->group(function(){

        Route::get('/', [ConfigController::class, 'index']);
        Route::post('/', [ConfigController::class, 'index']);
        Route::get('/info', [ConfigController::class, 'info']);
        Route::get('/permissoes', [ConfigController::class, 'permissoes']);
    });

Route::fallback(function(){
    return view('404');
});


//redirecionamento automatico
//Route::redirect('/', 'teste');
/*Route::get('/noticia/{slug}', function ($slug){
    echo 'Titulo:'.$slug;
});
//rotas com parametros
Route::get('/noticia/{slug}/comentario/{id}', function ($slug,$id){
    echo "Mostrando o comentário" .$id." da noticia ".$slug;
});

Route::get('/user/{name}', function ($name){
    echo "Mostrando o Usuário de Nome: ".$name;
})->where('name','[a-z]+');

Route::get('/user/{id}', function ($id){
    echo "Mostrando o Usuário de ID: ".$id;
});*/


