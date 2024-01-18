<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato',[\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato',[\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function () {
        return "Clientes";
    })->name('app.clientes');
    Route::get('/fornecedores',[\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function () {
        return "Produtos";
    })->name('app.produtos');

});

Route::fallback(function(){
    echo "Esta rota nao existe";
});


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre-nos', function () {
    return "Sobre nos";
});

Route::get('/contato', function () {
    return "Contato";
});
*/

/*
Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
function(
    string $nome = 'Desconhecido',
    string $categoria = 'Informacao',
    string $assunto = 'Contato',
    string $mensagem = 'Mensagem nao informada'

){
    echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
});
*/

/*
Route::get('/contato/{nome}/{categoria_id}', 
function(
    string $nome = 'Desconhecido',
    int $categoria_id = 1    

){
    echo "Estamos aqui: $nome - $categoria_id";
})->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
*/






