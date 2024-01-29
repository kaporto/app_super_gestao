<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
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

Route::get('/',[PrincipalController::class, 'principal'])->name('site.index'); 
Route::get('/sobre-nos',[SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato',[ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato',[ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::get('/teste/{p1}/{p2}',[TesteController::class, 'teste'])->name('site.teste');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    //Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    
    Route::get('/fornecedor',[FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar',[FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar',[FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}',[FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}',[FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    Route::resource('produto', ProdutoController::class);
    Route::resource('produto-detalhe', ProdutoDetalheController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('pedido', PedidoController::class);
    //Route::resource('pedido-produto', PedidoProdutoController::class);

    Route::get('pedido-produto/create/{pedido}',[PedidoProdutoController::class,'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}',[PedidoProdutoController::class,'store'])->name('pedido-produto.store');

});

Route::fallback(function(){
    echo "Esta rota nao existe";
});


/*Route::middleware(LogAcessoMiddleware::class)
    ->get('/',[PrincipalController::class,'principal'])
    ->name('site.index');
*/

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






