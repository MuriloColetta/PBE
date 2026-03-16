<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-900">
                Lista de Fornecedores
            </h2>
            <a href="{{ route('fornecedor.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                + Novo Fornecedor
            </a>
        </div>
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($fornecedor as $f)
                        <div class="bg-white border border-gray-200 shadow-sm rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $f->nome }}</h3>
                                <div class="space-y-1 text-sm text-gray-600">
                                    <p><strong>CNPJ:</strong> {{ $f->cnpj ?? '-' }}</p>
                                    <p><strong>Telefone:</strong> {{ $f->telefone ?? '-' }}</p>
                                    <p><strong>E-mail:</strong> {{ $f->email ?? '-' }}</p>
                                </div>
                                <div class="mt-4 flex gap-2">
                                    <a href="{{ route('fornecedor.edit', $f->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Editar
                                    </a>
                                    <form action="{{ route('fornecedor.destroy', $f->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="abrirModal({{ $f->id }}, '{{ $f->nome }}')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Deletar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $fornecedor->links() }}
                </div>
            @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <div id="modalDelete" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">
                Confirmar exclusão
            </h2>
            <p class="text-sm text-gray-600 mb-6">
                Tem certeza que deseja remover o fornecedor 
                <strong id="nomeFornecedor"></strong>?
            </p>
            <div class="flex justify-end space-x-3">
                <button onclick="fecharModal()" 
                    class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">
                    Cancelar
                </button>
                <form id="formDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Deletar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function abrirModal(id, nome){

        let modal = document.getElementById('modalDelete');
        let form = document.getElementById('formDelete');
        let nomeFornecedor = document.getElementById('nomeFornecedor');

        form.action = "{{ url('fornecedor') }}/" + id;

        nomeFornecedor.innerText = nome;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function fecharModal(){

        let modal = document.getElementById('modalDelete');

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>