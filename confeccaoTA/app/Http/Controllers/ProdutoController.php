<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::latest()->paginate(12);
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'       => ['required','string','max:255'],
            'descricao'  => ['nullable','string'],
            'preco'      => ['nullable','numeric','min:0'],
            'categoria'  => ['nullable','string','max:100'],
        ]);

        Produto::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $data = $request->validate([
            'nome'       => ['required','string','max:255'],
            'descricao'  => ['nullable','string'],
            'preco'      => ['nullable','numeric','min:0'],
            'categoria'  => ['nullable','string','max:100'],
        ]);

        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido!');
    }
}