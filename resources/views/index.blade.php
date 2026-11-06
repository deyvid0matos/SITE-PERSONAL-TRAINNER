<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerenciar Planos de Consultoria
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.plans.create') }}" class="bg-blue-500 text-white p-2 rounded">Novo Plano</a>
            </div>
    </div>
</x-app-layout>