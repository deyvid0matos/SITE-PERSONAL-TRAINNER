<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-white leading-tight uppercase font-heading tracking-tight">
            Gestão <span class="text-red-600">| Galeria de Resultados</span>
        </h2>
    </x-slot>

    <div class="py-16 bg-[#050505] min-h-[calc(100vh-65px)] relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            @if(session('success'))
                <div class="mb-8 bg-green-500/10 border border-green-500/20 text-green-500 px-6 py-4 rounded-md font-bold uppercase text-xs tracking-widest">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-[#0a0a0a] border border-white/5 p-8 rounded-xl mb-12">
                <h3 class="text-xl font-black uppercase text-white mb-6">Adicionar Novo Resultado</h3>
                <form action="{{ route('admin.results.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-2 tracking-widest">Foto do Aluno (Antes/Depois ou Shape)</label>
                            <input type="file" name="photo" required class="w-full bg-[#050505] border border-white/10 rounded-md text-sm text-gray-400 p-2 file:mr-4 file:py-1 file:px-4 file:bg-red-600 file:text-white file:border-0 file:font-bold file:uppercase hover:file:bg-red-700 transition-all cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-2 tracking-widest">Nome do Aluno</label>
                            <input type="text" name="name" required class="w-full bg-[#050505] border border-white/10 rounded-md text-white px-4 py-2 focus:border-red-600 focus:ring-0" placeholder="Ex: João Silva">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-2 tracking-widest">Link do Instagram (Opcional)</label>
                            <input type="url" name="instagram_url" class="w-full bg-[#050505] border border-white/10 rounded-md text-white px-4 py-2 focus:border-red-600 focus:ring-0" placeholder="https://instagram.com/usuario">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase text-gray-500 mb-2 tracking-widest">Descrição / Depoimento Curto</label>
                        <textarea name="description" required rows="3" class="w-full bg-[#050505] border border-white/10 rounded-md text-white px-4 py-2 focus:border-red-600 focus:ring-0 resize-none" placeholder="Evolução de 90 dias..."></textarea>
                    </div>
                    <button type="submit" class="px-8 py-3 bg-red-600 text-white font-black uppercase text-xs tracking-widest rounded hover:bg-red-700 transition-all">Salvar Resultado</button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($results as $result)
                <div class="bg-[#0a0a0a] border border-white/5 rounded-lg overflow-hidden flex flex-col">
                    <div class="h-48 w-full">
                        <img src="{{ asset($result->image_url) }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <p class="text-white font-bold uppercase mb-1">{{ $result->name }}</p>
                        <p class="text-gray-400 text-sm mb-4 italic flex-grow">"{{ $result->description }}"</p>
                        
                        <form action="{{ route('admin.results.destroy', $result) }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full py-2 bg-red-600/10 text-red-500 font-bold uppercase text-xs tracking-widest rounded hover:bg-red-600 hover:text-white transition-all">Excluir</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>