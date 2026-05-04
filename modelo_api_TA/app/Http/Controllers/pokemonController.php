<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index(Request $request  ) {
        $busca = $request->input('pokemon') ?? rand(1, 151);
        $nomeOuId = strtolower($busca);

        // API
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$nomeOuId}");

        if ($response->successful()) {
            $pokemon = $response->json();
            return view('pokemon', compact('pokemon'));
        }

        // Banco
        $pokemonLocal = Pokemon::where('nome', $nomeOuId)
            ->orWhere('dados->id', $nomeOuId)
            ->first();

        if ($pokemonLocal) {
            return view('pokemon', [
                'pokemon' => $pokemonLocal->dados
            ]);
        }

        return back()->with('Erro', 'Pokémon não encontrado. Tente novamente!');
    }
}