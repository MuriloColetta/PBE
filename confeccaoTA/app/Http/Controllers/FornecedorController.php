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
}