<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-2xl text-center w-80">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 uppercase">{{ $pokemon['name'] }}</h1>
        @php
            $regiao = match(true) {
                $pokemon['id'] <= 151 => 'Kanto',
                $pokemon['id'] <= 251 => 'Johto',
                $pokemon['id'] <= 386 => 'Hoenn',
                $pokemon['id'] <= 493 => 'Sinnoh',
                $pokemon['id'] <= 649 => 'Unova',
                $pokemon['id'] <= 721 => 'Kalos',
                $pokemon['id'] <= 809 => 'Alola',
                $pokemon['id'] <= 905 => 'Galar',
                default => 'Paldea'
            };
        @endphp
        <p class="text-gray-600 text-sm mb-4 font-bold">#{{ str_pad($pokemon['id'], 3, '0', STR_PAD_LEFT) }} - {{ $regiao }}</p>

        <form method="GET" action="{{ url('/pokedex') }}" class="mb-4">
            <div class="flex gap-2">
                <input
                    type="text"
                    name="pokemon"
                    value="{{ request('pokemon') }}"
                    placeholder="Buscar Pokémon"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Buscar
                </button>
            </div>
        </form>

        <div class="bg-blue-50 rounded-full p-4 mb-4">
            <img src="{{ $pokemon['sprites']['other']['official-artwork']['front_default'] }}"
                alt="{{ $pokemon['name'] }}" class="w-full h-auto">
        </div>
        <div class="flex justify-center gap-2 mb-4">
            @foreach ($pokemon['types'] as $tipo)
            <span class="px-3 py-1 bg-yellow-400 text-xs font-bold rounded-full uppercase">
                {{ $tipo['type']['name'] }}
            </span>
            @endforeach
        </div>
        <p class="text-gray-500 text-sm">
            Altura: {{ $pokemon['height']/10 }}m | Peso: {{ $pokemon['weight']/10 }}kg
        </p>

        <div class="mt-4 p-3 bg-gray-50 rounded-lg">
            <h3 class="text-sm font-bold text-gray-700 mb-2">Status Base</h3>
            <div class="grid grid-cols-2 gap-2 text-xs">
                @foreach ($pokemon['stats'] as $stat)
                <div class="flex justify-between">
                    <span class="text-gray-600">{{ ucfirst(str_replace('-', ' ', $stat['stat']['name'])) }}:</span>
                    <span class="font-bold">{{ $stat['base_stat'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
        <button
            onclick="window.location.reload()"
            class="mt-6 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Buscar próximo
        </button>
    </div>
</body>
</html>