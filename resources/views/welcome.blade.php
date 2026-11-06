@php
    $popupConfig = \App\Models\SiteSetting::where('key', 'popup_active')->first();
    $isPopupActive = $popupConfig && $popupConfig->value == '1';
    $pImg = \App\Models\SiteSetting::where('key', 'popup_image')->first()?->value;
    $pTitle = \App\Models\SiteSetting::where('key', 'popup_title')->first()?->value ?? 'Mentoria Black';
    $pText = \App\Models\SiteSetting::where('key', 'popup_text')->first()?->value ?? 'As vagas para o acompanhamento foram abertas.';
@endphp

<!DOCTYPE html>
<html lang="pt-br" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIAGO SILVA | Consultoria de Alta Performance</title>
    <link rel="icon" type="image/png" href="{{ asset('logofooter.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,900;1,900&family=Inter:wght@400;500;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #050505; color: #f3f4f6; overflow-x: hidden; }
        .font-heading { font-family: 'Montserrat', sans-serif; }
        .glass-card { background: #0a0a0a; border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 8px; transition: all 0.3s ease; }
        .glass-card:hover { border-color: #ef4444; box-shadow: 0 10px 40px -10px rgba(239, 68, 68, 0.15); transform: translateY(-5px); }
        .bg-icons-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: radial-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px); background-size: 30px 30px; opacity: 0.1; z-index: -1; }
        .icon-floating { position: absolute; opacity: 0.02; color: white; pointer-events: none; animation: floatIcons 15s infinite linear; }
        @keyframes floatIcons { 0% { transform: translateY(0px) rotate(0deg); } 100% { transform: translateY(-100px) rotate(360deg); } }
        
        /* CSS PARA O CARROSSEL DA GALERIA */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    </style>
</head>
<body class="selection:bg-red-600 selection:text-white relative">

    <div class="bg-icons-overlay"></div>
    <div class="fixed inset-0 z-[-2] pointer-events-none hidden md:block">
        <i data-lucide="dumbbell" class="icon-floating w-40 h-40" style="top: 10%; left: 5%; animation-delay: 0s;"></i>
        <i data-lucide="zap" class="icon-floating w-32 h-32" style="top: 30%; right: 10%; animation-delay: 2s;"></i>
        <i data-lucide="target" class="icon-floating w-48 h-48" style="top: 60%; left: 15%; animation-delay: 4s;"></i>
        <i data-lucide="heart" class="icon-floating w-24 h-24" style="bottom: 10%; right: 5%; animation-delay: 6s;"></i>
    </div>

    <nav class="fixed w-full z-50 bg-[#050505]/95 backdrop-blur-sm border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 md:px-6 py-3 md:py-5 flex justify-between items-center">
            <a href="/" class="flex items-center gap-2 md:gap-3 group">
                <img src="{{ asset('logofooter.png') }}" alt="Logo Tiago Silva" class="h-8 md:h-12 w-auto object-contain">
                <span class="text-xl md:text-2xl font-black italic uppercase font-heading tracking-tighter text-white group-hover:text-gray-300 transition-colors">
                    TIAGO <span class="text-red-600">SILVA</span>
                </span>
            </a>
            <div class="hidden md:flex gap-10 font-bold uppercase text-xs tracking-widest text-gray-400">
                <a href="#galeria" class="hover:text-red-500 transition-colors">Resultados</a>
                <a href="#servicos" class="hover:text-red-500 transition-colors">Serviços</a>
                <a href="#planos" class="hover:text-red-500 transition-colors">Planos</a>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="w-8 h-8 md:w-10 md:h-10 flex items-center justify-center border border-white/10 rounded-full hover:bg-red-600 hover:border-red-600 transition-all text-gray-400 hover:text-white">
                    <i data-lucide="user" class="w-4 h-4"></i>
                </a>
                <button id="mobile-menu-btn" class="md:hidden text-gray-400 hover:text-white focus:outline-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-[#0a0a0a] border-t border-white/5 absolute w-full shadow-2xl">
            <div class="flex flex-col px-6 py-4 gap-4 font-bold uppercase text-xs tracking-widest text-gray-400">
                <a href="#galeria" class="mobile-link hover:text-red-500 transition-colors block py-2 border-b border-white/5">Resultados</a>
                <a href="#servicos" class="mobile-link hover:text-red-500 transition-colors block py-2 border-b border-white/5">Serviços</a>
                <a href="#planos" class="mobile-link hover:text-red-500 transition-colors block py-2 border-b border-white/5">Planos</a>
            </div>
        </div>
    </nav>

    <header class="relative min-h-screen flex items-center pt-24 pb-16 lg:pb-0 z-10 text-center">
        <div class="max-w-7xl mx-auto px-6 w-full flex flex-col lg:flex-row items-center gap-10 lg:gap-16 relative">
            <div class="absolute -inset-10 bg-red-600/20 blur-[150px] rounded-full z-[-1] opacity-50"></div>
            
            <div class="lg:w-2/3 flex flex-col items-center" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 bg-red-600/10 border border-red-600/20 px-4 py-1.5 rounded-sm mb-8 md:mb-10">
                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    <span class="text-red-500 text-[9px] md:text-[10px] font-bold uppercase tracking-widest text-center">Matrículas Abertas - Vagas Limitadas</span>
                </div>
                
                <div class="mb-6 md:mb-8 flex justify-center w-full">
                    <img src="{{ asset('logofooter.png') }}" alt="Logo" class="h-32 md:h-40 lg:h-56 w-auto object-contain">
                </div>

                <h1 class="text-2xl md:text-4xl lg:text-5xl font-black uppercase leading-[0.95] md:leading-[0.9] font-heading mb-6 md:mb-8 text-white tracking-tighter text-center">
                    Mudando o Mundo <br>
                    <span class="text-red-600 italic">através do movimento.</span>
                </h1>
                
                <p class="text-gray-400 text-base md:text-xl mb-10 md:mb-12 max-w-xl leading-relaxed font-medium text-justify">
                    Treinamento focado em hipertrofia e definição máxima. <br> A engenharia do seu novo corpo começa aqui.
                </p>
                
                <a href="https://wa.me/557788323420?text=Olá,%20vim%20pelo%20site%20e%20gostaria%20de%20uma%20avaliação." 
   target="_blank" 
   class="px-8 md:px-12 py-4 md:py-6 bg-red-600 text-white font-extrabold uppercase tracking-widest text-sm md:text-lg rounded-sm hover:shadow-[0_0_30px_rgba(239,68,68,0.4)] transition-all flex items-center justify-center gap-3 w-full md:w-max">
    Agende sua avaliação!
    <i data-lucide="arrow-right" class="w-5 h-5 md:w-6 md:h-6"></i>
</a>
            </div>
            
            <div class="w-full lg:w-1/3 relative mt-8 lg:mt-0" data-aos="fade-left" data-aos-duration="1000">
                <img src="home.png" 
                     class="relative rounded-sm grayscale hover:grayscale-0 transition-all duration-700 shadow-2xl border-l-4 border-red-600 h-[400px] md:h-[500px] lg:h-[650px] object-cover w-full object-top lg:object-center">
            </div>
        </div>
    </header>

    <section id="galeria" class="py-16 md:py-28 relative z-10 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 mb-10 md:mb-16">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6" data-aos="fade-up">
                <div>
                    <div class="inline-flex items-center gap-2 bg-red-600/10 border border-red-600/20 px-3 py-1 rounded-sm mb-4">
                        <i data-lucide="camera" class="w-3 h-3 text-red-500"></i>
                        <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest">A Prova</span>
                    </div>
                    <h2 class="text-3xl md:text-5xl font-black uppercase font-heading text-white tracking-tight">
                        Transformações <span class="text-red-600 italic">Reais</span>
                    </h2>
                </div>
                <div class="hidden md:flex gap-3">
                    <button id="btn-prev" class="w-12 h-12 border border-white/10 rounded flex items-center justify-center text-white hover:bg-red-600 hover:border-red-600 transition-all"><i data-lucide="chevron-left"></i></button>
                    <button id="btn-next" class="w-12 h-12 border border-white/10 rounded flex items-center justify-center text-white hover:bg-red-600 hover:border-red-600 transition-all"><i data-lucide="chevron-right"></i></button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6">
            <div id="carousel-container" class="flex overflow-x-auto snap-x snap-mandatory gap-6 pb-4 md:pb-8 hide-scrollbar scroll-smooth">
                @forelse($studentResults as $index => $result)
                <div class="carousel-item snap-center shrink-0 w-[85vw] md:w-[350px] lg:w-[400px] glass-card flex flex-col rounded-lg overflow-hidden group" data-index="{{ $index }}">
                    <div class="h-72 md:h-80 w-full overflow-hidden relative">
                        <img src="{{ asset($result->image_url) }}" alt="Resultado" onclick="openImageModal('{{ asset($result->image_url) }}')" class="w-full h-full object-cover grayscale-0 md:grayscale md:group-hover:grayscale-0 transition-all duration-700 transform group-hover:scale-105 cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent pointer-events-none"></div>
                    </div>
                    <div class="p-6 md:p-8 flex-grow flex flex-col justify-between relative z-10 -mt-8">
                        <h4 class="text-white font-black uppercase tracking-widest text-lg mb-2">{{ $result->name }}</h4>
                        <p class="text-gray-300 text-sm leading-relaxed mb-6 font-medium italic">"{{ $result->description }}"</p>
                        
                        @if($result->instagram_url)
                        <a href="{{ $result->instagram_url }}" target="_blank" class="inline-flex items-center gap-2 text-red-600 hover:text-white font-black uppercase tracking-widest text-[10px] md:text-xs transition-colors w-max">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            Ver Perfil Completo
                        </a>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-gray-500 text-xs md:text-sm font-bold uppercase tracking-widest p-12 border border-white/5 border-dashed rounded-lg w-full text-center">
                    Nenhum resultado cadastrado ainda.
                </div>
                @endforelse
            </div>

            @if($studentResults->count() > 1)
            <div class="flex md:hidden justify-center items-center gap-2 mt-6" id="carousel-dots">
                @foreach($studentResults as $index => $result)
                    <button class="carousel-dot h-2 rounded-full transition-all duration-300 {{ $index == 0 ? 'bg-red-600 w-6' : 'bg-white/20 w-2' }}" data-index="{{ $index }}" aria-label="Ir para foto {{ $index + 1 }}"></button>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <section id="servicos" class="py-16 md:py-28 relative z-10 bg-[#0a0a0a] border-y border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12 md:mb-20" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-black uppercase font-heading text-white mb-4 md:mb-5 tracking-tight">Nosso Arsenal</h2>
                <div class="w-16 md:w-24 h-1 md:h-1.5 bg-red-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($services as $service)
                <div class="glass-card p-8 md:p-12 flex flex-col items-center text-center group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-white/5 rounded-full flex items-center justify-center mb-6 md:mb-8 group-hover:bg-red-600/20 transition-all duration-300 border border-white/5">
                        <i data-lucide="{{ $service->icon }}" class="w-8 h-8 md:w-10 md:h-10 text-white group-hover:text-red-500 transition-colors"></i>
                    </div>
                    <h3 class="text-xl md:text-2xl font-black uppercase mb-3 md:mb-4 text-white font-heading tracking-tight">{{ $service->title }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $service->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="planos" class="py-16 md:py-28 relative z-10">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="mb-12 md:mb-20" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-black uppercase font-heading text-white mb-4 md:mb-5 tracking-tight">Sua Performance, Seu Plano</h2>
                <p class="text-gray-500 text-xs md:text-sm uppercase tracking-widest">Comprometimento gera resultado</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 text-left">
                @foreach($plans as $plan)
                <div class="glass-card flex flex-col p-8 md:p-10 group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($plan->photo_url)
                        <div class="mb-6 md:mb-8 overflow-hidden rounded-sm h-48 md:h-56 border border-white/5">
                            <img src="{{ asset($plan->photo_url) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                        </div>
                    @endif
                    <h3 class="text-2xl md:text-3xl font-black uppercase font-heading text-white mb-4 md:mb-5 tracking-tight leading-none">{{ $plan->name }}</h3>
                    @if($plan->price)
                        <div class="mb-6 md:mb-8 flex flex-col">
                            <span class="text-gray-500 text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] mb-1">A partir de:</span>
                            <div class="flex items-baseline gap-1">
                                <span class="text-red-600 font-black text-xl md:text-2xl uppercase font-heading">R$</span>
                                <span class="text-5xl md:text-7xl font-black text-white font-heading tracking-tighter">{{ number_format($plan->price, 0) }}</span>
                            </div>
                        </div>
                    @else
                        <div class="mb-6 md:mb-8 py-3 text-red-600 font-bold text-sm md:text-base uppercase tracking-wider border-y border-red-600/20 text-center md:text-left">A Consultar</div>
                    @endif
                    <p class="text-gray-400 text-sm mb-8 md:mb-10 flex-grow italic leading-relaxed">{{ $plan->description }}</p>
                    <a href="{{ $plan->checkout_url }}" class="w-full py-4 md:py-5 bg-white text-black text-center font-extrabold uppercase text-xs md:text-sm rounded-sm hover:bg-red-600 hover:text-white transition-all duration-300">Assinar Agora</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="depoimentos" class="py-16 md:py-28 relative z-10 bg-[#0a0a0a] border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12 md:mb-20" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-black uppercase font-heading text-white mb-4 md:mb-5 tracking-tight">Depoimentos</h2>
                <div class="w-16 md:w-24 h-1 md:h-1.5 bg-red-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10">
                @foreach($testimonials as $t)
                <div class="glass-card p-8 md:p-10 relative" data-aos="fade-up">
                    <i data-lucide="quote" class="w-8 h-8 md:w-12 md:h-12 text-white/5 absolute top-4 md:top-6 right-4 md:right-6"></i>
                    <p class="text-gray-300 italic mb-6 md:mb-8 relative z-10 leading-relaxed text-base md:text-lg">"{{ $t->content }}"</p>
                    <div class="flex items-center gap-3 md:gap-4">
                        <div class="w-1 h-5 md:h-6 bg-red-600 rounded-full"></div>
                        <span class="text-white font-bold uppercase tracking-widest text-xs md:text-sm">{{ $t->name }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="py-12 md:py-16 border-t border-white/5 bg-[#0a0a0a] text-center">
        <div class="max-w-7xl mx-auto px-4 md:px-6 flex flex-col items-center">
            <div class="font-heading text-2xl md:text-3xl font-black italic uppercase mb-4 md:mb-6 text-white tracking-tight">
                TIAGO<span class="text-red-600"> SILVA</span>
            </div>
            
            <img src="{{ asset('logofooter.png') }}" alt="Logo" class="mb-6 h-16 md:h-24 w-auto object-contain opacity-90 hover:opacity-100 transition-opacity duration-300">

            <div class="flex items-center gap-6 mb-10">
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

            <p class="text-gray-400 text-[8px] md:text-[11px] uppercase tracking-widest md:tracking-[0.6em] font-bold leading-relaxed">
                &copy; 2026 TIAGO SILVA | CREF: 016732-G/DF | Todos os direitos reservados.
            </p>
        </div>
    </footer>

    <div class="fixed bottom-6 right-6 md:bottom-8 md:right-8 z-[90] flex items-center justify-center">
    <span class="absolute inline-flex h-full w-full rounded-full bg-[#25D366] opacity-75 animate-ping"></span>

    <a href="https://wa.me/557788323420?text=Olá,%20vim%20pelo%20site%20e%20gostaria%20de%20uma%20avaliação." 
       target="_blank" 
       class="relative bg-[#25D366] text-white p-4 md:p-5 rounded-full shadow-[0_10px_25px_rgba(37,211,102,0.5)] hover:shadow-[0_15px_35px_rgba(37,211,102,0.6)] hover:scale-110 active:scale-95 transition-all duration-300 group flex items-center justify-center">
        
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 md:w-8 md:h-8 drop-shadow-md">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
        </svg>

        <span class="absolute right-full mr-4 bg-white text-black text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none whitespace-nowrap hidden md:block border-l-4 border-red-600">
            Falar com o Tiago
        </span>
    </a>
</div>

    <div id="image-modal" class="fixed inset-0 z-[110] flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 bg-[#050505]/95 backdrop-blur-md px-4" onclick="closeImageModal()">
        <button class="absolute top-4 right-4 md:top-10 md:right-10 bg-black/50 md:bg-transparent text-gray-300 hover:text-red-600 rounded-full p-2 md:p-0 transition-colors z-[120]">
            <i data-lucide="x" class="w-8 h-8 md:w-10 md:h-10"></i>
        </button>
        <img id="modal-image" src="" class="w-full md:w-auto max-h-[75vh] md:max-h-[85vh] max-w-full md:max-w-[80vw] object-contain rounded-lg shadow-[0_0_50px_rgba(239,68,68,0.15)] transform scale-95 transition-all duration-300 border border-white/5" onclick="event.stopPropagation()">
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 600 });
        lucide.createIcons();
        function celebrate() {
            confetti({ particleCount: 150, spread: 80, origin: { y: 0.6 }, colors: ['#ef4444', '#ffffff', '#000000'] });
            setTimeout(() => { document.getElementById('planos').scrollIntoView({ behavior: 'smooth' }); }, 600);
        }
        const btnMenu = document.getElementById('mobile-menu-btn');
        const menuMobile = document.getElementById('mobile-menu');
        document.querySelectorAll('.mobile-link').forEach(link => link.addEventListener('click', () => menuMobile.classList.add('hidden')));
        btnMenu.addEventListener('click', () => menuMobile.classList.toggle('hidden'));

        // Script Misto do Carrossel (Setas e Bolinhas)
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('carousel-container');
            const btnNext = document.getElementById('btn-next');
            const btnPrev = document.getElementById('btn-prev');
            const dots = document.querySelectorAll('.carousel-dot');
            const items = document.querySelectorAll('.carousel-item');

            if(btnNext && btnPrev && container) {
                btnNext.addEventListener('click', () => container.scrollBy({ left: 350, behavior: 'smooth' }));
                btnPrev.addEventListener('click', () => container.scrollBy({ left: -350, behavior: 'smooth' }));
            }

            if(container && items.length > 0 && dots.length > 0) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const index = entry.target.getAttribute('data-index');
                            updateDots(index);
                        }
                    });
                }, {
                    root: container,
                    threshold: 0.6
                });

                items.forEach(item => observer.observe(item));

                function updateDots(activeIndex) {
                    dots.forEach((dot, index) => {
                        if (index == activeIndex) {
                            dot.classList.remove('bg-white/20', 'w-2');
                            dot.classList.add('bg-red-600', 'w-6');
                        } else {
                            dot.classList.remove('bg-red-600', 'w-6');
                            dot.classList.add('bg-white/20', 'w-2');
                        }
                    });
                }

                dots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        const index = dot.getAttribute('data-index');
                        items[index].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                    });
                });
            }
        });

        // Modal de Imagem
        function openImageModal(imageUrl) {
            const modal = document.getElementById('image-modal');
            const img = document.getElementById('modal-image');
            img.src = imageUrl; 
            modal.classList.remove('opacity-0', 'pointer-events-none'); 
            setTimeout(() => { img.classList.remove('scale-95'); img.classList.add('scale-100'); }, 50);
        }
        function closeImageModal() {
            const modal = document.getElementById('image-modal');
            const img = document.getElementById('modal-image');
            modal.classList.add('opacity-0', 'pointer-events-none'); 
            img.classList.remove('scale-100'); img.classList.add('scale-95'); 
        }
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") closeImageModal();
        });
    </script>

    @if($isPopupActive)
    <div id="elite-popup" class="fixed inset-0 z-[100] flex items-center justify-center px-4 p-4 opacity-0 pointer-events-none transition-opacity duration-500" style="background-color: rgba(0, 0, 0, 0.9); backdrop-filter: blur(10px);">
        <div class="glass-card w-full max-w-4xl bg-[#0a0a0a] border border-white/10 shadow-[0_0_50px_rgba(239,68,68,0.2)] rounded-lg relative overflow-hidden flex flex-col md:flex-row transform scale-95 transition-all duration-500 max-h-[95vh] overflow-y-auto md:overflow-y-hidden" id="elite-popup-content">
            <div class="absolute top-0 left-0 w-full h-1 md:w-1 md:h-full bg-red-600 z-20"></div>
            <button onclick="closePopup()" class="absolute top-4 right-4 z-30 text-gray-400 hover:text-white bg-black/50 rounded-full p-1.5 backdrop-blur-sm transition-all hover:bg-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <div class="w-full md:w-1/2 h-48 md:h-auto relative shrink-0 group">
                <img src="{{ $pImg ?? 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=800&auto=format&fit=crop' }}" class="absolute inset-0 w-full h-full object-cover grayscale">
                <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-[#0a0a0a] via-[#0a0a0a]/40 to-transparent pointer-events-none"></div>
            </div>
            <div class="w-full md:w-1/2 p-6 md:p-12 flex flex-col justify-center relative z-10 text-left">
                <div class="inline-flex items-center gap-2 bg-red-600/10 border border-red-600/20 px-3 py-1.5 rounded-sm mb-4 md:mb-6 w-max shrink-0">
                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    <span class="text-red-500 text-[10px] font-black uppercase tracking-widest text-left">Oportunidade Única</span>
                </div>
                <h3 class="text-2xl md:text-4xl font-black uppercase text-white font-heading tracking-tighter mb-3 md:mb-4 leading-[0.9] text-left shrink-0">{{ $pTitle }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-6 md:mb-8 font-medium text-left">{{ $pText }}</p>
                <a href="https://wa.me/557788323420?text=Olá,%20vim%20pelo%20anuncio%20do%20site!%20" onclick="closePopup()" class="w-full py-4 bg-red-600 text-white text-center font-black uppercase tracking-widest text-xs md:text-sm rounded-sm hover:bg-red-700 transition-all flex items-center justify-center gap-3 shrink-0">
                    CLIQUE AQUI E CONFIRA! <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('elite-popup');
            const popupContent = document.getElementById('elite-popup-content');
            setTimeout(() => {
                popup.classList.remove('opacity-0', 'pointer-events-none');
                popupContent.classList.remove('scale-95'); popupContent.classList.add('scale-100');
            }, 1500); 
        });
        function closePopup() {
            const popup = document.getElementById('elite-popup');
            const popupContent = document.getElementById('elite-popup-content');
            popup.classList.add('opacity-0', 'pointer-events-none');
            popupContent.classList.remove('scale-100'); popupContent.classList.add('scale-95');
        }
    </script>
    @endif
</body>
</html>