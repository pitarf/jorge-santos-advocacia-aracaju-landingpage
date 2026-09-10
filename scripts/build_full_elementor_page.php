<?php
/**
 * Construtor completo e fiel da Landing Page no Elementor para Jorge Santos Advocacia
 */

require_once dirname( __DIR__ ) . '/app/public/wp-load.php';

if ( ! class_exists( '\Elementor\Plugin' ) ) {
    echo "Elementor plugin not found.\n";
    exit(1);
}

$page_id = 14;

function generate_id() {
    return substr( md5( uniqid( mt_rand(), true ) ), 0, 7 );
}

$logo_url = home_url( '/wp-content/uploads/2026/08/logo-1.jpeg' );
$foto1_url = home_url( '/wp-content/uploads/2026/08/foto-1.jpeg' );
$foto2_url = home_url( '/wp-content/uploads/2026/08/foto-2.jpeg' );
$foto3_url = home_url( '/wp-content/uploads/2026/08/foto-3.jpeg' );

function create_html_section( $html_content, $section_name = 'Seção' ) {
    return [
        'id' => generate_id(),
        'elType' => 'section',
        'isInner' => false,
        'settings' => [
            '_title' => $section_name,
            'gap' => 'no',
            'padding' => ['unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0', 'isLinked' => true],
        ],
        'elements' => [
            [
                'id' => generate_id(),
                'elType' => 'column',
                'isInner' => false,
                'settings' => [
                    '_column_size' => 100,
                    'padding' => ['unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0', 'isLinked' => true],
                ],
                'elements' => [
                    [
                        'id' => generate_id(),
                        'elType' => 'widget',
                        'widgetType' => 'html',
                        'settings' => [
                            'html' => $html_content,
                        ],
                    ],
                ],
            ],
        ],
    ];
}

$elements = [];

// 1. TOPBAR & NAVBAR
$navbar_html = <<<HTML
<div class="bg-white border-b border-slate-200 text-xs py-2.5 px-4 shadow-sm font-sans">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 text-slate-600">
        <div class="flex items-center gap-4">
            <span class="flex items-center gap-1.5"><i class="fa-solid fa-location-dot text-[#D1A748]"></i> <strong class="text-[#0E1928]">Goiânia - GO</strong> e Região</span>
            <span class="hidden md:inline text-slate-300">|</span>
            <span class="hidden md:flex items-center gap-1.5"><i class="fa-solid fa-clock text-[#D1A748]"></i> Atendimento Seg a Sex: 08h às 18h</span>
        </div>
        <div class="flex items-center gap-4">
            <a href="https://wa.me/5562981365011?text=Olá!%20Gostaria%20de%20falar%20com%20o%20Dr.%20Jorge%20Santos%20Advocacia." target="_blank" class="text-[#25D366] hover:underline flex items-center gap-1.5 font-bold">
                <i class="fa-brands fa-whatsapp text-sm"></i> (62) 98136-5011
            </a>
            <span class="text-slate-300">|</span>
            <a href="mailto:jorgesantosadvocacia@gmail.com" class="hover:text-[#B38B2F] hover:underline transition-colors flex items-center gap-1.5 text-slate-600">
                <i class="fa-regular fa-envelope text-[#D1A748]"></i> jorgesantosadvocacia@gmail.com
            </a>
        </div>
    </div>
</div>

<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="#" class="flex items-center gap-3">
                <img src="{$logo_url}" alt="Jorge Santos Advocacia" class="h-12 w-auto object-contain">
            </a>
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-[#0E1928]">
                <a href="#inicio" class="hover:text-[#B38B2F] transition-colors">Início</a>
                <a href="#areas" class="hover:text-[#B38B2F] transition-colors">Áreas de Atuação</a>
                <a href="#distrato" class="hover:text-[#B38B2F] transition-colors">Distrato de Lotes</a>
                <a href="#protecao-veicular" class="hover:text-[#B38B2F] transition-colors">Proteção Veicular</a>
                <a href="#como-funciona" class="hover:text-[#B38B2F] transition-colors">Como Funciona</a>
                <a href="#sobre" class="hover:text-[#B38B2F] transition-colors">Sobre o Advogado</a>
                <a href="#faq" class="hover:text-[#B38B2F] transition-colors">Dúvidas</a>
            </nav>
            <div class="flex items-center gap-3">
                <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20uma%20orientação%20com%20o%20Dr.%20Jorge%20Santos." target="_blank" class="bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold text-sm px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    <span>Falar no WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</header>
HTML;
$elements[] = create_html_section( $navbar_html, 'Cabeçalho e Menu' );

// 2. HERO SECTION
$hero_html = <<<HTML
<section id="inicio" class="relative pt-12 pb-20 md:pt-16 md:pb-24 overflow-hidden bg-white border-b border-slate-200 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-50 border border-[#D1A748]/40 text-[#B38B2F] text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-scale-balanced text-[#D1A748]"></i>
                    <span>Advocacia Especializada em Goiânia - GO</span>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#0E1928] tracking-tight leading-tight">
                    Atendimento Jurídico <span style="background: linear-gradient(135deg, #B38B2F 0%, #D1A748 50%, #E8C87A 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Claro, Próximo</span> e Focado na Solução do Seu Caso.
                </h1>

                <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    A <strong class="text-[#0E1928] font-semibold">Jorge Santos Advocacia</strong> oferece atendimento descomplicado, em linguagem simples e sem juridiquês para pessoas, famílias, empresários e associações de proteção veicular em Goiânia.
                </p>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2 text-left text-xs sm:text-sm text-slate-700">
                    <div class="flex items-center gap-2 font-medium">
                        <i class="fa-solid fa-circle-check text-[#D1A748]"></i>
                        <span>Linguagem Simples</span>
                    </div>
                    <div class="flex items-center gap-2 font-medium">
                        <i class="fa-solid fa-circle-check text-[#D1A748]"></i>
                        <span>Atendimento Rápido</span>
                    </div>
                    <div class="flex items-center gap-2 font-medium">
                        <i class="fa-solid fa-circle-check text-[#D1A748]"></i>
                        <span>Sigilo Absoluto</span>
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="https://wa.me/5562981365011?text=Olá,%20Dr.%20Jorge!%20Gostaria%20de%20orientação%20jurídica%20para%20o%20meu%20caso." target="_blank" class="w-full sm:w-auto bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold text-base px-8 py-4 rounded-xl shadow-lg transition-all flex items-center justify-center gap-3">
                        <i class="fa-brands fa-whatsapp text-2xl"></i>
                        <div class="text-left leading-tight">
                            <span class="block text-[11px] uppercase tracking-wider font-semibold opacity-95">Atendimento Imediato</span>
                            <span>Falar com o Advogado no WhatsApp</span>
                        </div>
                    </a>
                    <a href="#areas" class="w-full sm:w-auto px-6 py-4 rounded-xl border-2 border-slate-300 hover:border-[#D1A748] bg-white hover:bg-slate-50 text-[#0E1928] font-bold text-center transition-all shadow-sm">
                        Ver Áreas de Atuação
                    </a>
                </div>

                <p class="text-xs text-slate-500 italic">
                    * Atendimento direto com advogado em Goiânia e online via <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-semibold">WhatsApp</a> para todo o Brasil.
                </p>
            </div>

            <div class="lg:col-span-5 relative flex justify-center">
                <div class="relative w-full max-w-md">
                    <div class="relative rounded-2xl overflow-hidden border-4 border-[#D1A748]/30 shadow-2xl bg-white">
                        <img src="{$foto1_url}" alt="Dr. Jorge Santos - Advogado em Goiânia" class="w-full h-auto object-cover">
                        <div class="absolute bottom-4 left-4 right-4 p-3 bg-white/95 backdrop-blur-md rounded-xl shadow-md border-l-4 border-[#D1A748]">
                            <div class="font-bold text-[#0E1928] text-base">Dr. Jorge Santos</div>
                            <div class="text-xs text-[#B38B2F] font-semibold">Advocacia & Consultoria Jurídica em Goiânia</div>
                        </div>
                    </div>

                    <div class="absolute -top-4 -left-4 sm:-left-6 bg-white p-3 rounded-xl shadow-xl border border-slate-200 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-amber-50 text-[#D1A748] flex items-center justify-center font-bold text-lg">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div>
                            <div class="text-xs text-slate-500 font-medium">Avaliação dos Clientes</div>
                            <div class="text-sm font-bold text-[#0E1928] flex items-center gap-1">
                                5.0 <span class="text-amber-400 text-xs">★★★★★</span>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-6 -right-4 sm:-right-6 bg-white p-3 rounded-xl shadow-xl border border-slate-200 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-50 text-[#25D366] flex items-center justify-center font-bold text-lg">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <div class="text-xs text-slate-500 font-medium">Atendimento Seguro</div>
                            <div class="text-sm font-bold text-[#0E1928]">100% Personalizado</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $hero_html, 'Seção Hero Principal' );

// 3. FAIXA DE ESTATÍSTICAS
$stats_html = <<<HTML
<div class="bg-[#0E1928] py-6 px-4 text-white font-sans">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div class="p-2 border-r border-[#1B2C42]/60 last:border-none">
            <div class="text-2xl sm:text-3xl font-extrabold text-[#D1A748]">Linguagem Clara</div>
            <div class="text-xs sm:text-sm text-slate-300 mt-1">Sem termos difíceis</div>
        </div>
        <div class="p-2 border-r border-[#1B2C42]/60 last:border-none">
            <div class="text-2xl sm:text-3xl font-extrabold text-white">Goiânia - GO</div>
            <div class="text-xs sm:text-sm text-slate-300 mt-1">Atendimento Local e Online</div>
        </div>
        <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20direto%20pelo%20WhatsApp." target="_blank" class="p-2 border-r border-[#1B2C42]/60 last:border-none hover:bg-[#1B2C42]/60 rounded-lg transition-colors group block">
            <div class="text-2xl sm:text-3xl font-extrabold text-[#25D366] group-hover:underline flex items-center justify-center gap-1.5">
                <i class="fa-brands fa-whatsapp text-2xl"></i> WhatsApp Direto
            </div>
            <div class="text-xs sm:text-sm text-slate-300 mt-1">Clique para Resposta Ágil</div>
        </a>
        <div class="p-2">
            <div class="text-2xl sm:text-3xl font-extrabold text-[#D1A748]">Foco no Cliente</div>
            <div class="text-xs sm:text-sm text-slate-300 mt-1">Orientação Estratégica</div>
        </div>
    </div>
</div>
HTML;
$elements[] = create_html_section( $stats_html, 'Faixa de Destaques e Stats' );

// 4. DORES DO CLIENTE
$dores_html = <<<HTML
<section class="py-16 md:py-24 bg-[#F8F9FB] relative font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <h2 class="text-xs font-bold uppercase tracking-widest text-[#B38B2F] mb-2">Quando Procurar um Advogado?</h2>
            <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#0E1928]">Problemas do Dia a Dia que Nós Ajudamos Você a Resolver</p>
            <p class="text-slate-600 text-sm sm:text-base mt-3">Muitas pessoas deixam para buscar ajuda quando a situação já se complicou. Quanto antes você entender seus direitos, mais fácil é encontrar uma solução segura.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-2xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#D1A748] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <h3 class="text-lg font-bold text-[#0E1928] mb-2">Dúvidas sobre Demissão ou Direitos?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Não recebeu verbas rescisórias, horas extras, FGTS ou foi demitido sem justa causa? Ou é empresário e precisa de defesa em ação trabalhista?
                </p>
                <a href="https://wa.me/5562981365011?text=Olá,%20preciso%20de%20orientação%20sobre%20Direito%20Trabalhista." target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B38B2F] hover:text-[#D1A748] mt-4">
                    Falar sobre caso trabalhista <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#D1A748] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-tree-city"></i>
                </div>
                <h3 class="text-lg font-bold text-[#0E1928] mb-2">Comprou Lote e Não Consegue Pagar?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    As parcelas subiram demais ou se arrependeu da compra? Saiba como funciona o distrato de lote e o pedido de devolução dos valores pagos.
                </p>
                <a href="#distrato" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B38B2F] hover:text-[#D1A748] mt-4">
                    Ver como funciona o distrato <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#D1A748] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-building-circle-exclamation"></i>
                </div>
                <h3 class="text-lg font-bold text-[#0E1928] mb-2">Imóvel ou Loteamento Não Entregue?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    A construtora ou loteadora atrasou a entrega das chaves ou da infraestrutura? Você pode ter direito à rescisão contratual e ressarcimento.
                </p>
                <a href="https://wa.me/5562981365011?text=Olá,%20meu%20imóvel/loteamento%20está%20com%20atraso%20na%20entrega." target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B38B2F] hover:text-[#D1A748] mt-4">
                    Analisar atraso de obra <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#D1A748] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-shield-cat"></i>
                </div>
                <h3 class="text-lg font-bold text-[#0E1928] mb-2">Associação de Proteção Veicular?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Assessoria preventiva, elaboração de estatutos e regulamentos de eventos, ou defesa técnica em processos judiciais de associados e oficinas.
                </p>
                <a href="#protecao-veicular" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B38B2F] hover:text-[#D1A748] mt-4">
                    Assessoria para Associações <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#D1A748] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-people-roof"></i>
                </div>
                <h3 class="text-lg font-bold text-[#0E1928] mb-2">Divórcio, Pensão ou Guarda de Filhos?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Condução ética e humanizada para divórcio consensual ou litigioso, regulamentação de visitas, fixação ou revisão de pensão alimentícia.
                </p>
                <a href="https://wa.me/5562981365011?text=Olá,%20preciso%20de%20orientação%20em%20Direito%20de%20Família/Divórcio." target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B38B2F] hover:text-[#D1A748] mt-4">
                    Falar sobre família <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#D1A748] flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-file-signature"></i>
                </div>
                <h3 class="text-lg font-bold text-[#0E1928] mb-2">Precisa Fazer Inventário de Bens?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Regularize imóveis, veículos, contas bancárias e bens deixados por falecimento de forma ágil, via cartório (extrajudicial) ou judicial.
                </p>
                <a href="https://wa.me/5562981365011?text=Olá,%20preciso%20de%20orientação%20sobre%20Inventário%20em%20Goiânia." target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B38B2F] hover:text-[#D1A748] mt-4">
                    Entender o inventário <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

        </div>

        <div class="mt-12 p-8 rounded-2xl bg-white border-2 border-[#D1A748]/30 shadow-md flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-xl font-bold text-[#0E1928]">Não encontrou sua situação na lista acima?</h3>
                <p class="text-sm text-slate-600 mt-1">Entre em contato direto e conte o que aconteceu para receber uma orientação inicial personalizada.</p>
            </div>
            <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20explicar%20meu%20caso%20ao%20Dr.%20Jorge%20Santos." target="_blank" class="whitespace-nowrap bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold px-6 py-3.5 rounded-xl shadow-md flex items-center gap-2">
                <i class="fa-brands fa-whatsapp text-lg"></i> Falar Agora no WhatsApp
            </a>
        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $dores_html, 'Seção Dores e Problemas' );

// 5. ÁREAS DE ATUAÇÃO
$areas_html = <<<HTML
<section id="areas" class="py-16 md:py-24 bg-white border-t border-slate-200 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-[#B38B2F]">Especialidades Jurídicas</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0E1928] mt-2">Áreas de Atuação em Goiânia e Região</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-3">Atuação completa, moderna e estratégica para pessoas físicas, empresas e entidades.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- 1. Trabalhista -->
            <div class="bg-[#F8F9FB] rounded-2xl p-7 border border-slate-200 hover:border-[#D1A748] transition-all flex flex-col justify-between shadow-sm hover:shadow-md">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-[#0E1928]">Direito Trabalhista</h3>
                        <span class="text-[#D1A748] text-2xl"><i class="fa-solid fa-user-tie"></i></span>
                    </div>
                    <p class="text-xs text-[#B38B2F] font-bold mb-3 uppercase tracking-wide">Para empregados e empresas em Goiânia</p>
                    <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                        Defesa dos direitos de quem trabalha e assessoria consultiva e preventiva para empresas que desejam evitar passivos trabalhistas.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-700 border-t border-slate-200 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Rescisão Indireta e Verbas Rescisórias</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Horas Extras e Intervalos Não Pagos</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> FGTS e Seguro Desemprego</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Reconhecimento de Vínculo de Emprego</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Acidente de Trabalho e Estabilidade</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Defesa de Empresas e Acordos Judiciais</li>
                    </ul>
                </div>
                <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Direito%20Trabalhista." target="_blank" class="mt-6 block text-center py-3 rounded-lg border-2 border-[#D1A748] text-[#B38B2F] hover:bg-[#D1A748] hover:text-white font-bold text-xs transition-colors">
                    Falar com Advogado Trabalhista
                </a>
            </div>

            <!-- 2. Imobiliário -->
            <div class="bg-white rounded-2xl p-7 border-2 border-[#D1A748] shadow-lg flex flex-col justify-between relative">
                <span class="absolute -top-3 right-6 bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] text-[10px] font-extrabold uppercase px-3 py-1 rounded-full shadow-sm">Mais Solicitado</span>
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-[#0E1928]">Direito Imobiliário</h3>
                        <span class="text-[#D1A748] text-2xl"><i class="fa-solid fa-house-chimney"></i></span>
                    </div>
                    <p class="text-xs text-[#B38B2F] font-bold mb-3 uppercase tracking-wide">Distrato de lotes e imóveis em atraso</p>
                    <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                        Segurança na compra, venda, cancelamento e devolução de valores de lotes, apartamentos na planta e loteamentos.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-700 border-t border-slate-200 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Distrato e Cancelamento de Compra de Lote</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Devolução Justa de Valores Já Pagos</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Atraso na Entrega de Imóvel na Planta</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Loteamento ou Condomínio Sem Infraestrutura</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Ações contra Loteadoras e Construtoras</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Ações de Posse, Usucapião e Despejo</li>
                    </ul>
                </div>
                <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Direito%20Imobiliário." target="_blank" class="mt-6 block text-center py-3 rounded-lg bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] font-extrabold text-xs hover:brightness-105 transition-all shadow-sm">
                    Falar com Advogado Imobiliário
                </a>
            </div>

            <!-- 3. Proteção Veicular -->
            <div class="bg-white rounded-2xl p-7 border-2 border-[#D1A748] shadow-lg flex flex-col justify-between relative">
                <span class="absolute -top-3 right-6 bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] text-[10px] font-extrabold uppercase px-3 py-1 rounded-full shadow-sm">Especialidade</span>
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-[#0E1928]">Proteção Veicular</h3>
                        <span class="text-[#D1A748] text-2xl"><i class="fa-solid fa-shield-cat"></i></span>
                    </div>
                    <p class="text-xs text-[#B38B2F] font-bold mb-3 uppercase tracking-wide">Assessoria completa para associações</p>
                    <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                        Orientação preventiva, confecção de regulamentos associativos e defesa em processos judiciais movidos por associados e terceiros.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-700 border-t border-slate-200 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Estatutos e Regulamentos Internos</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Termos de Adesão e Contratos de Oficinas</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Defesa em Ações de Sinistros / Eventos</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Negativa de Cobertura com Base no Regulamento</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Danos Morais e Materiais</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Consultoria Preventiva e Treinamento</li>
                    </ul>
                </div>
                <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20para%20Associação%20de%20Proteção%20Veicular." target="_blank" class="mt-6 block text-center py-3 rounded-lg bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] font-extrabold text-xs hover:brightness-105 transition-all shadow-sm">
                    Falar com Especialista em Associações
                </a>
            </div>

            <!-- 4. Família -->
            <div class="bg-[#F8F9FB] rounded-2xl p-7 border border-slate-200 hover:border-[#D1A748] transition-all flex flex-col justify-between shadow-sm hover:shadow-md">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-[#0E1928]">Direito de Família</h3>
                        <span class="text-[#D1A748] text-2xl"><i class="fa-solid fa-hands-holding-child"></i></span>
                    </div>
                    <p class="text-xs text-[#B38B2F] font-bold mb-3 uppercase tracking-wide">Cuidado e discrição em momentos delicados</p>
                    <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                        Resolução ágil e pacífica de questões matrimoniais, garantindo a proteção dos filhos e do patrimônio familiar.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-700 border-t border-slate-200 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Divórcio em Cartório ou Judicial</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Pensão Alimentícia (Fixação, Revisão ou Exoneração)</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Guarda Compartilhada e Visitas</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Dissolução de União Estável</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Partilha de Bens do Casal</li>
                    </ul>
                </div>
                <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Direito%20de%20Família/Divórcio." target="_blank" class="mt-6 block text-center py-3 rounded-lg border-2 border-[#D1A748] text-[#B38B2F] hover:bg-[#D1A748] hover:text-white font-bold text-xs transition-colors">
                    Falar sobre Família / Divórcio
                </a>
            </div>

            <!-- 5. Inventário -->
            <div class="bg-[#F8F9FB] rounded-2xl p-7 border border-slate-200 hover:border-[#D1A748] transition-all flex flex-col justify-between shadow-sm hover:shadow-md">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-[#0E1928]">Inventário e Herança</h3>
                        <span class="text-[#D1A748] text-2xl"><i class="fa-solid fa-landmark"></i></span>
                    </div>
                    <p class="text-xs text-[#B38B2F] font-bold mb-3 uppercase tracking-wide">Regularização e partilha de bens</p>
                    <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                        Organização de documentos e condução de inventários para transferência segura de bens para os herdeiros legais.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-700 border-t border-slate-200 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Inventário Extrajudicial (Cartório - Rápido)</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Inventário Judicial</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Regularização de Casas, Lotes e Fazendas</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Alvarás para Levantamento de Valores</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Planejamento Sucessório Familiar</li>
                    </ul>
                </div>
                <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20sobre%20Inventário%20em%20Goiânia." target="_blank" class="mt-6 block text-center py-3 rounded-lg border-2 border-[#D1A748] text-[#B38B2F] hover:bg-[#D1A748] hover:text-white font-bold text-xs transition-colors">
                    Falar sobre Inventário
                </a>
            </div>

            <!-- 6. Civil -->
            <div class="bg-[#F8F9FB] rounded-2xl p-7 border border-slate-200 hover:border-[#D1A748] transition-all flex flex-col justify-between shadow-sm hover:shadow-md">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-[#0E1928]">Civil, Contratos e Cobranças</h3>
                        <span class="text-[#D1A748] text-2xl"><i class="fa-solid fa-file-contract"></i></span>
                    </div>
                    <p class="text-xs text-[#B38B2F] font-bold mb-3 uppercase tracking-wide">Segurança em negócios e recuperação de créditos</p>
                    <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                        Elaboração e revisão minuciosa de contratos, ações de cobrança de dívidas, indenizações e proteção do consumidor.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-700 border-t border-slate-200 pt-4">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Elaboração e Revisão de Contratos Diversos</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Cobrança Judicial e Extrajudicial de Devedores</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Indenização por Danos Morais e Materiais</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Negativação Indevida no SPC / Serasa</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-[#D1A748] font-bold"></i> Assessoria Jurídica para Empresas e Sócios</li>
                    </ul>
                </div>
                <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Contratos/Civil/Cobranças." target="_blank" class="mt-6 block text-center py-3 rounded-lg border-2 border-[#D1A748] text-[#B38B2F] hover:bg-[#D1A748] hover:text-white font-bold text-xs transition-colors">
                    Falar sobre Contratos ou Cobranças
                </a>
            </div>

        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $areas_html, 'Seção Áreas de Atuação' );

// 6. DISTRATO DE LOTES
$distrato_html = <<<HTML
<section id="distrato" class="py-16 md:py-24 bg-[#0E1928] text-white relative overflow-hidden font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#1B2C42]/80 border-2 border-[#D1A748]/40 rounded-3xl p-8 sm:p-12 shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <div class="lg:col-span-7 space-y-5">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-md bg-[#D1A748] text-[#0E1928] text-xs font-extrabold uppercase tracking-wide">
                        <i class="fa-solid fa-triangle-exclamation"></i> Problemas com Loteadora ou Construtora?
                    </div>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white leading-tight">
                        Comprou um Lote e as Parcelas Ficaram Pesadas Demais?
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        Muitos compradores adquirem lotes ou imóveis na planta e, após aumentos sucessivos nas parcelas ou mudança financeira, não conseguem mais manter os pagamentos. Não abandone seu contrato sem orientação jurídica!
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-xs sm:text-sm text-slate-200">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-arrow-right text-[#D1A748]"></i>
                            <span>Distrato e cancelamento do contrato</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-arrow-right text-[#D1A748]"></i>
                            <span>Devolução dos valores pagos</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-arrow-right text-[#D1A748]"></i>
                            <span>Revisão de multas e retenções abusivas</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-arrow-right text-[#D1A748]"></i>
                            <span>Atraso na entrega de loteamento/obra</span>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="https://wa.me/5562981365011?text=Olá,%20comprei%20um%20lote%20e%20preciso%20de%20orientação%20para%20distrato/cancelamento." target="_blank" class="inline-flex items-center gap-3 bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold text-sm sm:text-base px-7 py-4 rounded-xl shadow-xl transition-all">
                            <i class="fa-brands fa-whatsapp text-2xl"></i>
                            <span>Analisar Meu Contrato de Lote pelo WhatsApp</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="bg-white text-slate-900 p-6 sm:p-8 rounded-2xl border-2 border-[#D1A748] shadow-xl">
                        <h3 class="text-lg font-bold text-[#0E1928] mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-clipboard-check text-[#D1A748]"></i> O que Analisamos no Seu Contrato:
                        </h3>
                        <ul class="space-y-3.5 text-xs sm:text-sm text-slate-700">
                            <li class="flex items-start gap-2">
                                <span class="text-[#D1A748] font-extrabold text-sm">1.</span>
                                <span>O valor total pago até o momento e saldo devedor.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[#D1A748] font-extrabold text-sm">2.</span>
                                <span>Se as multas de cancelamento estão de acordo com a Lei do Distrato.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[#D1A748] font-extrabold text-sm">3.</span>
                                <span>Se houve descumprimento de prazos ou de obras de infraestrutura pela loteadora.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[#D1A748] font-extrabold text-sm">4.</span>
                                <span>Qual o melhor caminho para evitar negativação do seu nome.</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $distrato_html, 'Seção Distrato de Lotes' );

// 7. ASSOCIAÇÕES DE PROTEÇÃO VEICULAR
$protecao_html = <<<HTML
<section id="protecao-veicular" class="py-16 md:py-24 bg-[#F8F9FB] border-t border-slate-200 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative order-2 lg:order-1">
                <div class="rounded-2xl overflow-hidden border-4 border-[#D1A748]/30 shadow-xl bg-white">
                    <img src="{$foto2_url}" alt="Assessoria Jurídica para Associações de Proteção Veicular em Goiânia" class="w-full h-auto object-cover">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-5 order-1 lg:order-2">
                <span class="text-xs font-bold uppercase tracking-widest text-[#B38B2F]">Atuação Especializada</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#0E1928] leading-tight">
                    Assessoria Jurídica e Defesa para Associações de Proteção Veicular
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    As associações de proteção veicular necessitam de instrumentos jurídicos sólidos e bem estruturados para garantir a sustentabilidade do grupo mútuo e a segurança jurídica nas relações com associados, oficinas e fornecedores.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm">
                        <div class="text-[#0E1928] font-bold text-sm mb-1"><i class="fa-solid fa-file-lines text-[#D1A748] mr-1.5"></i> Consultoria Preventiva</div>
                        <p class="text-slate-600 text-xs">Criação e revisão de estatutos, termos de adesão e regulamentos de rateio de eventos.</p>
                    </div>
                    <div class="bg-white p-5 rounded-xl border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm">
                        <div class="text-[#0E1928] font-bold text-sm mb-1"><i class="fa-solid fa-gavel text-[#D1A748] mr-1.5"></i> Defesa em Ações Judiciais</div>
                        <p class="text-slate-600 text-xs">Contestação especializada em processos de negativa de indenização, furto, roubo, perda total e danos.</p>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20conversar%20sobre%20assessoria%20para%20Associação%20de%20Proteção%20Veicular." target="_blank" class="inline-flex items-center gap-3 bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold text-sm sm:text-base px-7 py-3.5 rounded-xl shadow-lg transition-all">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                        <span>Falar com Advogado Especialista em Proteção Veicular</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $protecao_html, 'Seção Proteção Veicular' );

// 8. COMO FUNCIONA O ATENDIMENTO
$como_funciona_html = <<<HTML
<section id="como-funciona" class="py-16 md:py-24 bg-white border-t border-slate-200 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-[#B38B2F]">Passo a Passo</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0E1928] mt-2">Como Funciona o Nosso Atendimento</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-3">Processo transparente, rápido e sem complicações do início ao fim.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            
            <div class="bg-[#F8F9FB] p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] font-extrabold flex items-center justify-center text-lg mb-4 shadow-md">1</div>
                <h3 class="text-base font-bold text-[#0E1928] mb-2">Primeiro Contato</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Você clica no <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-bold">botão do WhatsApp</a> e inicia a conversa diretamente conosco.</p>
            </div>

            <div class="bg-[#F8F9FB] p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] font-extrabold flex items-center justify-center text-lg mb-4 shadow-md">2</div>
                <h3 class="text-base font-bold text-[#0E1928] mb-2">Relato do Caso</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Você explica resumidamente o que aconteceu e qual é o seu objetivo.</p>
            </div>

            <div class="bg-[#F8F9FB] p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] font-extrabold flex items-center justify-center text-lg mb-4 shadow-md">3</div>
                <h3 class="text-base font-bold text-[#0E1928] mb-2">Envio de Docs</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Se necessário, você envia fotos ou cópias dos contratos por <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-bold">WhatsApp</a> ou <a href="mailto:jorgesantosadvocacia@gmail.com" class="text-[#B38B2F] hover:underline font-bold">e-mail</a>.</p>
            </div>

            <div class="bg-[#F8F9FB] p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] font-extrabold flex items-center justify-center text-lg mb-4 shadow-md">4</div>
                <h3 class="text-base font-bold text-[#0E1928] mb-2">Análise Jurídica</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Avaliamos detalhadamente as leis, contratos e possibilidades do seu caso.</p>
            </div>

            <div class="bg-[#F8F9FB] p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#E2BD63] to-[#D1A748] text-[#0E1928] font-extrabold flex items-center justify-center text-lg mb-4 shadow-md">5</div>
                <h3 class="text-base font-bold text-[#0E1928] mb-2">Plano de Ação</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Você recebe a orientação precisa sobre quais são os próximos passos mais seguros.</p>
            </div>

        </div>

        <div class="text-center mt-12">
            <a href="https://wa.me/5562981365011?text=Olá,%20quero%20iniciar%20meu%20atendimento%20com%20o%20Dr.%20Jorge%20Santos." target="_blank" class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold px-8 py-4 rounded-xl shadow-lg transition-all">
                <i class="fa-brands fa-whatsapp text-xl"></i> Iniciar Atendimento Agora
            </a>
        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $como_funciona_html, 'Seção Como Funciona' );

// 9. SOBRE O ADVOGADO
$sobre_html = <<<HTML
<section id="sobre" class="py-16 md:py-24 bg-[#F8F9FB] border-t border-slate-200 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-full max-w-sm rounded-2xl overflow-hidden border-4 border-[#D1A748]/30 shadow-xl bg-white">
                    <img src="{$foto3_url}" alt="Dr. Jorge Santos Advocacia Goiânia" class="w-full h-auto object-cover">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-[#B38B2F]">Sobre o Escritório</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0E1928] leading-tight">
                    Jorge Santos Advocacia: Advocacia Humanizada, Clara e Transparente
                </h2>
                
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Acreditamos que a relação entre advogado e cliente deve ser pautada na confiança absoluta e na clareza. Você não precisa se sentir confuso com termos técnicos ou burocracias.
                </p>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Nosso compromisso é ouvir você com atenção, avaliar minuciosamente cada documento e propor estratégias eficazes para proteger seu patrimônio, seus direitos e a tranquilidade da sua família ou da sua empresa.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs sm:text-sm">
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-white border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm">
                        <i class="fa-solid fa-handshake text-[#D1A748] text-2xl"></i>
                        <div>
                            <div class="font-bold text-[#0E1928]">Atendimento Próximo</div>
                            <div class="text-slate-500 text-xs">Conversa direta com o advogado</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-white border border-slate-200 border-l-4 border-l-[#D1A748] shadow-sm">
                        <i class="fa-solid fa-comments text-[#D1A748] text-2xl"></i>
                        <div>
                            <div class="font-bold text-[#0E1928]">Sem Juridiquês</div>
                            <div class="text-slate-500 text-xs">Explicação simples do seu caso</div>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="https://wa.me/5562981365011?text=Olá,%20Dr.%20Jorge!%20Gostaria%20de%20conhecer%20mais%20sobre%20seu%20trabalho." target="_blank" class="inline-flex items-center gap-2 text-[#B38B2F] hover:text-[#D1A748] font-bold text-sm">
                        <span>Converse com o Dr. Jorge Santos no WhatsApp</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $sobre_html, 'Seção Sobre o Advogado' );

// 10. PERGUNTAS FREQUENTES (FAQ)
$faq_html = <<<HTML
<section id="faq" class="py-16 md:py-24 bg-white border-t border-slate-200 font-sans">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-xs font-bold uppercase tracking-widest text-[#B38B2F]">Tire Suas Dúvidas</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0E1928] mt-2">Perguntas Frequentes</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">Respostas diretas para as principais dúvidas dos nossos clientes.</p>
        </div>

        <div class="space-y-3.5" id="faqAccordion">
            
            <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
                <button class="faq-toggle active-accordion w-full p-5 text-left font-bold text-sm sm:text-base flex justify-between items-center bg-[#0E1928] text-white">
                    <span>Como falar com um advogado em Goiânia?</span>
                    <i class="fa-solid fa-chevron-up text-[#D1A748]"></i>
                </button>
                <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed bg-white">
                    Você pode entrar em contato diretamente pelo <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20falar%20com%20o%20Dr.%20Jorge%20Santos." target="_blank" class="text-[#25D366] hover:underline font-bold inline-flex items-center gap-1"><i class="fa-brands fa-whatsapp text-sm"></i> WhatsApp (62) 98136-5011</a> e explicar resumidamente o que aconteceu. Nossa equipe dará o retorno rapidamente.
                </div>
            </div>

            <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
                <button class="w-full p-5 text-left font-bold text-sm sm:text-base flex justify-between items-center text-[#0E1928] hover:text-[#B38B2F] bg-white">
                    <span>Comprei um lote e me arrependi. Posso cancelar o contrato?</span>
                    <i class="fa-solid fa-chevron-down text-[#D1A748]"></i>
                </button>
                <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed bg-white">
                    Sim. É possível solicitar o distrato imobiliário. O contrato precisa ser analisado para calcular a quantia correta a ser devolvida pela loteadora e combater retenções abusivas. <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-bold">Fale no WhatsApp</a>.
                </div>
            </div>

            <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
                <button class="w-full p-5 text-left font-bold text-sm sm:text-base flex justify-between items-center text-[#0E1928] hover:text-[#B38B2F] bg-white">
                    <span>A construtora atrasou a entrega do imóvel. Quais são os meus direitos?</span>
                    <i class="fa-solid fa-chevron-down text-[#D1A748]"></i>
                </button>
                <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed bg-white">
                    Em caso de atraso injustificado na entrega de casa, apartamento na planta ou condomínio/loteamento, o comprador pode requerer a rescisão contratual com devolução integral de valores, ou indenização pelos prejuízos causados pelo atraso. <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-bold">Tire suas dúvidas no WhatsApp</a>.
                </div>
            </div>

            <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
                <button class="w-full p-5 text-left font-bold text-sm sm:text-base flex justify-between items-center text-[#0E1928] hover:text-[#B38B2F] bg-white">
                    <span>Como funciona o atendimento para Associações de Proteção Veicular?</span>
                    <i class="fa-solid fa-chevron-down text-[#D1A748]"></i>
                </button>
                <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed bg-white">
                    Prestamos suporte consultivo integral (elaboração de estatutos e regulamentos) e defesa jurídica especializada em processos judiciais de acidentes, perda total, furto, roubo e negativas regulamentares. <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-bold">Solicitar consultoria</a>.
                </div>
            </div>

            <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
                <button class="w-full p-5 text-left font-bold text-sm sm:text-base flex justify-between items-center text-[#0E1928] hover:text-[#B38B2F] bg-white">
                    <span>O escritório atende causas trabalhistas e de família?</span>
                    <i class="fa-solid fa-chevron-down text-[#D1A748]"></i>
                </button>
                <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed bg-white">
                    Sim! Atuamos em rescisões, horas extras, reconhecimento de vínculo e defesa de empresas no Direito Trabalhista, bem como divórcios (consensual e litigioso), pensão, guarda e inventários no Direito de Família e Sucessões.
                </div>
            </div>

            <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
                <button class="w-full p-5 text-left font-bold text-sm sm:text-base flex justify-between items-center text-[#0E1928] hover:text-[#B38B2F] bg-white">
                    <span>O atendimento pode ser feito totalmente online?</span>
                    <i class="fa-solid fa-chevron-down text-[#D1A748]"></i>
                </button>
                <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed bg-white">
                    Sim! Atendemos presencialmente em Goiânia e também de forma 100% digital e segura via <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-bold">WhatsApp</a>, chamada de vídeo e <a href="mailto:jorgesantosadvocacia@gmail.com" class="text-[#B38B2F] hover:underline font-bold">e-mail</a> para clientes de todo o estado de Goiás e do Brasil.
                </div>
            </div>

        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $faq_html, 'Seção Perguntas Frequentes' );

// 11. FORMULÁRIO DE CONTATO
$contato_html = <<<HTML
<section id="contato" class="py-16 md:py-24 bg-[#F8F9FB] border-t border-slate-200 font-sans">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 sm:p-12 rounded-3xl border-2 border-[#D1A748]/30 shadow-xl">
            <div class="text-center max-w-xl mx-auto mb-8">
                <span class="text-xs font-bold uppercase tracking-widest text-[#B38B2F]">Atendimento Rápido</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0E1928] mt-1">Envie uma Mensagem Direta</h2>
                <p class="text-slate-600 text-xs sm:text-sm mt-2">Preencha os campos abaixo para abrir a conversa no <a href="https://wa.me/5562981365011" target="_blank" class="text-[#25D366] hover:underline font-bold">WhatsApp</a> com os dados do seu caso prontos.</p>
            </div>

            <form onsubmit="event.preventDefault(); const n=document.getElementById('fName').value; const p=document.getElementById('fPhone').value; const a=document.getElementById('fArea').value; const m=document.getElementById('fMsg').value; let t='Olá, Dr. Jorge Santos!\\nMeu nome é *'+n+'*.\\nWhatsApp: *'+p+'*\\nÁrea: *'+a+'*\\n'+(m?'Situação: '+m+'\\n':'')+'Gostaria de orientação.'; window.open('https://wa.me/5562981365011?text='+encodeURIComponent(t),'_blank');" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#0E1928] mb-1">Seu Nome Completo</label>
                        <input type="text" id="fName" required placeholder="Ex: João da Silva" class="w-full bg-[#F8F9FB] border border-slate-300 rounded-lg px-4 py-3 text-sm text-[#0E1928] focus:outline-none focus:border-[#D1A748]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#0E1928] mb-1">Seu WhatsApp / Telefone</label>
                        <input type="tel" id="fPhone" required placeholder="Ex: (62) 99999-9999" class="w-full bg-[#F8F9FB] border border-slate-300 rounded-lg px-4 py-3 text-sm text-[#0E1928] focus:outline-none focus:border-[#D1A748]">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#0E1928] mb-1">Seu E-mail (Opcional)</label>
                        <input type="email" placeholder="Ex: seuemail@gmail.com" class="w-full bg-[#F8F9FB] border border-slate-300 rounded-lg px-4 py-3 text-sm text-[#0E1928] focus:outline-none focus:border-[#D1A748]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#0E1928] mb-1">Área de Interesse</label>
                        <select id="fArea" class="w-full bg-[#F8F9FB] border border-slate-300 rounded-lg px-4 py-3 text-sm text-[#0E1928] focus:outline-none focus:border-[#D1A748] font-medium">
                            <option value="Distrato de Lote / Direito Imobiliário">Distrato de Lote / Direito Imobiliário</option>
                            <option value="Associação de Proteção Veicular">Associação de Proteção Veicular</option>
                            <option value="Direito Trabalhista">Direito Trabalhista</option>
                            <option value="Divórcio e Direito de Família">Divórcio e Direito de Família</option>
                            <option value="Inventário e Sucessões">Inventário e Sucessões</option>
                            <option value="Civil, Contratos ou Cobranças">Civil, Contratos ou Cobranças</option>
                            <option value="Outra Área">Outra Área</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#0E1928] mb-1">Conte Resumidamente o que Aconteceu</label>
                    <textarea id="fMsg" rows="3" placeholder="Explique resumidamente sua dúvida ou situação..." class="w-full bg-[#F8F9FB] border border-slate-300 rounded-lg px-4 py-3 text-sm text-[#0E1928] focus:outline-none focus:border-[#D1A748]"></textarea>
                </div>

                <button type="submit" class="w-full bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold py-4 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2 text-base">
                    <i class="fa-brands fa-whatsapp text-2xl"></i> Enviar Mensagem para o WhatsApp do Escritório
                </button>
            </form>
        </div>
    </div>
</section>
HTML;
$elements[] = create_html_section( $contato_html, 'Seção Formulário de Contato' );

// 12. RODAPÉ
$footer_html = <<<HTML
<footer class="bg-[#0E1928] border-t border-[#1B2C42] pt-16 pb-12 text-slate-300 text-xs font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
            
            <div class="space-y-4">
                <img src="{$logo_url}" alt="Jorge Santos Advocacia" class="h-12 w-auto bg-white p-1.5 rounded-lg shadow-sm">
                <p class="text-xs leading-relaxed text-slate-300">
                    Atendimento jurídico humanizado e focado em soluções práticas para pessoas, famílias, empresas e associações de proteção veicular em Goiânia e região.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="https://www.instagram.com/goiania.advogado" target="_blank" class="w-8 h-8 rounded-full bg-[#1B2C42] hover:bg-[#D1A748] hover:text-[#0E1928] flex items-center justify-center text-white transition-colors" title="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://web.facebook.com/jorgesantosadvogadogoiania" target="_blank" class="w-8 h-8 rounded-full bg-[#1B2C42] hover:bg-[#D1A748] hover:text-[#0E1928] flex items-center justify-center text-white transition-colors" title="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://wa.me/5562981365011" target="_blank" class="w-8 h-8 rounded-full bg-[#1B2C42] hover:bg-[#25D366] hover:text-white flex items-center justify-center text-white transition-colors" title="WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold text-sm mb-4 border-b border-[#D1A748]/40 pb-2 inline-block">Navegação</h4>
                <ul class="space-y-2">
                    <li><a href="#inicio" class="hover:text-[#D1A748] transition-colors">Início</a></li>
                    <li><a href="#areas" class="hover:text-[#D1A748] transition-colors">Áreas de Atuação</a></li>
                    <li><a href="#distrato" class="hover:text-[#D1A748] transition-colors">Distrato de Lote</a></li>
                    <li><a href="#protecao-veicular" class="hover:text-[#D1A748] transition-colors">Proteção Veicular</a></li>
                    <li><a href="#sobre" class="hover:text-[#D1A748] transition-colors">Sobre o Advogado</a></li>
                    <li><a href="#faq" class="hover:text-[#D1A748] transition-colors">Perguntas Frequentes</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold text-sm mb-4 border-b border-[#D1A748]/40 pb-2 inline-block">Atuação em Goiânia</h4>
                <ul class="space-y-2 text-slate-300">
                    <li>Advogado Trabalhista Goiânia</li>
                    <li>Distrato de Lote Goiânia</li>
                    <li>Imóvel na Planta Atrasado</li>
                    <li>Associações de Proteção Veicular</li>
                    <li>Divórcio e Família em Goiânia</li>
                    <li>Inventário e Partilha de Bens</li>
                    <li>Cobranças e Contratos Cíveis</li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-white font-bold text-sm mb-4 border-b border-[#D1A748]/40 pb-2 inline-block">Fale Conosco</h4>
                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-[#D1A748]"></i> Goiânia - GO
                </p>
                <p>
                    <a href="https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20uma%20orientação%20com%20o%20Dr.%20Jorge%20Santos." target="_blank" class="flex items-center gap-2 hover:text-[#25D366] hover:underline transition-colors text-slate-300 font-semibold">
                        <i class="fa-brands fa-whatsapp text-[#25D366] text-sm"></i> (62) 98136-5011
                    </a>
                </p>
                <p>
                    <a href="mailto:jorgesantosadvocacia@gmail.com" class="flex items-center gap-2 hover:text-[#D1A748] hover:underline transition-colors text-slate-300 font-medium break-all">
                        <i class="fa-regular fa-envelope text-[#D1A748] text-sm"></i> jorgesantosadvocacia@gmail.com
                    </a>
                </p>
                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-clock text-[#D1A748]"></i> Seg a Sex: 08h às 18h
                </p>
            </div>

        </div>

        <div class="border-t border-[#1B2C42] pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-400 text-[11px]">
            <p>&copy; 2026 Jorge Santos Advocacia. Todos os direitos reservados. Goiânia - GO.</p>
            <p class="text-slate-400">OAB/GO | Atuação em conformidade com o Código de Ética e Disciplina da OAB.</p>
        </div>
    </div>
</footer>
HTML;
$elements[] = create_html_section( $footer_html, 'Rodapé Completo' );

// Salva os dados no formato nativo do Elementor
$json_data = json_encode( $elements );
update_post_meta( $page_id, '_elementor_data', wp_slash( $json_data ) );
update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
update_post_meta( $page_id, '_elementor_version', ELEMENTOR_VERSION );

echo "Página ID {$page_id} atualizada com 100% da fidelidade e todas as seções ricas no Elementor!\n";
