<x-app-layout>
    @php
        // Busca as configurações reais no banco de dados para preencher os campos
        $popupActive = \App\Models\SiteSetting::where('key', 'popup_active')->first()?->value == '1';
        $popupTitle = \App\Models\SiteSetting::where('key', 'popup_title')->first()?->value ?? 'Mentoria Black';
        $popupText = \App\Models\SiteSetting::where('key', 'popup_text')->first()?->value ?? 'As vagas para o acompanhamento de alta performance foram abertas.';
    @endphp

    <style>
        .dashboard-wrapper { background-color: #050505; min-height: calc(100vh - 65px); }
        .glass-card { background: #0a0a0a; border: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.3s ease; }
        .glass-card:hover { border-color: #ef4444; box-shadow: 0 10px 40px -10px rgba(239, 68, 68, 0.15); transform: translateY(-5px); }
        
        /* Estilização customizada para o Switch do Popup */
        .peer:checked ~ .peer-checked-bg { background-color: #ef4444; }

        /* Estilo para os inputs de texto no padrão dark do painel */
        .dark-field { background: #050505 !important; border: 1px solid rgba(255,255,255,0.1) !important; color: white !important; }
        .dark-field:focus { border-color: #ef4444 !important; outline: none; box-shadow: 0 0 0 1px #ef4444; }
    </style>

    <script src="https://unpkg.com/lucide@latest"></script>

    <x-slot name="header">
        <h2 class="font-black text-xl text-white leading-tight uppercase font-heading tracking-tight">
            Painel de Controle <span class="text-red-600">| TIAGO SILVA</span>
        </h2>
    </x-slot>

    <div class="py-16 dashboard-wrapper relative overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none opacity-[0.03]" style="background-image: radial-gradient(white 1px, transparent 1px); background-size: 30px 30px;"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            @if(session('success'))
                <div class="mb-8 bg-green-500/10 border border-green-500/20 text-green-500 px-6 py-4 rounded-md font-bold uppercase text-xs tracking-widest flex items-center gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-12">
                <h3 class="text-3xl font-black uppercase text-white tracking-tighter mb-2 font-heading">
                    Bem-vindo, {{ Auth::user()->name }}
                </h3>
                <p class="text-gray-500 uppercase tracking-widest text-xs font-bold">
                    O que vamos atualizar hoje?
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <a href="{{ route('admin.plans.index') }}" class="glass-card p-10 rounded-xl border-b-4 border-b-red-600 group flex flex-col relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-white/5 group-hover:text-red-600/10 transition-colors duration-500">
                        <i data-lucide="dumbbell" class="w-32 h-32"></i>
                    </div>
                    <i data-lucide="layout-list" class="w-10 h-10 text-gray-400 group-hover:text-red-500 transition-colors mb-6 relative z-10"></i>
                    <h3 class="text-white font-black text-3xl uppercase tracking-tighter font-heading relative z-10">Planos</h3>
                    <p class="text-gray-400 text-sm mt-3 relative z-10">Gerencie preços e links de checkout.</p>
                </a>

                <a href="{{ route('admin.services.index') }}" class="glass-card p-10 rounded-xl border-b-4 border-b-red-600 group flex flex-col relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-white/5 group-hover:text-red-600/10 transition-colors duration-500">
                        <i data-lucide="target" class="w-32 h-32"></i>
                    </div>
                    <i data-lucide="zap" class="w-10 h-10 text-gray-400 group-hover:text-red-500 transition-colors mb-6 relative z-10"></i>
                    <h3 class="text-white font-black text-3xl uppercase tracking-tighter font-heading relative z-10">Serviços</h3>
                    <p class="text-gray-400 text-sm mt-3 relative z-10">Edite os itens do seu arsenal.</p>
                </a>

                <a href="{{ route('admin.testimonials.index') }}" class="glass-card p-10 rounded-xl border-b-4 border-b-red-600 group flex flex-col relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-white/5 group-hover:text-red-600/10 transition-colors duration-500">
                        <i data-lucide="message-square-quote" class="w-32 h-32"></i>
                    </div>
                    <i data-lucide="users" class="w-10 h-10 text-gray-400 group-hover:text-red-500 transition-colors mb-6 relative z-10"></i>
                    <h3 class="text-white font-black text-3xl uppercase tracking-tighter font-heading relative z-10">Depoimentos</h3>
                    <p class="text-gray-400 text-sm mt-3 relative z-10">Adicione provas sociais e resultados.</p>
                </a>

                <a href="{{ route('admin.results.index') }}" class="glass-card p-10 rounded-xl border-b-4 border-b-red-600 group flex flex-col relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-white/5 group-hover:text-red-600/10 transition-colors duration-500">
                        <i data-lucide="camera" class="w-32 h-32"></i>
                    </div>
                    <i data-lucide="image" class="w-10 h-10 text-gray-400 group-hover:text-red-500 transition-colors mb-6 relative z-10"></i>
                    <h3 class="text-white font-black text-3xl uppercase tracking-tighter font-heading relative z-10">Galeria</h3>
                    <p class="text-gray-400 text-sm mt-3 relative z-10">Fotos e Instagram dos alunos.</p>
                </a>

            </div>

            <div class="mt-12 glass-card p-8 rounded-xl border-l-4 border-l-red-600 relative overflow-hidden">
                <div class="absolute right-[-10px] top-[-10px] opacity-5">
                    <i data-lucide="megaphone" class="w-32 h-32 text-white"></i>
                </div>

                <h3 class="text-2xl font-black uppercase text-white mb-6 font-heading flex items-center gap-3 relative z-10">
                    <i data-lucide="monitor-play" class="text-red-600"></i> Configuração do Popup de Aviso
                </h3>

                <form action="{{ route('admin.settings.update-popup') }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex items-center gap-4 bg-[#050505] p-5 rounded-lg border border-white/5">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer" {{ $popupActive ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                            </label>
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Exibir Popup no Site</span>
                        </div>

                        <div class="bg-[#050505] p-5 rounded-lg border border-white/5">
                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-2 tracking-widest">Trocar Foto da Oferta (PNG/JPG)</label>
                            <input type="file" name="popup_image" class="w-full text-xs text-gray-400 file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-red-600 file:text-white hover:file:bg-red-700 transition-all cursor-pointer">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-2 tracking-widest">Título do Popup</label>
                            <input type="text" name="popup_title" value="{{ $popupTitle }}" class="dark-field w-full rounded p-3 text-sm" placeholder="Ex: Mentoria Black">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-2 tracking-widest">Texto da Mensagem</label>
                            <textarea name="popup_text" rows="3" class="dark-field w-full rounded p-3 text-sm resize-none" placeholder="Digite a mensagem do popup...">{{ $popupText }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="px-10 py-4 bg-red-600 text-white font-black uppercase tracking-widest text-xs rounded-sm hover:bg-red-700 transition-all shadow-lg hover:shadow-red-600/20">
                        Salvar Alterações
                    </button>
                </form>
            </div>

            <div class="mt-12 flex justify-center md:justify-start">
                <a href="/" target="_blank" class="inline-flex items-center gap-3 px-8 py-3 bg-[#0a0a0a] border border-white/10 rounded-sm font-bold text-xs text-gray-400 uppercase tracking-widest hover:bg-white/5 hover:text-white transition-all shadow-xl">
                    <i data-lucide="external-link" class="w-4 h-4"></i>
                    Visualizar Site Público
                </a>
            </div>

        </div>
    </div>

    <script>
        // Inicializa os ícones Lucide no carregamento do Dashboard
        lucide.createIcons();
    </script>
</x-app-layout>