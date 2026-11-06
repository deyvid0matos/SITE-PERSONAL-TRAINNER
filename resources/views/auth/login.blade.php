<x-guest-layout>
    <style>
        body { background-color: #050505 !important; }
        
        .bg-login-fix {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background-color: #050505; z-index: -1;
        }

        .bg-icons-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 30px 30px; opacity: 0.1; z-index: -1;
        }

        .icon-floating {
            position: absolute; opacity: 0.02; color: white; pointer-events: none;
            animation: floatIcons 15s infinite linear;
        }

        @keyframes floatIcons {
            0% { transform: translateY(0px) rotate(0deg); }
            100% { transform: translateY(-100px) rotate(360deg); }
        }
    </style>
    
    <div class="bg-login-fix"></div>
    <div class="bg-icons-overlay"></div>
    <div class="fixed inset-0 z-[-2] pointer-events-none px-6">
        <i data-lucide="dumbbell" class="icon-floating w-40 h-40" style="top: 10%; left: 5%; animation-delay: 0s;"></i>
        <i data-lucide="zap" class="icon-floating w-32 h-32" style="top: 30%; right: 10%; animation-delay: 2s;"></i>
        <i data-lucide="target" class="icon-floating w-48 h-48" style="top: 60%; left: 15%; animation-delay: 4s;"></i>
        <i data-lucide="heart" class="icon-floating w-24 h-24" style="bottom: 10%; right: 5%; animation-delay: 6s;"></i>
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10 px-6 text-center">
        
        <div class="mb-10 flex flex-col items-center">
            <a href="/" class="text-3xl md:text-4xl lg:text-5xl font-black italic uppercase font-heading tracking-tighter text-white hover:text-red-500 transition-colors">
                TIAGO<span class="text-red-600"> SILVA</span>
            </a>
            <p class="text-gray-500 text-[10px] uppercase tracking-[0.4em] font-bold mt-2">Área Restrita / Alta Performance</p>
        </div>

        <div class="w-full sm:max-w-md px-8 py-10 bg-[#0a0a0a] border border-white/5 shadow-2xl overflow-hidden sm:rounded-lg relative text-left">
            
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-800 via-red-500 to-red-800"></div>

            <x-auth-session-status class="mb-4 text-red-500 font-bold text-sm text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block font-bold text-xs text-gray-400 uppercase tracking-widest mb-2">Seu Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i data-lucide="mail" class="h-4 w-4 text-gray-500"></i>
                        </div>
                        <input id="email" class="block w-full pl-10 pr-3 py-3 bg-[#050505] border border-white/10 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 rounded-md shadow-sm sm:text-sm transition-colors" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nome@exemplo.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs font-bold" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 gap-2">
                        <label for="password" class="block font-bold text-xs text-gray-400 uppercase tracking-widest">Sua Senha</label>
                        @if (Route::has('password.request'))
                            
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i data-lucide="lock" class="h-4 w-4 text-gray-500"></i>
                        </div>
                        <input id="password" class="block w-full pl-10 pr-3 py-3 bg-[#050505] border border-white/10 text-white focus:border-red-500 focus:ring-1 focus:ring-red-500 rounded-md shadow-sm sm:text-sm transition-colors" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs font-bold" />
                </div>

                <div class="block">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded bg-[#050505] border-white/10 text-red-600 shadow-sm focus:ring-red-500 focus:ring-offset-[#0a0a0a]" name="remember">
                        <span class="ml-2 text-xs text-gray-500 font-bold uppercase tracking-wider group-hover:text-gray-300 transition-colors">Manter Conectado</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-sm font-black uppercase tracking-widest text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-[#0a0a0a] transition-all duration-300">
                        Entrar no Sistema
                    </button>
                </div>
            </form>
            
            <div class="mt-8 text-center border-t border-white/5 pt-6 flex flex-col items-center gap-6">
                <img src="{{ asset('logofooter.png') }}" alt="Logo EliteLab" class="h-16 w-auto object-contain opacity-80 hover:opacity-100 transition-opacity">

                <a href="/" class="text-xs text-gray-600 hover:text-white uppercase font-bold tracking-widest transition-colors inline-flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    Voltar para o site
                </a>
            </div>
        </div>

        <footer class="absolute bottom-6 left-0 right-0 flex flex-col items-center gap-4 text-center">
            <div class="flex gap-6">
                <a href="https://www.instagram.com/tiagosilvatreinador/" target="_blank" class="text-gray-500 hover:text-red-600 transition-colors" title="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="md:w-[28px] md:h-[28px]">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                
                <a href="https://wa.me/557788323420?text=Olá,%20vim%20pelo%20site%20e%20gostaria%20de%20uma%20avaliação." target="_blank" class="text-gray-500 hover:text-green-500 transition-colors" title="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="md:w-[28px] md:h-[28px]">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                    </svg>
                </a>
            </div>
            <p class="text-gray-600 text-[10px] uppercase tracking-[0.4em] font-bold leading-relaxed px-6">
                &copy; 2026 TIAGO SILVA | CREF: 016732-G/DF | Todos os direitos reservados.
            </p>
        </footer>
    </div>

    <script>
        lucide.createIcons();
    </script>
</x-guest-layout>