<x-app-layout>
    <style>
        .dashboard-wrapper { background-color: #050505; min-height: calc(100vh - 65px); }
        .glass-panel { background: #0a0a0a; border: 1px solid rgba(255, 255, 255, 0.05); }
        .dark-input { background-color: #050505 !important; border: 1px solid rgba(255,255,255,0.1) !important; color: white !important; }
        .dark-input:focus { border-color: #ef4444 !important; box-shadow: 0 0 0 1px #ef4444 !important; }
    </style>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-xl text-white uppercase tracking-widest leading-tight">
                Gestão do <span class="text-red-600">Arsenal</span>
            </h2>
            <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 text-xs font-bold uppercase tracking-widest">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12 dashboard-wrapper relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">
            
            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/20 text-green-500 px-6 py-4 rounded-md font-bold uppercase text-xs tracking-widest mb-6 flex items-center gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
                </div>
            @endif

            <div class="glass-panel p-8 rounded-xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-red-600"></div>
                <h3 class="text-2xl font-black uppercase mb-8 text-white flex items-center gap-3">
                    <i data-lucide="plus-circle" class="text-red-600"></i> Adicionar Item
                </h3>
                
                <form action="{{ route('admin.services.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2 tracking-widest">Título do Serviço</label>
                        <input type="text" name="title" class="dark-input rounded-md shadow-sm w-full transition-colors" required placeholder="Ex: Treino Personalizado">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2 tracking-widest">Nome do Ícone (Lucide)</label>
                        <input type="text" name="icon" class="dark-input rounded-md shadow-sm w-full transition-colors" required placeholder="Ex: dumbbell, zap, target">
                        <p class="text-[10px] text-gray-600 mt-1 uppercase tracking-widest">Veja opções em lucide.dev</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2 tracking-widest">Descrição</label>
                        <textarea name="description" rows="3" class="dark-input rounded-md shadow-sm w-full transition-colors" required placeholder="Detalhes da metodologia..."></textarea>
                    </div>
                    
                    <button type="submit" class="bg-red-600 text-white font-black px-8 py-4 uppercase tracking-widest hover:bg-red-700 transition-all rounded-md md:w-max mt-4 text-sm">
                        Adicionar ao Arsenal
                    </button>
                </form>
            </div>

            <div class="glass-panel rounded-xl overflow-hidden">
                <div class="p-6 border-b border-white/5 bg-[#0a0a0a]">
                    <h3 class="text-xl font-black uppercase text-white tracking-widest">Arsenal Atual</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-white/5 bg-[#050505] text-gray-500 text-xs uppercase tracking-widest">
                                <th class="py-4 px-6 font-bold w-20">Ícone</th>
                                <th class="py-4 px-6 font-bold">Título</th>
                                <th class="py-4 px-6 font-bold hidden md:table-cell">Descrição</th>
                                <th class="py-4 px-6 text-right font-bold">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-300 text-sm">
                            @foreach($services as $service)
                            <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="w-10 h-10 bg-red-600/10 rounded-md flex items-center justify-center border border-red-600/20 text-red-500">
                                        <i data-lucide="{{ $service->icon }}" class="w-5 h-5"></i>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-bold uppercase tracking-wider text-white">{{ $service->title }}</td>
                                <td class="py-4 px-6 text-gray-500 hidden md:table-cell">{{ Str::limit($service->description, 50) }}</td>
                                <td class="py-4 px-6 text-right">
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Remover este item?')">
                                        @csrf @method('DELETE')
                                        <button class="text-gray-500 hover:text-red-600 font-bold uppercase tracking-widest text-[10px] transition-colors p-2 bg-[#050505] rounded border border-white/5 hover:border-red-600">Remover</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>lucide.createIcons();</script>
</x-app-layout>