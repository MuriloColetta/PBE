<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::get('/estoque/create', [EstoqueController::class, 'create'])->name('estoque.create');
    Route::get('/fornecedor/create', [FornecedorController::class, 'create'])->name('fornecedor.create');
    Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

    Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque.index');
    Route::post('/estoque', [EstoqueController::class, 'store'])->name('estoque.store');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('fornecedor.index');
    Route::post('/fornecedor', [FornecedorController::class, 'store'])->name('fornecedor.store');

    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');


require __DIR__.'/auth.php';