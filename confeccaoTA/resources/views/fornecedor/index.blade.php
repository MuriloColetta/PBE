<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900">
            Lista de Fornecedores
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

            @if($fornecedor->isEmpty())
                <div class="rounded-lg bg-yellow-50 border p-6 text-center">
                    Nenhum fornecedor encontrado.
                </div>
            @else
                <div class="bg-white rounded-xl shadow ring-1 ring-gray-200 overflow-hidden">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-left">
                            <tr>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">CNPJ</th>
                                <th class="px-4 py-3">Telefone</th>
                                <th class="px-4 py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($fornecedor as $f)
                                <tr>
                                    <td class="px-4 py-3 font-semibold">{{ $f->nome }}</td>
                                    <td class="px-4 py-3">{{ $f->cnpj ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $f->telefone ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $f->email ?? '-' }}</td>
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