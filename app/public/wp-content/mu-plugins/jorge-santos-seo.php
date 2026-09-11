<?php
/**
 * Plugin Name: Jorge Santos Advocacia - Motor de SEO Avançado e Schema.org
 * Description: Otimização de SEO Avançada para ranqueamento no topo do Google (Local Business, LegalService, FAQ Rich Snippets, Geo-Targeting, OpenGraph e Sitemap com detecção inteligente de domínio).
 * Version: 2.1.0
 * Author: Jorge Santos Advocacia & Rafael Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Helper: Obtém a URL base do site de forma inteligente e dinâmica
 * Detecta se foi configurado um domínio de produção customizado ou usa o home_url() ativo.
 */
function jsa_get_site_url( $path = '' ) {
    $custom_domain = trim( get_option( 'jsa_canonical_domain', '' ) );
    
    if ( ! empty( $custom_domain ) ) {
        $base = untrailingslashit( $custom_domain );
    } else {
        $base = untrailingslashit( home_url() );
    }

    if ( ! empty( $path ) ) {
        $base .= '/' . ltrim( $path, '/' );
    }

    return $base;
}

/**
 * Helper: Normaliza dinamicamente a URL da imagem de OpenGraph (WhatsApp / Redes)
 * Substitui domínios locais antigos pelo domínio atual/produção se for uma imagem de uploads.
 */
function jsa_get_og_image_url() {
    $saved_img = get_option( 'jsa_og_image', '' );
    
    if ( empty( $saved_img ) ) {
        return jsa_get_site_url( '/wp-content/uploads/2026/08/foto-1.jpeg' );
    }

    // Se a imagem for caminho relativo (/wp-content/...)
    if ( strpos( $saved_img, 'http' ) !== 0 ) {
        return jsa_get_site_url( '/' . ltrim( $saved_img, '/' ) );
    }

    // Se contiver caminho de upload do WordPress, garante que use o domínio inteligente ativo
    if ( strpos( $saved_img, '/wp-content/' ) !== false ) {
        $path_part = substr( $saved_img, strpos( $saved_img, '/wp-content/' ) );
        return jsa_get_site_url( $path_part );
    }

    return $saved_img;
}

/**
 * 1. Registra configurações no painel administrativo do WordPress
 */
function jsa_register_settings() {
    register_setting( 'jsa_seo_group', 'jsa_canonical_domain' );
    register_setting( 'jsa_seo_group', 'jsa_site_title' );
    register_setting( 'jsa_seo_group', 'jsa_site_description' );
    register_setting( 'jsa_seo_group', 'jsa_keywords' );
    register_setting( 'jsa_seo_group', 'jsa_whatsapp' );
    register_setting( 'jsa_seo_group', 'jsa_email' );
    register_setting( 'jsa_seo_group', 'jsa_address' );
    register_setting( 'jsa_seo_group', 'jsa_og_image' );
    register_setting( 'jsa_seo_group', 'jsa_oab_number' );
    register_setting( 'jsa_seo_group', 'jsa_header_logo' );
    register_setting( 'jsa_seo_group', 'jsa_footer_logo' );
    register_setting( 'jsa_seo_group', 'jsa_custom_favicon' );
}
add_action( 'admin_init', 'jsa_register_settings' );

/**
 * Enqueue scripts de mídia na página de configurações de SEO
 */
function jsa_seo_admin_scripts( $hook ) {
    if ( 'toplevel_page_jsa-seo-settings' === $hook ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'jsa_seo_admin_scripts' );

/**
 * 2. Adiciona página de menu no painel de administração
 */
function jsa_add_admin_menu() {
    add_menu_page(
        'SEO Avançado Jorge Santos',
        'Jorge Santos SEO',
        'manage_options',
        'jsa-seo-settings',
        'jsa_render_settings_page',
        'dashicons-shield',
        30
    );
}
add_action( 'admin_menu', 'jsa_add_admin_menu' );

/**
 * 3. Renderiza a página de configurações de SEO no Painel Admin
 */
function jsa_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>🚀 SEO Avançado & Branding - Jorge Santos Advocacia</h1>
        <p style="color: #64748B;">Configurações essenciais para posicionar o escritório no topo dos resultados de busca do Google em Aracaju e Sergipe e gerenciar a <strong>Identidade Visual (Logos e Favicon)</strong> com <strong>suporte dinâmico para migração</strong>.</p>
        
        <form method="post" action="options.php">
            <?php
            settings_fields( 'jsa_seo_group' );
            do_settings_sections( 'jsa_seo_group' );
            
            $canonical_domain = get_option( 'jsa_canonical_domain', 'https://advogadoonlinearacaju.com.br' );
            $title = get_option( 'jsa_site_title', 'Advogado em Aracaju | Jorge Santos Advocacia e Consultoria Jurídica' );
            $desc = get_option( 'jsa_site_description', 'Procurando advogado em Aracaju? Jorge Santos Advocacia e Consultoria Jurídica oferece atendimento estratégico em Direito Trabalhista, Divórcio, Imobiliário, Empresarial e Inventário em Sergipe. Fale no WhatsApp.' );
            $keywords = get_option( 'jsa_keywords', 'advogado em aracaju, advogado aracaju, advogado trabalhista aracaju, advogado divórcio aracaju, advogado imobiliário aracaju, advogado empresarial aracaju, inventário em aracaju, escritório de advocacia aracaju sergipe' );
            $whatsapp = get_option( 'jsa_whatsapp', '(79) 99920-2205' );
            $email = get_option( 'jsa_email', 'contato@advogadoonlinearacaju.com.br' );
            $address = get_option( 'jsa_address', 'Aracaju - SE' );
            $og_image = get_option( 'jsa_og_image', home_url( '/wp-content/uploads/2026/08/logo_js_quadrada.png' ) );
            $oab = get_option( 'jsa_oab_number', 'OAB/SE' );
            $header_logo = get_option( 'jsa_header_logo', home_url( '/wp-content/uploads/2026/08/logo_jfs_horizontal.png' ) );
            $footer_logo = get_option( 'jsa_footer_logo', home_url( '/wp-content/uploads/2026/08/logo_jfs_horizontal.png' ) );
            $custom_favicon = get_option( 'jsa_custom_favicon', home_url( '/wp-content/uploads/2026/08/cropped-logo-1-1-32x32.jpeg' ) );
            ?>
            <h2 style="margin-top: 25px; border-bottom: 2px solid #D1A748; padding-bottom: 8px;">🎨 Identidade Visual & Branding (Logos e Favicon)</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Logomarca do Cabeçalho (Header)</th>
                    <td>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="text" id="jsa_header_logo" name="jsa_header_logo" value="<?php echo esc_attr( $header_logo ); ?>" style="width: 100%; max-width: 550px;" />
                            <button type="button" class="button jsa-seo-upload-btn" data-target="#jsa_header_logo">Selecionar / Upload</button>
                        </div>
                        <p class="description">Imagem exibida na barra de navegação no topo de toda a landing page.</p>
                        <?php if ( $header_logo ) : ?>
                            <div style="margin-top: 8px; padding: 6px; background: #0E1928; display: inline-block; border-radius: 6px;">
                                <img src="<?php echo esc_url( $header_logo ); ?>" style="max-height: 40px; display: block;" />
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Logomarca do Rodapé (Footer)</th>
                    <td>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="text" id="jsa_footer_logo" name="jsa_footer_logo" value="<?php echo esc_attr( $footer_logo ); ?>" style="width: 100%; max-width: 550px;" />
                            <button type="button" class="button jsa-seo-upload-btn" data-target="#jsa_footer_logo">Selecionar / Upload</button>
                        </div>
                        <p class="description">Imagem exibida no rodapé escuro da página.</p>
                        <?php if ( $footer_logo ) : ?>
                            <div style="margin-top: 8px; padding: 6px; background: #0E1928; display: inline-block; border-radius: 6px;">
                                <img src="<?php echo esc_url( $footer_logo ); ?>" style="max-height: 40px; display: block;" />
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Ícone do Site / Favicon</th>
                    <td>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="text" id="jsa_custom_favicon" name="jsa_custom_favicon" value="<?php echo esc_attr( $custom_favicon ); ?>" style="width: 100%; max-width: 550px;" />
                            <button type="button" class="button jsa-seo-upload-btn" data-target="#jsa_custom_favicon">Selecionar / Upload</button>
                        </div>
                        <p class="description">Ícone exibido na aba do navegador e nos favoritos (recomendado: 32x32 ou 512x512 png/jpeg).</p>
                        <?php if ( $custom_favicon ) : ?>
                            <div style="margin-top: 8px; display: inline-block;">
                                <img src="<?php echo esc_url( $custom_favicon ); ?>" style="max-height: 32px; max-width: 32px; border: 1px solid #CBD5E1; border-radius: 4px;" />
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>

            <h2 style="margin-top: 30px; border-bottom: 2px solid #D1A748; padding-bottom: 8px;">🌐 SEO, Meta Tags & Dados de Contato</h2>
            <table class="form-table">
                <tr valign="top" style="background: #F8FAFC; border-left: 4px solid #D1A748;">
                    <th scope="row" style="padding-left: 12px;">🌐 Domínio de Produção Oficial (Opcional)</th>
                    <td>
                        <input type="url" name="jsa_canonical_domain" value="<?php echo esc_attr( $canonical_domain ); ?>" placeholder="Ex: https://advogadoonlinearacaju.com.br" style="width: 100%; max-width: 650px;" />
                        <p class="description">
                            <strong>Detecção Inteligente Ativa:</strong> Se deixar este campo em branco, o sistema utilizará automaticamente o domínio onde o site estiver rodando (<code><?php echo esc_html( home_url() ); ?></code>). Se preencher com seu domínio final (ex: <code>https://advogadoonlinearacaju.com.br</code>), todos os Schemas, Tags Canônicas, OpenGraph do WhatsApp e Sitemap.xml apontarão para ele.
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Título SEO (Title Tag)</th>
                    <td>
                        <input type="text" name="jsa_site_title" value="<?php echo esc_attr( $title ); ?>" style="width: 100%; max-width: 650px;" />
                        <p class="description">Ideal entre 50 a 60 caracteres com a palavra-chave principal no início.</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Meta Descrição (Google Snippet)</th>
                    <td>
                        <textarea name="jsa_site_description" rows="3" style="width: 100%; max-width: 650px;"><?php echo esc_textarea( $desc ); ?></textarea>
                        <p class="description">Texto persuasivo exibido no Google (140 a 160 caracteres) com chamada para ação.</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Palavras-chave de Busca (Keywords)</th>
                    <td>
                        <textarea name="jsa_keywords" rows="3" style="width: 100%; max-width: 650px;"><?php echo esc_textarea( $keywords ); ?></textarea>
                        <p class="description">Termos e variações locais mais buscados por clientes em Aracaju e Sergipe.</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Registro OAB</th>
                    <td>
                        <input type="text" name="jsa_oab_number" value="<?php echo esc_attr( $oab ); ?>" style="width: 100%; max-width: 300px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Telefone / WhatsApp Oficial</th>
                    <td>
                        <input type="text" name="jsa_whatsapp" value="<?php echo esc_attr( $whatsapp ); ?>" style="width: 100%; max-width: 300px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">E-mail Profissional</th>
                    <td>
                        <input type="email" name="jsa_email" value="<?php echo esc_attr( $email ); ?>" style="width: 100%; max-width: 300px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Cidade / Estado (Geo Localização)</th>
                    <td>
                        <input type="text" name="jsa_address" value="<?php echo esc_attr( $address ); ?>" style="width: 100%; max-width: 400px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Imagem de Preview (WhatsApp & Redes - URL Absoluta)</th>
                    <td>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="text" id="jsa_og_image" name="jsa_og_image" value="<?php echo esc_attr( $og_image ); ?>" style="width: 100%; max-width: 550px;" />
                            <button type="button" class="button jsa-seo-upload-btn" data-target="#jsa_og_image">Selecionar / Upload</button>
                        </div>
                        <p class="description">URL ou caminho da imagem. O sistema converte automaticamente para o domínio ativo em produção.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Salvar Configurações' ); ?>
        </form>

        <script>
        jQuery(document).ready(function($){
            $('.jsa-seo-upload-btn').click(function(e){
                e.preventDefault();
                var target = $(this).data('target');
                var uploader = wp.media({
                    title: 'Selecionar Imagem',
                    button: { text: 'Usar esta Imagem' },
                    multiple: false
                }).on('select', function() {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    $(target).val(attachment.url);
                }).open();
            });
        });
        </script>
    </div>
    <?php
}

/**
 * 4. Injeta Tags de SEO Avançadas, OpenGraph, Geo-Targeting e Schema.org no <head>
 */
function jsa_inject_seo_head() {
    // Proteção de Área Logada (Regra 7)
    if ( is_admin() ) {
        echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
        return;
    }

    $title = get_option( 'jsa_site_title', 'Advogado em Aracaju | Jorge Santos Advocacia e Consultoria Jurídica' );
    $desc = get_option( 'jsa_site_description', 'Procurando advogado em Aracaju? Jorge Santos Advocacia e Consultoria Jurídica oferece atendimento estratégico em Direito Trabalhista, Divórcio, Imobiliário, Empresarial e Inventário em Sergipe. Fale no WhatsApp.' );
    $keywords = get_option( 'jsa_keywords', 'advogado em aracaju, advogado aracaju, advogado trabalhista aracaju, advogado divórcio aracaju, advogado imobiliário aracaju, advogado empresarial aracaju, inventário em aracaju, escritório de advocacia aracaju sergipe' );
    $email = get_option( 'jsa_email', 'contato@advogadoonlinearacaju.com.br' );
    
    // Resoluções Dinâmicas e Inteligentes
    $current_url = jsa_get_site_url( '/' );
    $og_image = jsa_get_og_image_url();
    $custom_favicon = get_option( 'jsa_custom_favicon' ) ?: ( function_exists( 'get_site_icon_url' ) && get_site_icon_url( 32 ) ? get_site_icon_url( 32 ) : jsa_get_site_url( '/wp-content/themes/hello-elementor/assets/images/favicon-32x32.png' ) );
    $custom_favicon_large = get_option( 'jsa_custom_favicon' ) ?: ( function_exists( 'get_site_icon_url' ) && get_site_icon_url( 192 ) ? get_site_icon_url( 192 ) : jsa_get_site_url( '/wp-content/themes/hello-elementor/assets/images/favicon-192x192.png' ) );

    // FAQ items para Schema JSON-LD
    $post_id = get_option( 'page_on_front' ) ?: 14;
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

    $faq_schema_items = [];
    foreach ( $saved_faqs as $item ) {
        if ( ! empty( $item['q'] ) && ! empty( $item['a'] ) ) {
            $faq_schema_items[] = [
                '@type' => 'Question',
                'name' => wp_strip_all_tags( $item['q'] ),
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => wp_strip_all_tags( $item['a'] )
                ]
            ];
        }
    }

    ?>
    <!-- ========================================== -->
    <!-- JORGE SANTOS ADVOCACIA - ADVANCED SEO META -->
    <!-- ========================================== -->
    <title><?php echo esc_html( $title ); ?></title>
    <meta name="description" content="<?php echo esc_attr( $desc ); ?>" />
    <meta name="keywords" content="<?php echo esc_attr( $keywords ); ?>" />
    <meta name="author" content="Jorge Santos Advocacia e Consultoria Jurídica" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <link rel="canonical" href="<?php echo esc_url( $current_url ); ?>" />

    <!-- FAVICON OFICIAL JS DOURADO (ANTI-CACHE DINÂMICO) -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( $custom_favicon . ( strpos( $custom_favicon, '?' ) === false ? '?v=' . time() : '' ) ); ?>" />
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( $custom_favicon_large . ( strpos( $custom_favicon_large, '?' ) === false ? '?v=' . time() : '' ) ); ?>" />
    <link rel="shortcut icon" href="<?php echo esc_url( $custom_favicon . ( strpos( $custom_favicon, '?' ) === false ? '?v=' . time() : '' ) ); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( $custom_favicon_large . ( strpos( $custom_favicon_large, '?' ) === false ? '?v=' . time() : '' ) ); ?>" />

    <!-- GEO-TARGETING / LOCAL SEO ARACAJU - SERGIPE -->
    <meta name="geo.region" content="BR-SE" />
    <meta name="geo.placename" content="Aracaju" />
    <meta name="geo.position" content="-10.947247;-37.073082" />
    <meta name="ICBM" content="-10.947247, -37.073082" />

    <!-- OPEN GRAPH / FACEBOOK / WHATSAPP PREVIEW (URL DINÂMICA) -->
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>" />
    <meta property="og:description" content="<?php echo esc_attr( $desc ); ?>" />
    <meta property="og:url" content="<?php echo esc_url( $current_url ); ?>" />
    <meta property="og:site_name" content="Jorge Santos Advocacia e Consultoria Jurídica" />
    <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>" />
    <meta property="og:image:secure_url" content="<?php echo esc_url( $og_image ); ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="Jorge Santos Advocacia e Consultoria Jurídica - Aracaju / SE" />

    <!-- TWITTER CARDS -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr( $desc ); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url( $og_image ); ?>" />

    <!-- ======================================================== -->
    <!-- SCHEMA.ORG 1: LEGAL SERVICE & LOCAL BUSINESS (GOOGLE MAPS) -->
    <!-- ======================================================== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LegalService",
      "name": "Jorge Santos Advocacia e Consultoria Jurídica",
      "alternateName": "Advogado em Aracaju - Jorge Santos Advocacia",
      "image": "<?php echo esc_url( $og_image ); ?>",
      "@id": "<?php echo esc_url( $current_url ); ?>#legalservice",
      "url": "<?php echo esc_url( $current_url ); ?>",
      "telephone": "+55-79-99920-2205",
      "email": "<?php echo esc_attr( $email ); ?>",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Aracaju",
        "addressRegion": "SE",
        "addressCountry": "BR"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": -10.947247,
        "longitude": -37.073082
      },
      "areaServed": [
        { "@type": "City", "name": "Aracaju" },
        { "@type": "City", "name": "Nossa Senhora do Socorro" },
        { "@type": "City", "name": "São Cristóvão" },
        { "@type": "City", "name": "Barra dos Coqueiros" },
        { "@type": "City", "name": "Lagarto" },
        { "@type": "City", "name": "Itabaiana" },
        { "@type": "City", "name": "Estância" },
        { "@type": "State", "name": "Sergipe" },
        { "@type": "Country", "name": "Brasil" }
      ],
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "08:00",
        "closes": "18:00"
      },
      "sameAs": [
        "https://www.instagram.com/advogado.online.aracaju",
        "https://web.facebook.com/profile.php?id=61594068069533"
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Especialidades Jurídicas",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Direito Trabalhista em Aracaju",
              "description": "Defesa de direitos de empregados, rescisão indireta, verbas rescisórias, horas extras, FGTS e assessoria empresarial."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Advogado para Divórcio em Aracaju",
              "description": "Divórcio consensual ou litigioso, partilha de bens, guarda de filhos, pensão alimentícia e união estável."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Direito Imobiliário em Aracaju",
              "description": "Contratos imobiliários, regularização de imóveis, usucapião, distrato imobiliário, atraso de obras e locação."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Advogado Empresarial em Aracaju",
              "description": "Contratos, recuperação de crédito, negociação empresarial, conflitos entre sócios e consultoria preventiva."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Advogado para Inventário em Aracaju",
              "description": "Inventário judicial e extrajudicial em cartório, partilha de bens, herança e assessoria sucessória."
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Advogado para Erro Médico, Saúde e Estética em Aracaju",
              "description": "Orientação jurídica em casos de erro médico e odontológico, cirurgia plástica, procedimentos estéticos malsucedidos, falha de diagnóstico e negativa de plano de saúde."
            }
          }
        ]
      }
    }
    </script>

    <!-- ======================================================== -->
    <!-- SCHEMA.ORG 2: PERSON (DR. JORGE SANTOS - ADVOGADO) -->
    <!-- ======================================================== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Dr. Jorge Santos",
      "jobTitle": "Advogado",
      "worksFor": {
        "@type": "LegalService",
        "name": "Jorge Santos Advocacia e Consultoria Jurídica"
      },
      "memberOf": {
        "@type": "Organization",
        "name": "Ordem dos Advogados do Brasil (OAB)"
      },
      "image": "<?php echo esc_url( $og_image ); ?>",
      "url": "<?php echo esc_url( $current_url ); ?>"
    }
    </script>

    <?php if ( ! empty( $faq_schema_items ) ) : ?>
    <!-- ======================================================== -->
    <!-- SCHEMA.ORG 3: FAQPage (GOOGLE RICH SNIPPETS EXPANDABLE) -->
    <!-- ======================================================== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": <?php echo json_encode( $faq_schema_items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>
    }
    </script>
    <?php endif; ?>

    <!-- ======================================================== -->
    <!-- SCHEMA.ORG 4: BREADCRUMBLIST -->
    <!-- ======================================================== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Início",
          "item": "<?php echo esc_url( $current_url ); ?>"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Advogado em Aracaju",
          "item": "<?php echo esc_url( $current_url ); ?>"
        }
      ]
    }
    </script>
    <?php
}
add_action( 'wp_head', 'jsa_inject_seo_head', 1 );

/**
 * Filtro Global para garantir que qualquer chamada nativa a get_site_icon_url
 * retorne o novo Favicon Oficial do Templo/Colunas Dourado
 */
add_filter( 'get_site_icon_url', function( $url, $size, $blog_id ) {
    if ( $size >= 180 ) {
        return jsa_get_site_url( '/wp-content/themes/hello-elementor/assets/images/favicon-192x192.png' );
    }
    return jsa_get_site_url( '/wp-content/themes/hello-elementor/assets/images/favicon-32x32.png' );
}, 999, 3 );

// Remove tags nativas de site icon do core do WP para evitar duplicatas antigas
remove_action( 'wp_head', 'wp_site_icon', 99 );

/**
 * 5. Garante a geração de robots.txt com link dinâmico para sitemap.xml
 */
function jsa_custom_robots_txt( $output, $public ) {
    if ( '1' == $public ) {
        $output  = "User-agent: *\n";
        $output .= "Allow: /\n";
        $output .= "Disallow: /wp-admin/\n";
        $output .= "Allow: /wp-admin/admin-ajax.php\n";
        $output .= "Sitemap: " . esc_url( jsa_get_site_url( '/sitemap.xml' ) ) . "\n";
    }
    return $output;
}
add_filter( 'robots_txt', 'jsa_custom_robots_txt', 10, 2 );

/**
 * 6. Rota Virtual para Sitemap.xml Dinâmico de Alta Performance
 */
function jsa_virtual_sitemap() {
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    if ( strpos( $request_uri, '/sitemap.xml' ) !== false ) {
        header( 'Content-Type: application/xml; charset=utf-8' );
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        echo '  <url>' . "\n";
        echo '    <loc>' . esc_url( jsa_get_site_url( '/' ) ) . '</loc>' . "\n";
        echo '    <lastmod>' . date( 'Y-m-d' ) . '</lastmod>' . "\n";
        echo '    <changefreq>weekly</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";
        echo '</urlset>';
        exit;
    }
}
add_action( 'init', 'jsa_virtual_sitemap' );
