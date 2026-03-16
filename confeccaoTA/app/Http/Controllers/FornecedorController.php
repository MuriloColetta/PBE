<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedor = Fornecedor::latest()->paginate(12);
        return view('fornecedor.index', compact('fornecedor'));
    }

    public function create()
    {
        return view('fornecedor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required','string','max:255'],
            'cnpj' => ['nullable','string','max:20'],
            'telefone' => ['nullable','string','max:20'],
            'email' => ['nullable','email','max:255'],
        ]);

        Fornecedor::create($data);

        return redirect()->route('fornecedor.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor.edit', compact('fornecedor'));
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $data = $request->validate([
            'nome' => ['required','string','max:255'],
            'cnpj' => ['nullable','string','max:20'],
            'telefone' => ['nullable','string','max:20'],
            'email' => ['nullable','email','max:255'],
        ]);

        $fornecedor->update($data);

        return redirect()->route('fornecedor.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()->route('fornecedor.index')->with('error', value: 'Fornecedor deletado com sucesso!');
    }
}
