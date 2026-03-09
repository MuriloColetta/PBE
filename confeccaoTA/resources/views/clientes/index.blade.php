<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-900">
                Lista de Clientes
            </h2>
            <a href="{{ route('clientes.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                + Novo Cliente
            </a>
        </div>
       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                
            @if($clientes->isEmpty())
                <div class="rounded-lg bg-yellow-50 border border-yellow-200 p-6 text-center">
                    Nenhum cliente encontrado.
                </div>
            @else
                <div class="overflow-hidden rounded-xl bg-white shadow ring-1 ring-gray-200">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-left text-gray-600">
                            <tr>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">CPF</th>
                                <th class="px-4 py-3">Telefone</th>
                                <th class="px-4 py-3">Reserva</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @foreach($clientes as $c)
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-900">
                                        {{ $c->nome }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        {{ $c->cpf ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        {{ $c->telefone ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        {{ $c->reserva ? 'Sim' : 'Não' }}
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