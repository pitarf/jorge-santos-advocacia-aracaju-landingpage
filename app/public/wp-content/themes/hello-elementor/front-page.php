<?php
/**
 * Template Name: Landing Page - Jorge Santos Advocacia (Oficial Dinâmico)
 * Description: Landing Page de alta conversão integrada à tela padrão "Editar Página" do WordPress, microinterações, foco em Aracaju / Sergipe e animações suaves.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id = get_the_ID();

// Identidade Visual & Branding (Dinâmicos via Metabox ou Jorge Santos SEO)
$header_logo = get_post_meta( $post_id, 'jsa_header_logo', true ) ?: get_option( 'jsa_header_logo', get_template_directory_uri() . '/assets/images/logo_jfs_quadrada_nobre.jpg' );
$footer_logo = get_post_meta( $post_id, 'jsa_footer_logo', true ) ?: get_option( 'jsa_footer_logo', get_template_directory_uri() . '/assets/images/logo_jfs_quadrada_nobre.jpg' );
$custom_favicon = get_post_meta( $post_id, 'jsa_custom_favicon', true ) ?: get_option( 'jsa_custom_favicon', get_template_directory_uri() . '/assets/images/favicon-32x32.png' );
$custom_favicon_192 = get_template_directory_uri() . '/assets/images/favicon-192x192.png';
$custom_apple_icon = get_template_directory_uri() . '/assets/images/apple-touch-icon.png';

// Dados Dinâmicos da Página - Padrão Aracaju / SE
$hero_badge = get_post_meta( $post_id, 'jsa_hero_badge', true ) ?: 'Advocacia Especializada em Aracaju - SE';
$hero_title = get_post_meta( $post_id, 'jsa_hero_title', true ) ?: 'Precisa de <span class="gold-gradient-text">Advogado em Aracaju?</span>';
$hero_subtitle = get_post_meta( $post_id, 'jsa_hero_subtitle', true ) ?: 'Atendimento jurídico para quem precisa tomar uma decisão com segurança. A <strong class="text-brand-navy font-semibold">Jorge Santos Advocacia e Consultoria Jurídica</strong> presta atendimento estratégico para pessoas e empresas em demandas trabalhistas, divórcio, Direito Imobiliário, Direito Empresarial e Inventário em Sergipe.';
$hero_cta_text = get_post_meta( $post_id, 'jsa_hero_cta_text', true ) ?: 'Falar com o Advogado no WhatsApp';
$hero_cta_link = get_post_meta( $post_id, 'jsa_hero_cta_link', true ) ?: 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+atendimento+jur%C3%ADdico+em+Aracaju.';
$hero_image = get_post_meta( $post_id, 'jsa_hero_image', true ) ?: home_url( '/wp-content/uploads/2026/08/foto-1.jpeg' );

// Contatos Oficiais
$contact_phone = get_post_meta( $post_id, 'jsa_contact_phone', true ) ?: '(79) 99920-2205';
$contact_email = get_post_meta( $post_id, 'jsa_contact_email', true ) ?: 'contato@advogadoonlinearacaju.com.br';
$contact_address = get_post_meta( $post_id, 'jsa_contact_address', true ) ?: 'Aracaju - SE';
$contact_instagram = get_post_meta( $post_id, 'jsa_contact_instagram', true ) ?: 'https://www.instagram.com/advogado.online.aracaju';
$contact_facebook = get_post_meta( $post_id, 'jsa_contact_facebook', true ) ?: 'https://web.facebook.com/profile.php?id=61594068069533';

// Seção Atendimento Jurídico em Aracaju
$atendimento_badge = get_post_meta( $post_id, 'jsa_atendimento_badge', true ) ?: 'Atendimento Jurídico em Aracaju';
$atendimento_title = get_post_meta( $post_id, 'jsa_atendimento_title', true ) ?: 'Nem todo problema precisa se transformar em um processo longo';
$atendimento_desc = get_post_meta( $post_id, 'jsa_atendimento_desc', true ) ?: 'Em muitos casos, uma orientação jurídica adequada desde o início pode evitar decisões precipitadas, reduzir riscos e indicar o caminho mais adequado para solucionar a situação.';

// Seção Análise Individual
$analise_badge = get_post_meta( $post_id, 'jsa_analise_badge', true ) ?: 'Análise Jurídica Personalizada';
$analise_title = get_post_meta( $post_id, 'jsa_analise_title', true ) ?: 'Seu Caso Precisa de uma Análise Individual';
$analise_desc = get_post_meta( $post_id, 'jsa_analise_desc', true ) ?: 'Na advocacia, situações aparentemente semelhantes podem ter resultados jurídicos completamente diferentes. Um documento, uma cláusula contratual, uma data, uma mensagem ou um pagamento específico pode alterar significativamente a análise.';

// Sobre
$sobre_title = get_post_meta( $post_id, 'jsa_sobre_title', true ) ?: 'Advocacia Estratégica para Pessoas e Empresas em Aracaju';
$sobre_text1 = get_post_meta( $post_id, 'jsa_sobre_text1', true ) ?: 'A atuação jurídica não deve se limitar à elaboração de petições. Um atendimento jurídico eficiente começa pela compreensão do problema.';
$sobre_text2 = get_post_meta( $post_id, 'jsa_sobre_text2', true ) ?: 'A Jorge Santos Advocacia e Consultoria Jurídica atua de maneira consultiva, preventiva, extrajudicial e judicial. Cada situação é analisada de forma individual, considerando os documentos apresentados, os riscos envolvidos e as medidas juridicamente possíveis.';
$sobre_image = get_post_meta( $post_id, 'jsa_sobre_image', true ) ?: home_url( '/wp-content/uploads/2026/08/foto-3.jpeg' );

?>
<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon Oficial JS Dourado (Dinâmico & Anti-Cache) -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( $custom_favicon . ( strpos( $custom_favicon, '?' ) === false ? '?v=' . time() : '' ) ); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( $custom_favicon_192 . ( strpos( $custom_favicon_192, '?' ) === false ? '?v=' . time() : '' ) ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( $custom_apple_icon . ( strpos( $custom_apple_icon, '?' ) === false ? '?v=' . time() : '' ) ); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url( $custom_favicon . ( strpos( $custom_favicon, '?' ) === false ? '?v=' . time() : '' ) ); ?>">

    <!-- Core Web Vitals: Preload da Imagem LCP (Hero) -->
    <link rel="preload" as="image" href="<?php echo esc_url( $hero_image ); ?>" fetchpriority="high">

    <!-- Google Fonts: Plus Jakarta Sans, Cinzel, Playfair & Libre Baskerville com font-display: swap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS (Animate On Scroll) CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            gold: '#D1A748',
                            goldLight: '#E8C87A',
                            goldDark: '#B38B2F',
                            navy: '#0E1928',
                            navyLight: '#1B2C42',
                            dark: '#111827',
                            slate: '#334155',
                            muted: '#64748B',
                            bgLight: '#F8F9FB',
                            cardBg: '#FFFFFF',
                        },
                        accent: {
                            green: '#25D366',
                            hoverGreen: '#1EBE5D'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Cinzel"', '"Playfair Display"', 'serif'],
                        baskerville: ['"Libre Baskerville"', 'serif'],
                    }
                }
            }
        }
    </script>
    <!-- Theme CSS -->
    <?php wp_head(); ?>
    <style id="custom-responsive-fix">
        /* Prevenção e contenção absoluta de overflow horizontal em qualquer dispositivo móvel */
        html {
            overflow-x: hidden !important;
            max-width: 100% !important;
            width: 100% !important;
        }
        body {
            overflow-x: hidden !important;
            max-width: 100% !important;
            width: 100% !important;
            position: relative !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .lp-site-wrapper {
            overflow-x: hidden !important;
            width: 100% !important;
            max-width: 100% !important;
            position: relative !important;
        }
        *, *::before, *::after {
            box-sizing: border-box !important;
        }
        img, svg, video, canvas, audio, iframe, embed, object {
            max-width: 100% !important;
            height: auto;
        }

        .gold-gradient-bg {
            background: linear-gradient(135deg, #E2BD63 0%, #D1A748 50%, #B38B2F 100%);
        }
        .gold-gradient-text {
            background: linear-gradient(135deg, #C29334 0%, #E2BD63 50%, #B38B2F 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gold-border-left {
            border-left: 4px solid #D1A748;
        }
        .hero-light-glow {
            background: radial-gradient(circle at 85% 20%, rgba(209, 167, 72, 0.08) 0%, transparent 60%),
                        radial-gradient(circle at 10% 80%, rgba(14, 25, 40, 0.03) 0%, transparent 60%);
        }
        
        /* Interações suaves de hover e flutuação nos cards */
        .card-hover-effect {
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.35s ease;
        }
        .card-hover-effect:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px -8px rgba(14, 25, 40, 0.12), 0 4px 12px -2px rgba(209, 167, 72, 0.1);
            border-color: rgba(209, 167, 72, 0.6);
        }
        .card-hover-effect .card-icon-zoom {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-hover-effect:hover .card-icon-zoom {
            transform: scale(1.12);
        }

        .card-premium {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.35s ease;
        }
        .card-premium:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px -8px rgba(14, 25, 40, 0.12), 0 4px 12px -2px rgba(209, 167, 72, 0.1);
            border-color: rgba(209, 167, 72, 0.6);
        }
        .card-premium .card-icon-zoom {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-premium:hover .card-icon-zoom {
            transform: scale(1.12);
        }

        .faq-item {
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            overflow: hidden;
            background: #FFFFFF;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .faq-item:hover {
            border-color: #D1A748;
            box-shadow: 0 4px 12px rgba(14, 25, 40, 0.04);
        }
        .faq-toggle {
            background: #FFFFFF;
            color: #0E1928;
            transition: background 0.2s ease, color 0.2s ease;
        }
        .faq-toggle:hover {
            background: #FAFBFD;
            color: #D1A748;
        }
        .faq-toggle.active-accordion {
            background: #0E1928 !important;
            color: #FFFFFF !important;
        }
        .faq-toggle.active-accordion i {
            color: #D1A748 !important;
            transform: rotate(180deg);
        }
        .faq-content {
            background: #FFFFFF;
            color: #475569;
        }

        .floating-wa-btn {
            animation: pulse-wa 2s infinite;
        }
        @keyframes pulse-wa {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6); }
            70% { box-shadow: 0 0 0 16px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* Botão do Menu Mobile (Zero Rosa / 100% Navy & Gold) */
        #mobileMenuBtn,
        button#mobileMenuBtn {
            background: #FFFFFF !important;
            background-color: #FFFFFF !important;
            border: 1px solid #E2E8F0 !important;
            color: #0E1928 !important;
            outline: none !important;
            box-shadow: 0 1px 3px rgba(14, 25, 40, 0.05) !important;
            border-radius: 8px !important;
            padding: 8px 12px !important;
        }
        #mobileMenuBtn:hover,
        #mobileMenuBtn:focus,
        #mobileMenuBtn:active {
            background-color: #F8FAFC !important;
            border-color: #D1A748 !important;
            color: #D1A748 !important;
            outline: none !important;
            box-shadow: 0 2px 8px rgba(209, 167, 72, 0.15) !important;
        }
        #mobileMenuBtn i {
            color: #0E1928 !important;
        }
        #mobileMenuBtn:hover i,
        #mobileMenuBtn:focus i {
            color: #D1A748 !important;
        }
    </style>
</head>
<body <?php body_class( 'bg-brand-bgLight text-brand-slate font-sans antialiased selection:bg-brand-gold selection:text-white' ); ?>>
<?php wp_body_open(); ?>

<div class="lp-site-wrapper">

    <!-- BARRA SUPERIOR DE CONTATO -->
    <div class="bg-white border-b border-slate-200 text-xs py-2.5 px-4 shadow-sm" data-aos="fade-down" data-aos-duration="600">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 text-brand-slate">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-location-dot text-brand-gold"></i> <strong class="text-brand-dark"><?php echo esc_html( $contact_address ); ?></strong> e todo o Estado de Sergipe</span>
                <span class="hidden md:inline text-slate-300">|</span>
                <span class="hidden md:flex items-center gap-1.5"><i class="fa-solid fa-clock text-brand-gold"></i> Atendimento Seg a Sex: 08h às 18h</span>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4 text-center sm:text-right">
                <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="text-accent-green hover:underline flex items-center gap-1.5 font-bold transition-transform hover:scale-105">
                    <i class="fa-brands fa-whatsapp text-sm shrink-0"></i> <span><?php echo esc_html( $contact_phone ); ?></span>
                </a>
                <span class="text-slate-300">|</span>
                <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="hover:text-brand-goldDark hover:underline transition-colors flex items-center gap-1.5 text-slate-600 font-medium break-all">
                    <i class="fa-regular fa-envelope text-brand-gold shrink-0"></i> <span><?php echo esc_html( $contact_email ); ?></span>
                </a>
            </div>
        </div>
    </div>

    <!-- NAVBAR PRINCIPAL -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm transition-all" data-aos="fade-down" data-aos-duration="600" data-aos-delay="100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- LOGOMARCA OFICIAL ARACAJU -->
                <a href="#" class="flex items-center gap-2.5 sm:gap-3 shrink min-w-0 group">
                    <img src="<?php echo esc_url( $header_logo ); ?>" alt="Jorge Santos Advocacia e Consultoria Jurídica - Aracaju / SE" title="Jorge Santos Advocacia - Aracaju" class="h-12 sm:h-14 md:h-16 w-12 sm:w-14 md:w-16 max-h-12 sm:max-h-14 md:max-h-16 max-w-12 sm:max-w-14 md:max-w-16 shrink-0 object-contain rounded-lg shadow-sm border border-brand-gold/30 transition-transform group-hover:scale-105" style="width: 50px !important; height: 50px !important; max-width: 50px !important; max-height: 50px !important; object-fit: contain !important;">
                    <div class="flex flex-col justify-center shrink min-w-0 font-baskerville">
                        <span class="text-base sm:text-lg md:text-xl font-bold tracking-normal text-brand-navy leading-tight whitespace-nowrap">Jorge Santos</span>
                        <span class="text-xs sm:text-sm font-normal tracking-normal text-brand-navy leading-tight whitespace-nowrap">Advocacia</span>
                    </div>
                </a>

                <!-- NAVEGAÇÃO DESKTOP -->
                <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-brand-dark">
                    <a href="#inicio" class="hover:text-brand-goldDark transition-colors">Início</a>
                    <a href="#atendimento" class="hover:text-brand-goldDark transition-colors">Atendimento</a>
                    <a href="#areas" class="hover:text-brand-goldDark transition-colors">Como Podemos Ajudar</a>
                    <a href="#analise" class="hover:text-brand-goldDark transition-colors">Análise Individual</a>
                    <a href="#sobre" class="hover:text-brand-goldDark transition-colors">O Escritório</a>
                    <a href="#faq" class="hover:text-brand-goldDark transition-colors">Dúvidas</a>
                </nav>

                <!-- BOTÃO CTA HEADER -->
                <div class="hidden sm:flex items-center gap-3">
                    <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="bg-accent-green hover:bg-accent-hoverGreen text-white font-bold text-sm px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 whitespace-nowrap">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Falar no WhatsApp</span>
                    </a>
                </div>

                <!-- MENU MOBILE TRIGGER -->
                <button id="mobileMenuBtn" class="lg:hidden bg-white text-brand-navy hover:text-brand-gold hover:border-brand-gold border border-slate-200 p-2.5 rounded-lg text-xl shadow-sm transition-all focus:outline-none" aria-label="Abrir Menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- MENU MOBILE DROPDOWN -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3 shadow-lg">
            <a href="#inicio" class="block py-2 text-brand-dark font-medium hover:text-brand-gold border-b border-slate-100">Início</a>
            <a href="#atendimento" class="block py-2 text-brand-dark font-medium hover:text-brand-gold border-b border-slate-100">Atendimento</a>
            <a href="#areas" class="block py-2 text-brand-dark font-medium hover:text-brand-gold border-b border-slate-100">Como Podemos Ajudar</a>
            <a href="#analise" class="block py-2 text-brand-dark font-medium hover:text-brand-gold border-b border-slate-100">Análise Individual</a>
            <a href="#sobre" class="block py-2 text-brand-dark font-medium hover:text-brand-gold border-b border-slate-100">O Escritório</a>
            <a href="#faq" class="block py-2 text-brand-dark font-medium hover:text-brand-gold border-b border-slate-100">Perguntas Frequentes</a>
            <div class="pt-3">
                <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="w-full bg-accent-green text-white font-bold text-center py-3 px-4 rounded-lg flex items-center justify-center gap-2 shadow-md">
                    <i class="fa-brands fa-whatsapp text-lg shrink-0"></i> <span>Falar pelo WhatsApp Agora</span>
                </a>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section id="inicio" class="relative pt-12 pb-20 md:pt-16 md:pb-24 overflow-hidden hero-light-glow bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- COLUNA ESQUERDA: TEXTO E CTA (ANIMADO FADE-RIGHT) -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left" data-aos="fade-right" data-aos-duration="800">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-50 border border-brand-gold/40 text-brand-goldDark text-xs font-bold uppercase tracking-wider" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fa-solid fa-scale-balanced text-brand-gold"></i>
                        <span><?php echo esc_html( $hero_badge ); ?></span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-brand-navy tracking-tight leading-tight">
                        <?php echo wp_kses_post( $hero_title ); ?>
                    </h1>

                    <div class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                        <?php echo wp_kses_post( $hero_subtitle ); ?>
                    </div>

                    <!-- BULLETS DE CONFIANÇA -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2 text-left text-xs sm:text-sm text-slate-700">
                        <div class="flex items-center gap-2 font-medium" data-aos="fade-up" data-aos-delay="300">
                            <i class="fa-solid fa-circle-check text-brand-gold"></i>
                            <span>Análise Técnica e Ética</span>
                        </div>
                        <div class="flex items-center gap-2 font-medium" data-aos="fade-up" data-aos-delay="400">
                            <i class="fa-solid fa-circle-check text-brand-gold"></i>
                            <span>Estratégia Jurídica Clara</span>
                        </div>
                        <div class="flex items-center gap-2 font-medium" data-aos="fade-up" data-aos-delay="500">
                            <i class="fa-solid fa-circle-check text-brand-gold"></i>
                            <span>Sigilo Absoluto</span>
                        </div>
                    </div>

                    <!-- BOTÕES DE AÇÃO HERO -->
                    <div class="pt-4 flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 sm:gap-4 w-full" data-aos="fade-up" data-aos-delay="400">
                        <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="w-full sm:w-auto bg-accent-green hover:bg-accent-hoverGreen text-white font-bold text-sm sm:text-base px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl shadow-lg hover:shadow-green-500/25 transition-all duration-300 flex items-center justify-center gap-3 transform hover:scale-105 text-center">
                            <i class="fa-brands fa-whatsapp text-2xl shrink-0"></i>
                            <div class="text-left leading-tight">
                                <span class="block text-[10px] sm:text-[11px] uppercase tracking-wider font-semibold opacity-95">Atendimento Imediato</span>
                                <span><?php echo esc_html( $hero_cta_text ); ?></span>
                            </div>
                        </a>
                        <a href="#areas" class="w-full sm:w-auto px-5 sm:px-6 py-3.5 sm:py-4 rounded-xl border-2 border-slate-300 hover:border-brand-gold bg-white hover:bg-slate-50 text-brand-navy font-bold text-sm sm:text-base text-center transition-all duration-200 shadow-sm hover:scale-105">
                            Como Podemos Ajudar
                        </a>
                    </div>

                    <p class="text-xs text-slate-500 italic">
                        * Atendimento direto para clientes de Aracaju e Sergipe via <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="text-accent-green hover:underline font-semibold">WhatsApp (79) 99920-2205</a>.
                    </p>
                </div>

                <!-- COLUNA DIREITA: FOTO DO ADVOGADO (ANIMADO FADE-LEFT) -->
                <div class="lg:col-span-5 relative flex justify-center" data-aos="fade-left" data-aos-duration="800">
                    <div class="relative w-full max-w-md">
                        <div class="relative rounded-2xl overflow-hidden border-4 border-brand-gold/30 shadow-2xl bg-white">
                            <img src="<?php echo esc_url( $hero_image ); ?>" alt="Dr. Jorge Santos - Advogado Especialista em Aracaju e Sergipe" title="Dr. Jorge Santos Advogado Aracaju" fetchpriority="high" loading="eager" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-navy/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 p-3 bg-white/95 backdrop-blur-md rounded-xl shadow-md border-l-4 border-brand-gold">
                                <div class="font-bold text-brand-navy text-base">Dr. Jorge Santos</div>
                                <div class="text-xs text-brand-goldDark font-semibold">Advocacia & Consultoria Jurídica em Aracaju</div>
                            </div>
                        </div>

                        <!-- Card Flutuante 1: Avaliação / Segurança -->
                        <div class="absolute -top-3 left-0 sm:-top-4 sm:-left-6 bg-white p-2.5 sm:p-3 rounded-xl shadow-xl border border-slate-200 flex items-center gap-2.5 sm:gap-3 card-hover-effect cursor-pointer max-w-[85%]" data-aos="zoom-in" data-aos-delay="400">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-amber-50 text-brand-gold flex items-center justify-center font-bold text-sm sm:text-lg card-icon-zoom shrink-0">
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div>
                                <div class="text-[10px] sm:text-xs text-slate-500 font-medium">Excelência & Discrição</div>
                                <div class="text-xs sm:text-sm font-bold text-brand-navy flex items-center gap-1">
                                    5.0 <span class="text-amber-400 text-[10px] sm:text-xs">★★★★★</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Flutuante 2: Atendimento Seguro -->
                        <div class="absolute -bottom-4 right-0 sm:-bottom-6 sm:-right-6 bg-white p-2.5 sm:p-3 rounded-xl shadow-xl border border-slate-200 flex items-center gap-2.5 sm:gap-3 card-hover-effect cursor-pointer max-w-[85%]" data-aos="zoom-in" data-aos-delay="600">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-emerald-50 text-accent-green flex items-center justify-center font-bold text-sm sm:text-lg card-icon-zoom shrink-0">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div>
                                <div class="text-[10px] sm:text-xs text-slate-500 font-medium">Atendimento Seguro</div>
                                <div class="text-xs sm:text-sm font-bold text-brand-navy">100% Individualizado</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAIXA DE DESTAQUES (ANIMADO FADE-UP) -->
    <div class="bg-brand-navy py-6 px-4 text-white" data-aos="fade-up" data-aos-duration="600">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="p-2 border-r border-brand-navyLight/60 last:border-none" data-aos="fade-up" data-aos-delay="100">
                <div class="text-2xl sm:text-3xl font-extrabold text-brand-gold">Análise Técnica</div>
                <div class="text-xs sm:text-sm text-slate-300 mt-1">Antes de qualquer decisão</div>
            </div>
            <div class="p-2 border-r border-brand-navyLight/60 last:border-none" data-aos="fade-up" data-aos-delay="200">
                <div class="text-2xl sm:text-3xl font-extrabold text-white"><?php echo esc_html( $contact_address ); ?></div>
                <div class="text-xs sm:text-sm text-slate-300 mt-1">Atendimento Presencial e Online</div>
            </div>
            <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="p-2 border-r border-brand-navyLight/60 last:border-none hover:bg-brand-navyLight/60 rounded-lg transition-colors group block" data-aos="fade-up" data-aos-delay="300">
                <div class="text-xl sm:text-2xl md:text-3xl font-extrabold text-accent-green group-hover:underline flex items-center justify-center gap-1.5 flex-wrap">
                    <i class="fa-brands fa-whatsapp text-xl sm:text-2xl"></i> <span>WhatsApp Direto</span>
                </div>
                <div class="text-xs sm:text-sm text-slate-300 mt-1">Clique para Resposta Ágil</div>
            </a>
            <div class="p-2" data-aos="fade-up" data-aos-delay="400">
                <div class="text-2xl sm:text-3xl font-extrabold text-brand-gold">Foco Estratégico</div>
                <div class="text-xs sm:text-sm text-slate-300 mt-1">Prevenção e Solução</div>
            </div>
        </div>
    </div>

    <!-- SEÇÃO ATENDIMENTO JURÍDICO EM ARACAJU -->
    <section id="atendimento" class="py-16 md:py-24 bg-brand-bgLight relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
                <h2 class="text-xs font-bold uppercase tracking-widest text-brand-goldDark mb-2"><?php echo esc_html( $atendimento_badge ); ?></h2>
                <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-brand-navy"><?php echo esc_html( $atendimento_title ); ?></p>
                <p class="text-slate-600 text-sm sm:text-base mt-3">
                    <?php echo esc_html( $atendimento_desc ); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="card-premium p-6 rounded-2xl gold-border-left" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-brand-gold flex items-center justify-center text-xl mb-4 card-icon-zoom">
                        <i class="fa-solid fa-scale-unbalanced-flip"></i>
                    </div>
                    <h3 class="text-lg font-bold text-brand-navy mb-2">Compreender Seus Direitos e Deveres</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Entenda exatamente quais são os seus direitos, obrigações legais e o que a legislação prevê para o seu caso específico em Aracaju.
                    </p>
                </div>

                <div class="card-premium p-6 rounded-2xl gold-border-left" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-brand-gold flex items-center justify-center text-xl mb-4 card-icon-zoom">
                        <i class="fa-solid fa-file-shield"></i>
                    </div>
                    <h3 class="text-lg font-bold text-brand-navy mb-2">Organizar Documentos e Provas</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Identificar quais documentos, contratos, comprovantes e mensagens são cruciais antes de tomar qualquer atitude.
                    </p>
                </div>

                <div class="card-premium p-6 rounded-2xl gold-border-left" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-brand-gold flex items-center justify-center text-xl mb-4 card-icon-zoom">
                        <i class="fa-solid fa-compass"></i>
                    </div>
                    <h3 class="text-lg font-bold text-brand-navy mb-2">Planejamento e Estratégia</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Avaliar quais riscos existem, quais medidas judiciais ou extrajudiciais podem ser adotadas e traçar o melhor plano de ação.
                    </p>
                </div>

            </div>

            <!-- CTA BANNER INTERMEDIÁRIO -->
            <div class="mt-12 p-6 sm:p-8 rounded-2xl bg-white border-2 border-brand-gold/30 shadow-md flex flex-col md:flex-row items-center justify-between gap-6" data-aos="zoom-in" data-aos-duration="700">
                <div class="text-center md:text-left">
                    <h3 class="text-xl font-bold text-brand-navy">Está enfrentando um problema jurídico em Aracaju ou Sergipe?</h3>
                    <p class="text-sm text-slate-600 mt-1">A Jorge Santos Advocacia e Consultoria Jurídica oferece atendimento com foco em análise, planejamento e segurança.</p>
                </div>
                <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="w-full md:w-auto justify-center bg-accent-green hover:bg-accent-hoverGreen text-white font-bold px-6 py-3.5 rounded-xl shadow-md flex items-center gap-2 transform hover:scale-105 transition-all text-center">
                    <i class="fa-brands fa-whatsapp text-lg shrink-0"></i> <span>Quero Falar com um Advogado</span>
                </a>
            </div>
        </div>
    </section>

    <!-- SEÇÃO COMPLETA: COMO PODEMOS AJUDAR (ÁREAS DE ATUAÇÃO) -->
    <section id="areas" class="py-16 md:py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-widest text-brand-goldDark">Como Podemos Ajudar?</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-brand-navy mt-2">Áreas de Atuação em Aracaju e Sergipe</h2>
                <p class="text-slate-600 text-sm sm:text-base mt-3">Atuação técnica, moderna e estratégica para pessoas físicas e empresas.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php
                $saved_areas = get_post_meta( $post_id, 'jsa_areas_list', true );
                if ( ! is_array( $saved_areas ) || empty( $saved_areas ) ) {
                    if ( function_exists( 'jsa_get_default_areas' ) ) {
                        $saved_areas = jsa_get_default_areas();
                    } else {
                        $saved_areas = [
                            [
                                'title' => 'Direito Trabalhista',
                                'subtitle' => 'Trabalhadores e Empresas em Aracaju',
                                'desc' => 'Demissão sem justa causa, justa causa, rescisão indireta, verbas rescisórias, horas extras, FGTS, adicionais de insalubridade e periculosidade, assédio moral e defesa empresarial.',
                                'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+atendimento+em+Direito+Trabalhista+em+Aracaju.',
                                'icon' => 'fa-briefcase',
                                'featured' => '1'
                            ],
                            [
                                'title' => 'Advogado para Divórcio',
                                'subtitle' => 'Com Bens, Filhos ou Consensual',
                                'desc' => 'Divórcio consensual e litigioso, partilha de bens (imóveis, veículos, quotas empresariais), guarda dos filhos, pensão alimentícia, regulamentação de convivência e união estável.',
                                'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+atendimento+para+Div%C3%B3rcio+em+Aracaju.',
                                'icon' => 'fa-people-roof',
                                'featured' => '1'
                            ],
                            [
                                'title' => 'Direito Imobiliário',
                                'subtitle' => 'Compra, Venda e Regularização',
                                'desc' => 'Contratos imobiliários, regularização de imóvel sem escritura, usucapião, adjudicação compulsória, distrato imobiliário, imóveis na planta, atraso de entrega e locação.',
                                'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+orienta%C3%A7%C3%A3o+em+Direito+Imobili%C3%A1rio+em+Aracaju.',
                                'icon' => 'fa-house-chimney',
                                'featured' => '0'
                            ],
                            [
                                'title' => 'Advogado Empresarial',
                                'subtitle' => 'Assessoria Jurídica em Aracaju',
                                'desc' => 'Elaboração e revisão de contratos, cobrança e recuperação de créditos, execução de dívidas, negociação, conflitos entre sócios e consultoria preventiva contínua.',
                                'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+gostaria+de+assessoria+jur%C3%ADdica+empresarial+em+Aracaju.',
                                'icon' => 'fa-building-shield',
                                'featured' => '1'
                            ],
                            [
                                'title' => 'Advogado para Inventário',
                                'subtitle' => 'Judicial e Extrajudicial em Cartório',
                                'desc' => 'Regularização e partilha segura de herança, imóveis, veículos, contas bancárias, empresas, direitos dos herdeiros, meação, testamentos e resolução de conflitos sucessórios.',
                                'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+orienta%C3%A7%C3%A3o+sobre+Invent%C3%A1rio+em+Aracaju.',
                                'icon' => 'fa-landmark',
                                'featured' => '0'
                            ]
                        ];
                    }
                }

                foreach ( $saved_areas as $idx => $area_item ) :
                    $a_title = $area_item['title'] ?? '';
                    $a_subtitle = $area_item['subtitle'] ?? '';
                    $a_desc = $area_item['desc'] ?? '';
                    $a_link = ! empty( $area_item['link'] ) ? $area_item['link'] : 'https://wa.me/5579999202205';
                    $a_icon = ! empty( $area_item['icon'] ) ? $area_item['icon'] : 'fa-scale-balanced';
                    $is_featured = ( isset( $area_item['featured'] ) && $area_item['featured'] === '1' );
                    $delay = 100 * (($idx % 3) + 1);
                ?>
                    <div class="<?php echo $is_featured ? 'bg-white border-2 border-brand-gold shadow-lg relative' : 'bg-brand-bgLight border border-slate-200 shadow-sm'; ?> card-hover-effect rounded-2xl p-7 flex flex-col justify-between transition-all" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <?php if ( $is_featured ) : ?>
                            <span class="absolute -top-3 right-6 gold-gradient-bg text-brand-navy text-[10px] font-extrabold uppercase px-3 py-1 rounded-full shadow-sm">Destaque</span>
                        <?php endif; ?>

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold text-brand-navy"><?php echo esc_html( $a_title ); ?></h3>
                                <span class="text-brand-gold text-2xl card-icon-zoom"><i class="fa-solid <?php echo esc_attr( $a_icon ); ?>"></i></span>
                            </div>
                            <?php if ( $a_subtitle ) : ?>
                                <p class="text-xs text-brand-goldDark font-bold mb-3 uppercase tracking-wide"><?php echo esc_html( $a_subtitle ); ?></p>
                            <?php endif; ?>
                            <p class="text-slate-600 text-sm mb-4 leading-relaxed"><?php echo esc_html( $a_desc ); ?></p>
                        </div>
                        <a href="<?php echo esc_url( $a_link ); ?>" target="_blank" class="mt-6 block text-center py-3 px-4 rounded-lg <?php echo $is_featured ? 'gold-gradient-bg text-brand-navy font-extrabold hover:brightness-105 shadow-sm' : 'border-2 border-brand-gold text-brand-goldDark hover:bg-brand-gold hover:text-white font-bold'; ?> text-xs transition-all transform hover:scale-105">
                            Falar com Especialista
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- SEÇÃO ANÁLISE INDIVIDUAL DO SEU CASO -->
    <section id="analise" class="py-16 md:py-24 bg-brand-navy text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="zoom-in-up" data-aos-duration="800">
            <div class="bg-brand-navyLight/80 border-2 border-brand-gold/40 rounded-2xl sm:rounded-3xl p-5 sm:p-8 md:p-12 shadow-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-7 space-y-5">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-md bg-brand-gold text-brand-navy text-xs font-extrabold uppercase tracking-wide">
                            <i class="fa-solid fa-file-circle-check"></i> <?php echo esc_html( $analise_badge ); ?>
                        </div>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white leading-tight">
                            <?php echo esc_html( $analise_title ); ?>
                        </h2>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                            <?php echo esc_html( $analise_desc ); ?>
                        </p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-xs sm:text-sm text-slate-200">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-arrow-right text-brand-gold"></i>
                                <span>Entender exatamente seus direitos</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-arrow-right text-brand-gold"></i>
                                <span>Identificar riscos antecipadamente</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-arrow-right text-brand-gold"></i>
                                <span>Organizar documentos e provas</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-arrow-right text-brand-gold"></i>
                                <span>Definir uma estratégia segura</span>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-accent-green hover:bg-accent-hoverGreen text-white font-bold text-sm sm:text-base px-6 sm:px-7 py-3.5 sm:py-4 rounded-xl shadow-xl transition-all transform hover:scale-105 text-center">
                                <i class="fa-brands fa-whatsapp text-2xl shrink-0"></i>
                                <span>Quero Analisar Meu Caso no WhatsApp</span>
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-5 w-full">
                        <div class="bg-white text-brand-dark p-5 sm:p-8 rounded-2xl border-2 border-brand-gold shadow-xl card-hover-effect">
                            <h3 class="text-lg font-bold text-brand-navy mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-magnifying-glass text-brand-gold card-icon-zoom"></i> O Que Buscamos Compreender:
                            </h3>
                            <ul class="space-y-3.5 text-xs sm:text-sm text-slate-700">
                                <li class="flex items-start gap-2">
                                    <span class="text-brand-gold font-extrabold text-sm">1.</span>
                                    <span><strong>O que aconteceu?</strong> O histórico detalhado dos fatos.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-brand-gold font-extrabold text-sm">2.</span>
                                    <span><strong>Quais documentos existem?</strong> Contratos, conversas e extratos.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-brand-gold font-extrabold text-sm">3.</span>
                                    <span><strong>Qual é o objetivo do cliente?</strong> A melhor solução prática almejada.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-brand-gold font-extrabold text-sm">4.</span>
                                    <span><strong>Quais alternativas estão disponíveis?</strong> Soluções judiciais e extrajudiciais.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SEÇÃO COMO FUNCIONA O ATENDIMENTO -->
    <section class="py-16 md:py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-widest text-brand-goldDark">Passo a Passo</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-brand-navy mt-2">Como Funciona o Nosso Atendimento</h2>
                <p class="text-slate-600 text-sm sm:text-base mt-3">Processo transparente, rápido e sem complicações do início ao fim.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                
                <div class="bg-brand-bgLight p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center card-hover-effect cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 rounded-full gold-gradient-bg text-brand-navy font-extrabold flex items-center justify-center text-lg mb-4 shadow-md card-icon-zoom">1</div>
                    <h3 class="text-base font-bold text-brand-navy mb-2">Primeiro Contato</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Você clica no <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="text-accent-green hover:underline font-bold">botão do WhatsApp</a> e inicia a conversa diretamente conosco.</p>
                </div>

                <div class="bg-brand-bgLight p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center card-hover-effect cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 rounded-full gold-gradient-bg text-brand-navy font-extrabold flex items-center justify-center text-lg mb-4 shadow-md card-icon-zoom">2</div>
                    <h3 class="text-base font-bold text-brand-navy mb-2">Relato do Caso</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Você explica resumidamente o que aconteceu e qual é a sua dúvida ou necessidade.</p>
                </div>

                <div class="bg-brand-bgLight p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center card-hover-effect cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 rounded-full gold-gradient-bg text-brand-navy font-extrabold flex items-center justify-center text-lg mb-4 shadow-md card-icon-zoom">3</div>
                    <h3 class="text-base font-bold text-brand-navy mb-2">Envio de Docs</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Se necessário, você envia fotos ou cópias dos documentos por <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="text-accent-green hover:underline font-bold">WhatsApp</a> ou <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="text-brand-goldDark hover:underline font-bold break-all">e-mail</a>.</p>
                </div>

                <div class="bg-brand-bgLight p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center card-hover-effect cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-12 h-12 rounded-full gold-gradient-bg text-brand-navy font-extrabold flex items-center justify-center text-lg mb-4 shadow-md card-icon-zoom">4</div>
                    <h3 class="text-base font-bold text-brand-navy mb-2">Análise Jurídica</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Avaliamos detalhadamente as leis, contratos e alternativas cabíveis ao seu caso.</p>
                </div>

                <div class="bg-brand-bgLight p-6 rounded-2xl text-center border border-slate-200 shadow-sm flex flex-col items-center card-hover-effect cursor-pointer" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-12 h-12 rounded-full gold-gradient-bg text-brand-navy font-extrabold flex items-center justify-center text-lg mb-4 shadow-md card-icon-zoom">5</div>
                    <h3 class="text-base font-bold text-brand-navy mb-2">Plano de Ação</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Você recebe a orientação precisa sobre quais são as medidas mais adequadas e seguras.</p>
                </div>

            </div>

            <div class="text-center mt-12 px-4" data-aos="zoom-in">
                <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-accent-green hover:bg-accent-hoverGreen text-white font-bold text-sm sm:text-base px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl shadow-lg transition-all transform hover:scale-105 text-center">
                    <i class="fa-brands fa-whatsapp text-xl shrink-0"></i> <span>Iniciar Atendimento no WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

    <!-- SEÇÃO SOBRE O ESCRITÓRIO -->
    <section id="sobre" class="py-16 md:py-24 bg-brand-bgLight border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-5 flex justify-center" data-aos="fade-right" data-aos-duration="800">
                    <div class="relative w-full max-w-sm rounded-2xl overflow-hidden border-4 border-brand-gold/30 shadow-xl bg-white card-hover-effect">
                        <img src="<?php echo esc_url( $sobre_image ); ?>" alt="Dr. Jorge Santos - Advogado e Consultor Jurídico em Aracaju / SE" title="Dr. Jorge Santos Advocacia Aracaju" loading="lazy" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>

                <div class="lg:col-span-7 space-y-6" data-aos="fade-left" data-aos-duration="800">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-goldDark">Sobre o Escritório</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-brand-navy leading-tight">
                        <?php echo esc_html( $sobre_title ); ?>
                    </h2>
                    
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        <?php echo esc_html( $sobre_text1 ); ?>
                    </p>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        <?php echo esc_html( $sobre_text2 ); ?>
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs sm:text-sm">
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white border border-slate-200 shadow-sm gold-border-left card-hover-effect cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                            <i class="fa-solid fa-handshake text-brand-gold text-2xl card-icon-zoom"></i>
                            <div>
                                <div class="font-bold text-brand-navy">Atendimento Próximo</div>
                                <div class="text-slate-500 text-xs">Orientação clara e direta</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white border border-slate-200 shadow-sm gold-border-left card-hover-effect cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                            <i class="fa-solid fa-shield-halved text-brand-gold text-2xl card-icon-zoom"></i>
                            <div>
                                <div class="font-bold text-brand-navy">Segurança e Ética</div>
                                <div class="text-slate-500 text-xs">Atuação estratégica e transparente</div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="inline-flex items-center gap-2 text-brand-goldDark hover:text-brand-gold font-bold text-sm">
                            <span>Converse com a Jorge Santos Advocacia no WhatsApp</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SEÇÃO PERGUNTAS FREQUENTES (FAQ) -->
    <section id="faq" class="py-16 md:py-24 bg-white border-t border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-widest text-brand-goldDark">Tire Suas Dúvidas</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-brand-navy mt-2">Perguntas Frequentes</h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">Respostas diretas para as principais dúvidas sobre atendimento em Aracaju.</p>
            </div>

            <div class="space-y-3.5" id="faqAccordion">
                
                <?php
                $saved_faqs = get_post_meta( $post_id, 'jsa_faqs_list', true );
                if ( ! is_array( $saved_faqs ) || empty( $saved_faqs ) ) {
                    if ( function_exists( 'jsa_get_default_faqs' ) ) {
                        $saved_faqs = jsa_get_default_faqs();
                    } else {
                        $saved_faqs = [
                            ['q' => 'Como funciona o primeiro atendimento?', 'a' => 'O cliente apresenta sua situação, os principais fatos e, quando necessário, os documentos relacionados ao problema. A partir dessas informações é possível realizar uma análise inicial da demanda.'],
                            ['q' => 'Posso enviar documentos pelo WhatsApp?', 'a' => 'Documentos podem ser encaminhados por meio digital quando essa modalidade for utilizada no atendimento do escritório.'],
                            ['q' => 'Posso contratar advogado mesmo estando fora de Aracaju?', 'a' => 'Diversas etapas da advocacia podem ser realizadas digitalmente, dependendo do tipo de demanda e dos atos necessários.'],
                            ['q' => 'O escritório atende trabalhadores e empresas?', 'a' => 'Sim. Na área trabalhista, a atuação pode envolver tanto trabalhadores quanto empregadores e empresas.'],
                            ['q' => 'Vocês trabalham com divórcio?', 'a' => 'Sim. O atendimento pode envolver divórcio consensual ou litigioso, além de questões patrimoniais e familiares relacionadas.'],
                            ['q' => 'O escritório atua com problemas imobiliários?', 'a' => 'Sim. São analisadas questões relacionadas a contratos, compra e venda, regularização, usucapião, distrato, imóveis na planta, locação e conflitos imobiliários.'],
                            ['q' => 'Vocês oferecem assessoria para empresas?', 'a' => 'Sim. O escritório presta atendimento em Direito Empresarial, incluindo contratos, cobranças, prevenção de riscos, questões societárias e defesa empresarial.'],
                            ['q' => 'O escritório realiza inventário?', 'a' => 'O escritório presta assessoria jurídica em inventários judiciais e extrajudiciais, herança, partilha e questões sucessórias.']
                        ];
                    }
                }

                foreach ( $saved_faqs as $findex => $faq_item ) :
                    $q = $faq_item['q'] ?? '';
                    $a = $faq_item['a'] ?? '';
                    $is_first = ( $findex === 0 );
                ?>
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="<?php echo min( ($findex + 1) * 75, 400 ); ?>">
                        <button class="faq-toggle <?php echo $is_first ? 'active-accordion' : ''; ?> w-full p-5 text-left font-bold text-sm sm:text-base flex justify-between items-center focus:outline-none">
                            <span><?php echo esc_html( $q ); ?></span>
                            <i class="fa-solid fa-chevron-down text-brand-gold transition-transform duration-200"></i>
                        </button>
                        <div class="faq-content <?php echo $is_first ? '' : 'hidden'; ?> p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-100 leading-relaxed">
                            <?php echo wp_kses_post( $a ); ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- FORMULÁRIO DE CONTATO DIRETO / WHATSAPP -->
    <section id="contato" class="py-16 md:py-24 bg-brand-bgLight border-t border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="zoom-in" data-aos-duration="700">
            <div class="bg-white p-8 sm:p-12 rounded-3xl border-2 border-brand-gold/30 shadow-xl card-hover-effect">
                <div class="text-center max-w-xl mx-auto mb-8">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-goldDark">Atendimento Ágil em Aracaju</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-brand-navy mt-1">Envie uma Mensagem Direta</h2>
                    <p class="text-slate-600 text-xs sm:text-sm mt-2">Preencha os campos abaixo para abrir a conversa no <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="text-accent-green hover:underline font-bold whitespace-nowrap">WhatsApp (79) 99920-2205</a> com os dados do seu caso prontos.</p>
                </div>

                <form id="contactForm" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-brand-navy mb-1">Seu Nome Completo</label>
                            <input type="text" id="formName" required placeholder="Ex: João da Silva" class="w-full bg-brand-bgLight border border-slate-300 rounded-lg px-4 py-3 text-sm text-brand-dark focus:outline-none focus:border-brand-gold transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-brand-navy mb-1">Seu WhatsApp / Telefone</label>
                            <input type="tel" id="formPhone" required placeholder="Ex: (79) 99999-9999" class="w-full bg-brand-bgLight border border-slate-300 rounded-lg px-4 py-3 text-sm text-brand-dark focus:outline-none focus:border-brand-gold transition-colors">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-brand-navy mb-1">Seu E-mail (Opcional)</label>
                            <input type="email" id="formEmail" placeholder="Ex: seuemail@gmail.com" class="w-full bg-brand-bgLight border border-slate-300 rounded-lg px-4 py-3 text-sm text-brand-dark focus:outline-none focus:border-brand-gold transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-brand-navy mb-1">Área de Atuação</label>
                            <select id="formArea" class="w-full bg-brand-bgLight border border-slate-300 rounded-lg px-4 py-3 text-sm text-brand-dark focus:outline-none focus:border-brand-gold transition-colors font-medium">
                                <option value="Direito Trabalhista">Direito Trabalhista</option>
                                <option value="Advogado para Divórcio">Advogado para Divórcio</option>
                                <option value="Direito Imobiliário">Direito Imobiliário</option>
                                <option value="Direito Empresarial">Direito Empresarial</option>
                                <option value="Inventário e Sucessões">Inventário e Sucessões</option>
                                <option value="Outra Questão Jurídica">Outra Questão Jurídica</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-brand-navy mb-1">Conte Resumidamente o que Aconteceu</label>
                        <textarea id="formMessage" rows="3" placeholder="Explique resumidamente sua dúvida ou situação..." class="w-full bg-brand-bgLight border border-slate-300 rounded-lg px-4 py-3 text-sm text-brand-dark focus:outline-none focus:border-brand-gold transition-colors"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-accent-green hover:bg-accent-hoverGreen text-white font-bold py-3.5 sm:py-4 px-4 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2.5 text-sm sm:text-base transform hover:scale-105 text-center">
                        <i class="fa-brands fa-whatsapp text-2xl shrink-0"></i> <span>Enviar Mensagem para o WhatsApp do Escritório</span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- RODAPÉ COMPLETO -->
    <footer class="bg-brand-navy border-t border-brand-navyLight pt-16 pb-12 text-slate-300 text-xs" data-aos="fade-up" data-aos-duration="600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <!-- Coluna 1: Logo e Descrição -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="<?php echo esc_url( $footer_logo ); ?>" alt="Jorge Santos Advocacia e Consultoria Jurídica - Aracaju / SE" title="Jorge Santos Advocacia" loading="lazy" class="h-12 w-auto max-w-[50px] bg-brand-navy p-1 rounded-lg border border-brand-gold/30">
                        <div class="flex flex-col justify-center font-baskerville">
                            <span class="text-lg font-bold tracking-normal text-white leading-tight">Jorge Santos</span>
                            <span class="text-xs font-normal tracking-normal text-brand-gold leading-tight">Advocacia</span>
                        </div>
                    </div>
                    <p class="text-xs leading-relaxed text-slate-300">
                        Atendimento jurídico especializado e estratégico para pessoas físicas e empresas em Aracaju e Sergipe.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="<?php echo esc_url( $contact_instagram ); ?>" target="_blank" class="w-8 h-8 rounded-full bg-brand-navyLight hover:bg-brand-gold hover:text-brand-navy flex items-center justify-center text-white transition-colors" title="Instagram @advogado.online.aracaju">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="<?php echo esc_url( $contact_facebook ); ?>" target="_blank" class="w-8 h-8 rounded-full bg-brand-navyLight hover:bg-brand-gold hover:text-brand-navy flex items-center justify-center text-white transition-colors" title="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="w-8 h-8 rounded-full bg-brand-navyLight hover:bg-accent-green hover:text-white flex items-center justify-center text-white transition-colors" title="WhatsApp (79) 99920-2205">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Coluna 2: Links Rápidos -->
                <div>
                    <h4 class="text-white font-bold text-sm mb-4 border-b border-brand-gold/40 pb-2 inline-block">Navegação</h4>
                    <ul class="space-y-2">
                        <li><a href="#inicio" class="hover:text-brand-gold transition-colors">Início</a></li>
                        <li><a href="#atendimento" class="hover:text-brand-gold transition-colors">Atendimento</a></li>
                        <li><a href="#areas" class="hover:text-brand-gold transition-colors">Áreas de Atuação</a></li>
                        <li><a href="#analise" class="hover:text-brand-gold transition-colors">Análise do Caso</a></li>
                        <li><a href="#sobre" class="hover:text-brand-gold transition-colors">O Escritório</a></li>
                        <li><a href="#faq" class="hover:text-brand-gold transition-colors">Perguntas Frequentes</a></li>
                    </ul>
                </div>

                <!-- Coluna 3: Especialidades em Aracaju -->
                <div>
                    <h4 class="text-white font-bold text-sm mb-4 border-b border-brand-gold/40 pb-2 inline-block">Atuação em Aracaju</h4>
                    <ul class="space-y-2 text-slate-300">
                        <li>Advogado Trabalhista em Aracaju</li>
                        <li>Advogado para Divórcio em Aracaju</li>
                        <li>Direito Imobiliário em Aracaju</li>
                        <li>Assessoria Empresarial em Aracaju</li>
                        <li>Inventário Judicial e Extrajudicial</li>
                        <li>Contratos e Prevenção Jurídica</li>
                    </ul>
                </div>

                <!-- Coluna 4: Contato com Links Ativos -->
                <div class="space-y-3">
                    <h4 class="text-white font-bold text-sm mb-4 border-b border-brand-gold/40 pb-2 inline-block">Fale Conosco</h4>
                    <p class="flex items-center gap-2">
                        <i class="fa-solid fa-location-dot text-brand-gold"></i> <?php echo esc_html( $contact_address ); ?>
                    </p>
                    <p>
                        <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="flex items-center gap-2 hover:text-accent-green hover:underline transition-colors text-slate-300 font-semibold whitespace-nowrap">
                            <i class="fa-brands fa-whatsapp text-accent-green text-sm"></i> <?php echo esc_html( $contact_phone ); ?>
                        </a>
                    </p>
                    <p>
                        <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="flex items-center gap-2 hover:text-brand-gold hover:underline transition-colors text-slate-300 font-medium break-all whitespace-nowrap">
                            <i class="fa-regular fa-envelope text-brand-gold text-sm"></i> <?php echo esc_html( $contact_email ); ?>
                        </a>
                    </p>
                    <p class="flex items-center gap-2">
                        <i class="fa-solid fa-clock text-brand-gold"></i> Seg a Sex: 08h às 18h
                    </p>
                </div>

            </div>

            <div class="border-t border-brand-navyLight pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-400 text-[11px]">
                <p>&copy; <?php echo date('Y'); ?> Jorge Santos Advocacia e Consultoria Jurídica. Todos os direitos reservados. Aracaju - SE.</p>
                <p class="text-slate-400">Desenvolvido por <a href="https://rafaelpitaoficial.com.br" target="_blank" rel="noopener noreferrer" class="text-brand-gold hover:underline font-semibold transition-colors">Rafael Solutions</a></p>
            </div>
        </div>
    </footer>

    <!-- BOTÃO FLUTUANTE DO WHATSAPP -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="<?php echo esc_url( $hero_cta_link ); ?>" target="_blank" class="floating-wa-btn w-14 h-14 bg-accent-green hover:bg-accent-hoverGreen text-white rounded-full flex items-center justify-center text-3xl shadow-2xl transition-transform hover:scale-110" title="Falar no WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <!-- AOS JS LIBRARY -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- SCRIPTS INTERATIVOS -->
    <script>
        // Inicializa animações AOS com desativação em mobile para evitar rolagem horizontal
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                once: true,
                duration: 700,
                easing: 'ease-out-cubic',
                offset: 40,
                disable: function() {
                    return window.innerWidth < 768;
                }
            });
        });

        // Menu Mobile Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Accordion FAQ com alternância de classe ativa elegante
        document.querySelectorAll('.faq-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                const isCurrentlyActive = btn.classList.contains('active-accordion');
                
                // Fecha todos os outros itens
                document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
                document.querySelectorAll('.faq-toggle').forEach(b => b.classList.remove('active-accordion'));
                
                // Se não estava ativo, abre este
                if (!isCurrentlyActive) {
                    content.classList.remove('hidden');
                    btn.classList.add('active-accordion');
                }
            });
        });

        // Formulário Inteligente -> WhatsApp Aracaju
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const name = document.getElementById('formName').value;
                const phone = document.getElementById('formPhone').value;
                const area = document.getElementById('formArea').value;
                const message = document.getElementById('formMessage').value;

                let text = `Olá, Jorge Santos Advocacia e Consultoria Jurídica!\n`;
                text += `Meu nome é *${name}*.\n`;
                text += `WhatsApp/Telefone: *${phone}*\n`;
                text += `Área de Interesse: *${area}*\n`;
                if (message) {
                    text += `Situação: ${message}\n`;
                }
                text += `Gostaria de uma orientação jurídica inicial para o meu caso em Aracaju.`;

                const encoded = encodeURIComponent(text);
                window.open(`https://wa.me/5579999202205?text=${encoded}`, '_blank');
            });
        }
    </script>
    </div><!-- /.lp-site-wrapper -->
    <?php wp_footer(); ?>
</body>
</html>
