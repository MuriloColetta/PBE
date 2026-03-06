<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

            @if($produtos->isEmpty())
                <div class="rounded-lg bg-yellow-50 border p-6 text-center">
                    Nenhum produto encontrado.
                </div>
            @else
                <div class="bg-white rounded-xl shadow ring-1 ring-gray-200 overflow-hidden">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-left">
                            <tr>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">Descrição</th>
                                <th class="px-4 py-3">Categoria</th>
                                <th class="px-4 py-3">Preço</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($produtos as $p)
                                <tr>
                                    <td class="px-4 py-3 font-semibold">{{ $p->nome }}</td>
                                    <td class="px-4 py-3">{{ Str::limit($p->descricao, 50) ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $p->categoria ?? '-' }}</td>
                                    <td class="px-4 py-3">
                                        {{ number_format($p->preco, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>