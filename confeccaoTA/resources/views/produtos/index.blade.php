<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-900">
                Produtos
            </h2>
            <a href="{{ route('produtos.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                + Novo Produto
            </a>
        </div>
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($produtos as $p)
                        <div class="bg-white border border-gray-200 shadow-sm rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $p->nome }}</h3>
                                <div class="space-y-1 text-sm text-gray-600">
                                    <p><strong>Categoria:</strong> {{ $p->categoria ?? '-' }}</p>
                                    <p><strong>Preço:</strong> R$ {{ number_format($p->preco, 2, ',', '.') }}</p>
                                    <p><strong>Descrição:</strong> {{ Str::limit($p->descricao, 80) ?? '-' }}</p>
                                </div>
                                <div class="mt-4 flex gap-2">
                                    <a href="{{ route('produtos.edit', $p->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Editar
                                    </a>
                                    <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="abrirModal({{ $p->id }}, '{{ $p->nome }}')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" >
                                            Deletar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $produtos->links() }}
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
                Tem certeza que deseja deletar o produto 
                <strong id="nomeProduto"></strong>?
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
        let nomeProduto = document.getElementById('nomeProduto');

        form.action = "{{ url('produtos') }}/" + id;

        nomeProduto.innerText = nome;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function fecharModal(){

        let modal = document.getElementById('modalDelete');

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>