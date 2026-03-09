<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::latest()->paginate(12);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero' => ['required','string','max:50','unique:pedidos,numero'],
            'data' => ['nullable','date'],
            'status' => ['required','in:aberto,em_producao,entregue,cancelado'],
            'observacao' => ['nullable','string'],
        ]);

        Pedido::create($data);

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado!');
    }
}