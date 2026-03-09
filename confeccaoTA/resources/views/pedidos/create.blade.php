<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-900">
                Criar Novo Pedido
            </h2>
            <a href="{{ route('pedidos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pedidos.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="numero" class="block text-sm font-medium text-gray-700">Número</label>
                            <input type="text" name="numero" id="numero" value="{{ old('numero') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('numero')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="data" class="block text-sm font-medium text-gray-700">Data</label>
                            <input type="date" name="data" id="data" value="{{ old('data') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('data')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Selecione</option>
                                <option value="aberto" {{ old('status') == 'aberto' ? 'selected' : '' }}>Aberto</option>
                                <option value="em_producao" {{ old('status') == 'em_producao' ? 'selected' : '' }}>Em Produção</option>
                                <option value="entregue" {{ old('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                                <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="observacao" class="block text-sm font-medium text-gray-700">Observação</label>
                            <textarea name="observacao" id="observacao" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('observacao') }}</textarea>
                            @error('observacao')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Criar Pedido
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>