<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900">
            Estoque
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

            @if($itens->isEmpty())
                <div class="rounded-lg bg-yellow-50 border p-6 text-center">
                    Nenhum item no estoque.
                </div>
            @else
                <div class="bg-white rounded-xl shadow ring-1 ring-gray-200 overflow-hidden">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-left">
                            <tr>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">SKU</th>
                                <th class="px-4 py-3">Quantidade</th>
                                <th class="px-4 py-3">Preço</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($itens as $i)
                                <tr>
                                    <td class="px-4 py-3 font-semibold">{{ $i->nome }}</td>
                                    <td class="px-4 py-3">{{ $i->sku ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $i->quantidade }}</td>
                                    <td class="px-4 py-3">
                                        {{ number_format($i->preco, 2, ',', '.') }}
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