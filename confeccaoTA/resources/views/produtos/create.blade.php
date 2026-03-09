<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-900">
                Criar Novo Produto
            </h2>
            <a href="{{ route('produtos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('produtos.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('nome')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                            <textarea name="descricao" id="descricao" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="preco" class="block text-sm font-medium text-gray-700">Preço</label>
                            <input type="number" step="0.01" name="preco" id="preco" value="{{ old('preco') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('preco')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <input type="text" name="categoria" id="categoria" value="{{ old('categoria') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('categoria')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Criar Produto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>