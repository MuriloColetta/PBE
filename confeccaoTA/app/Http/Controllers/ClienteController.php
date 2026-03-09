<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all(); // Busca todos os clientes
        return view('clientes.index', compact('clientes'));
    }

    public function create() {
        return view('clientes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes',
            'telefone' => 'required|string',
            'reserva' => 'nullable|string',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }
}