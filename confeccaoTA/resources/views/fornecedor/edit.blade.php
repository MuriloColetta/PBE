<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-900">
                Editar Fornecedor
            </h2>
            <a href="{{ route('fornecedor.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('fornecedor.update', $fornecedor->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" name="nome" id="nome" value="{{ old('nome', $fornecedor->nome) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('nome')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj', $fornecedor->cnpj) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('cnpj')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                            <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $fornecedor->telefone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('telefone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $fornecedor->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Atualizar Fornecedor
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
