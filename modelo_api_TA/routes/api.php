<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


Route::get('/', function () {
    return response()->json([
        'mensagem' => 'API OK'
    ]);
});

Route::post('/pokemon/novo', function (Request $request) {
    $dados = $request->validate([
        'nome' => 'required|string|min:3',
        'tipo' => 'required|string',
        'ataque' => 'required|integer'
    ]);

    return response()->json([
            'mensagem' => 'Pokemon cadastrado com sucesso!',
            'id_gerado' => rand(1000,9999),
            'dados_recebidos' => $dados
        ], 201
    );
});

Route::post('/usuario/novo', function (Request $request) {

    $dados = $request->validate([
        'nome' => 'required|string|min:3',
        'sobrenome' => 'required|string|min:3',
        'email' => 'required|email',
    ]);

    return response()->json([
        'mensagem' => 'Funcionou!',
        'dados' => $dados
    ]);
});