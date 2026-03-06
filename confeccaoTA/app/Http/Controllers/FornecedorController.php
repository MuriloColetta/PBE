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
}