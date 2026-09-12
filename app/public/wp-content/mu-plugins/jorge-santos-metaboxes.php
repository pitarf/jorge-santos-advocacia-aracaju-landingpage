<?php
/**
 * Plugin Name: Jorge Santos - Gerenciador Dinâmico de Conteúdo (Edit Page)
 * Description: Adiciona painéis dinâmicos com suporte a Adicionar/Remover Áreas de Atuação e Perguntas Frequentes (FAQ) diretamente na tela "Editar Página".
 * Version: 2.0.0
 * Author: Jorge Santos Advocacia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registra as Metaboxes na tela de Edição de Página
 */
function jsa_register_page_metaboxes() {
    global $post;
    if ( ! $post ) {
        return;
    }

    $front_page_id = get_option( 'page_on_front' );
    if ( $post->ID == $front_page_id || $post->ID == 14 || get_page_template_slug( $post->ID ) === 'front-page.php' ) {
        add_meta_box(
            'jsa_branding_metabox',
            '🎨 Identidade Visual (Logos & Favicon do Site)',
            'jsa_render_branding_metabox',
            'page',
            'normal',
            'high'
        );

        add_meta_box(
            'jsa_hero_metabox',
            '🌟 Seção Principal (Hero - Título, Textos e Foto Principal)',
            'jsa_render_hero_metabox',
            'page',
            'normal',
            'high'
        );

        add_meta_box(
            'jsa_secoes_texto_metabox',
            '📝 Títulos & Textos das Seções (Atendimento e Análise)',
            'jsa_render_secoes_texto_metabox',
            'page',
            'normal',
            'default'
        );

        add_meta_box(
            'jsa_areas_metabox',
            '⚖️ Áreas de Atuação (Adicionar, Editar e Remover Áreas)',
            'jsa_render_areas_metabox',
            'page',
            'normal',
            'high'
        );

        add_meta_box(
            'jsa_distrato_pv_metabox',
            '🏡 Seções Especiais (Distrato de Lotes & Proteção Veicular)',
            'jsa_render_distrato_pv_metabox',
            'page',
            'normal',
            'default'
        );

        add_meta_box(
            'jsa_sobre_metabox',
            '👤 Seção Sobre o Advogado (Bio e Foto)',
            'jsa_render_sobre_metabox',
            'page',
            'normal',
            'default'
        );

        add_meta_box(
            'jsa_faq_metabox',
            '❓ Perguntas Frequentes (FAQ - Adicionar e Remover Dúvidas)',
            'jsa_render_faq_metabox',
            'page',
            'normal',
            'default'
        );

        add_meta_box(
            'jsa_contatos_metabox',
            '📞 Contatos, WhatsApp e Redes Sociais',
            'jsa_render_contatos_metabox',
            'page',
            'normal',
            'default'
        );
    }
}
add_action( 'add_meta_boxes', 'jsa_register_page_metaboxes' );

/**
 * Enqueue Media Uploader scripts na tela de edição
 */
function jsa_admin_scripts( $hook ) {
    if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'jsa_admin_scripts' );

// -------------------------------------------------------------
// RENDER BRANDING METABOX (LOGOS & FAVICON)
// -------------------------------------------------------------
function jsa_render_branding_metabox( $post ) {
    wp_nonce_field( 'jsa_save_metabox_data', 'jsa_metabox_nonce' );

    $header_logo = get_post_meta( $post->ID, 'jsa_header_logo', true ) ?: get_option( 'jsa_header_logo', home_url( '/wp-content/uploads/2026/08/logo_jfs_horizontal.png' ) );
    $footer_logo = get_post_meta( $post->ID, 'jsa_footer_logo', true ) ?: get_option( 'jsa_footer_logo', home_url( '/wp-content/uploads/2026/08/logo_jfs_horizontal.png' ) );
    $favicon = get_post_meta( $post->ID, 'jsa_custom_favicon', true ) ?: get_option( 'jsa_custom_favicon', home_url( '/wp-content/uploads/2026/08/cropped-logo-1-1-32x32.jpeg' ) );
    ?>
    <p style="color: #64748B; font-size: 13px; margin-bottom: 15px;">
        💡 Altere a <strong>Logomarca Principal</strong>, a <strong>Logo do Rodapé</strong> e o <strong>Favicon</strong> da página diretamente aqui pelo uploader de imagens:
    </p>
    <div style="display: grid; gap: 15px; font-size: 14px;">
        <div>
            <label><strong>Logomarca do Cabeçalho (Header):</strong></label>
            <div style="display: flex; gap: 10px; align-items: center; margin-top: 5px;">
                <input type="text" id="jsa_header_logo_input" name="jsa_header_logo" value="<?php echo esc_url( $header_logo ); ?>" style="flex: 1;" />
                <button type="button" class="button jsa-upload-btn" data-target="#jsa_header_logo_input">Selecionar Imagem</button>
            </div>
            <?php if ( $header_logo ) : ?>
                <div style="margin-top: 8px; padding: 8px; background: #0E1928; display: inline-block; border-radius: 6px;">
                    <img src="<?php echo esc_url( $header_logo ); ?>" style="max-height: 45px; display: block;" />
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label><strong>Logomarca do Rodapé (Footer):</strong></label>
            <div style="display: flex; gap: 10px; align-items: center; margin-top: 5px;">
                <input type="text" id="jsa_footer_logo_input" name="jsa_footer_logo" value="<?php echo esc_url( $footer_logo ); ?>" style="flex: 1;" />
                <button type="button" class="button jsa-upload-btn" data-target="#jsa_footer_logo_input">Selecionar Imagem</button>
            </div>
            <?php if ( $footer_logo ) : ?>
                <div style="margin-top: 8px; padding: 8px; background: #0E1928; display: inline-block; border-radius: 6px;">
                    <img src="<?php echo esc_url( $footer_logo ); ?>" style="max-height: 45px; display: block;" />
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label><strong>Ícone do Site / Favicon:</strong></label>
            <div style="display: flex; gap: 10px; align-items: center; margin-top: 5px;">
                <input type="text" id="jsa_custom_favicon_input" name="jsa_custom_favicon" value="<?php echo esc_url( $favicon ); ?>" style="flex: 1;" />
                <button type="button" class="button jsa-upload-btn" data-target="#jsa_custom_favicon_input">Selecionar Imagem</button>
            </div>
            <?php if ( $favicon ) : ?>
                <div style="margin-top: 8px; display: inline-block;">
                    <img src="<?php echo esc_url( $favicon ); ?>" style="max-height: 32px; max-width: 32px; border: 1px solid #CBD5E1; border-radius: 4px;" />
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

// -------------------------------------------------------------
// RENDER SEÇÕES TEXTO METABOX (ATENDIMENTO & ANÁLISE)
// -------------------------------------------------------------
function jsa_render_secoes_texto_metabox( $post ) {
    $atendimento_badge = get_post_meta( $post->ID, 'jsa_atendimento_badge', true ) ?: 'Atendimento Jurídico em Aracaju';
    $atendimento_title = get_post_meta( $post->ID, 'jsa_atendimento_title', true ) ?: 'Nem todo problema precisa se transformar em um processo longo';
    $atendimento_desc = get_post_meta( $post->ID, 'jsa_atendimento_desc', true ) ?: 'Em muitos casos, uma orientação jurídica adequada desde o início pode evitar decisões precipitadas, reduzir riscos e indicar o caminho mais adequado para solucionar a situação.';

    $analise_badge = get_post_meta( $post->ID, 'jsa_analise_badge', true ) ?: 'Análise Jurídica Personalizada';
    $analise_title = get_post_meta( $post->ID, 'jsa_analise_title', true ) ?: 'Seu Caso Precisa de uma Análise Individual';
    $analise_desc = get_post_meta( $post->ID, 'jsa_analise_desc', true ) ?: 'Na advocacia, situações aparentemente semelhantes podem ter resultados jurídicos completamente diferentes. Um documento, uma cláusula contratual, uma data, uma mensagem ou um pagamento específico pode alterar significativamente a análise.';
    ?>
    <div style="display: grid; gap: 15px; font-size: 14px;">
        <div style="border-bottom: 1px solid #E2E8F0; padding-bottom: 15px;">
            <h4 style="margin-top: 0; color: #0E1928;">📍 Seção Atendimento Jurídico em Aracaju</h4>
            <div style="margin-bottom: 8px;">
                <label><strong>Selo Superior:</strong></label>
                <input type="text" name="jsa_atendimento_badge" value="<?php echo esc_attr( $atendimento_badge ); ?>" style="width: 100%;" />
            </div>
            <div style="margin-bottom: 8px;">
                <label><strong>Título da Seção:</strong></label>
                <input type="text" name="jsa_atendimento_title" value="<?php echo esc_attr( $atendimento_title ); ?>" style="width: 100%; font-weight: bold;" />
            </div>
            <div>
                <label><strong>Texto Explicativo:</strong></label>
                <textarea name="jsa_atendimento_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $atendimento_desc ); ?></textarea>
            </div>
        </div>

        <div>
            <h4 style="margin-top: 0; color: #0E1928;">🔍 Seção Análise Individual do Caso</h4>
            <div style="margin-bottom: 8px;">
                <label><strong>Selo Superior:</strong></label>
                <input type="text" name="jsa_analise_badge" value="<?php echo esc_attr( $analise_badge ); ?>" style="width: 100%;" />
            </div>
            <div style="margin-bottom: 8px;">
                <label><strong>Título da Seção:</strong></label>
                <input type="text" name="jsa_analise_title" value="<?php echo esc_attr( $analise_title ); ?>" style="width: 100%; font-weight: bold;" />
            </div>
            <div>
                <label><strong>Texto Explicativo:</strong></label>
                <textarea name="jsa_analise_desc" rows="2" style="width: 100%;"><?php echo esc_textarea( $analise_desc ); ?></textarea>
            </div>
        </div>
    </div>
    <?php
}

// -------------------------------------------------------------
// RENDER HERO METABOX
// -------------------------------------------------------------
function jsa_render_hero_metabox( $post ) {
    wp_nonce_field( 'jsa_save_metabox_data', 'jsa_metabox_nonce' );

    $badge = get_post_meta( $post->ID, 'jsa_hero_badge', true ) ?: 'Advocacia Especializada em Aracaju - SE';
    $title = get_post_meta( $post->ID, 'jsa_hero_title', true ) ?: 'Precisa de Advogado em Aracaju?';
    $subtitle = get_post_meta( $post->ID, 'jsa_hero_subtitle', true ) ?: 'Atendimento jurídico para quem precisa tomar uma decisão com segurança. A Jorge Santos Advocacia e Consultoria Jurídica presta atendimento estratégico em demandas trabalhistas, divórcio, Direito Imobiliário, Direito Empresarial e Inventário em Sergipe.';
    $cta_text = get_post_meta( $post->ID, 'jsa_hero_cta_text', true ) ?: 'Falar com o Advogado no WhatsApp';
    $cta_link = get_post_meta( $post->ID, 'jsa_hero_cta_link', true ) ?: 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+atendimento+jur%C3%ADdico+em+Aracaju.';
    $image_url = get_post_meta( $post->ID, 'jsa_hero_image', true ) ?: home_url( '/wp-content/uploads/2026/08/foto-1.jpeg' );
    ?>
    <div style="display: grid; gap: 15px; font-size: 14px;">
        <div>
            <label><strong>Selo Superior (Badge):</strong></label>
            <input type="text" name="jsa_hero_badge" value="<?php echo esc_attr( $badge ); ?>" style="width: 100%;" />
        </div>
        <div>
            <label><strong>Título Principal (Headline):</strong></label>
            <input type="text" name="jsa_hero_title" value="<?php echo esc_attr( $title ); ?>" style="width: 100%; font-size: 16px; font-weight: bold;" />
        </div>
        <div>
            <label><strong>Texto Descritivo:</strong></label>
            <textarea name="jsa_hero_subtitle" rows="3" style="width: 100%;"><?php echo esc_textarea( $subtitle ); ?></textarea>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div>
                <label><strong>Texto do Botão Principal:</strong></label>
                <input type="text" name="jsa_hero_cta_text" value="<?php echo esc_attr( $cta_text ); ?>" style="width: 100%;" />
            </div>
            <div>
                <label><strong>Link do WhatsApp (CTA):</strong></label>
                <input type="url" name="jsa_hero_cta_link" value="<?php echo esc_url( $cta_link ); ?>" style="width: 100%;" />
            </div>
        </div>
        <div>
            <label><strong>Foto Principal do Advogado (Hero):</strong></label>
            <div style="display: flex; gap: 10px; align-items: center; margin-top: 5px;">
                <input type="text" id="jsa_hero_image" name="jsa_hero_image" value="<?php echo esc_url( $image_url ); ?>" style="flex: 1;" />
                <button type="button" class="button jsa-upload-btn" data-target="#jsa_hero_image">Selecionar Foto</button>
            </div>
            <?php if ( $image_url ) : ?>
                <div style="margin-top: 10px;">
                    <img src="<?php echo esc_url( $image_url ); ?>" style="max-height: 100px; border-radius: 8px; border: 2px solid #D1A748;" />
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

// -------------------------------------------------------------
// RENDER ÁREAS DE ATUAÇÃO DINÂMICAS (REPEATER)
// -------------------------------------------------------------
function jsa_get_default_areas() {
    return [
        [
            'title' => 'Direito Trabalhista',
            'subtitle' => 'DIREITO TRABALHISTA EM ARACAJU',
            'desc' => 'Demissões, verbas, rescisão, horas extras e defesa empresarial',
            'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+atendimento+em+Direito+Trabalhista+em+Aracaju.',
            'icon' => 'fa-briefcase',
            'featured' => '1'
        ],
        [
            'title' => 'Divórcio e Família',
            'subtitle' => 'DIVÓRCIO E DIREITO DE FAMÍLIA EM ARACAJU',
            'desc' => 'Divórcio, guarda, alimentos, união estável e partilha',
            'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+atendimento+para+Div%C3%B3rcio+em+Aracaju.',
            'icon' => 'fa-people-roof',
            'featured' => '1'
        ],
        [
            'title' => 'Direito Imobiliário',
            'subtitle' => 'ADVOGADO IMOBILIÁRIO EM ARACAJU',
            'desc' => 'Compra e venda, distrato, atraso de obras, usucapião e locação',
            'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+orienta%C3%A7%C3%A3o+em+Direito+Imobili%C3%A1rio+em+Aracaju.',
            'icon' => 'fa-house-chimney',
            'featured' => '1'
        ],
        [
            'title' => 'Direito Empresarial',
            'subtitle' => 'DIREITO EMPRESARIAL EM ARACAJU',
            'desc' => 'Contratos, cobrança, prevenção de riscos e conflitos societários',
            'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+gostaria+de+assessoria+jur%C3%ADdica+empresarial+em+Aracaju.',
            'icon' => 'fa-building-shield',
            'featured' => '1'
        ],
        [
            'title' => 'Inventário e Herança',
            'subtitle' => 'INVENTÁRIO E HERANÇA EM ARACAJU',
            'desc' => 'Inventário judicial e extrajudicial, partilha e sucessões',
            'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+orienta%C3%A7%C3%A3o+sobre+Invent%C3%A1rio+em+Aracaju.',
            'icon' => 'fa-landmark',
            'featured' => '1'
        ],
        [
            'title' => 'Erro Médico, Saúde e Estética',
            'subtitle' => 'ERRO MÉDICO, SAÚDE E ESTÉTICA EM ARACAJU',
            'desc' => 'Falhas médicas, odontológicas, procedimentos estéticos e planos de saúde',
            'link' => 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+preciso+de+orienta%C3%A7%C3%A3o+jur%C3%ADdica+sobre+Erro+M%C3%A9dico+ou+Sa%C3%BAde+em+Aracaju.',
            'icon' => 'fa-user-doctor',
            'featured' => '1'
        ]
    ];
}

function jsa_render_areas_metabox( $post ) {
    $saved_areas = get_post_meta( $post->ID, 'jsa_areas_list', true );
    if ( ! is_array( $saved_areas ) || empty( $saved_areas ) ) {
        $saved_areas = jsa_get_default_areas();
    }
    ?>
    <p style="color: #64748B; font-size: 13px; margin-bottom: 15px;">
        💡 Aqui você pode <strong>editar</strong>, <strong>adicionar novas áreas</strong> ou <strong>remover áreas existentes</strong>. O site ajustará o layout e os botões automaticamente!
    </p>

    <div id="jsa-areas-container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <?php foreach ( $saved_areas as $index => $area ) : ?>
            <div class="jsa-area-item" style="border: 1px solid #CBD5E1; border-left: 4px solid #D1A748; padding: 15px; border-radius: 8px; background: #FAFBFD; position: relative;">
                <button type="button" class="button jsa-remove-area-btn" style="position: absolute; top: 10px; right: 10px; color: #DC2626; border-color: #FCA5A5; background: #FEF2F2;" title="Excluir esta área">🗑️ Remover</button>
                <h4 style="margin: 0 0 10px 0; color: #0E1928;">Área <span class="jsa-area-num"><?php echo $index + 1; ?></span></h4>
                
                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Título da Área:</label>
                    <input type="text" name="jsa_areas[<?php echo $index; ?>][title]" value="<?php echo esc_attr( $area['title'] ?? '' ); ?>" style="width: 100%;" required />
                </div>

                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Subtítulo / Destaque Curto:</label>
                    <input type="text" name="jsa_areas[<?php echo $index; ?>][subtitle]" value="<?php echo esc_attr( $area['subtitle'] ?? '' ); ?>" style="width: 100%;" />
                </div>

                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Descrição Completa:</label>
                    <textarea name="jsa_areas[<?php echo $index; ?>][desc]" rows="2" style="width: 100%; font-size: 12px;"><?php echo esc_textarea( $area['desc'] ?? '' ); ?></textarea>
                </div>

                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Link do WhatsApp (CTA):</label>
                    <input type="url" name="jsa_areas[<?php echo $index; ?>][link]" value="<?php echo esc_url( $area['link'] ?? '' ); ?>" style="width: 100%;" />
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; align-items: center; margin-top: 10px; padding-top: 10px; border-top: 1px dashed #E2E8F0;">
                    <div>
                        <label style="font-size: 11px; font-weight: bold; display: block;">Ícone (FontAwesome):</label>
                        <input type="text" name="jsa_areas[<?php echo $index; ?>][icon]" value="<?php echo esc_attr( $area['icon'] ?? 'fa-scale-balanced' ); ?>" style="width: 100%;" placeholder="Ex: fa-user-tie" />
                    </div>
                    <div>
                        <label style="font-size: 11px; font-weight: bold; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                            <input type="checkbox" name="jsa_areas[<?php echo $index; ?>][featured]" value="1" <?php checked( $area['featured'] ?? '0', '1' ); ?> />
                            ⭐ Destaque Dourado
                        </label>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div style="margin-top: 20px; text-align: left;">
        <button type="button" id="jsa-add-area-btn" class="button button-primary" style="background: #D1A748; border-color: #B38B2F; font-weight: bold; padding: 6px 16px;">
            ➕ Adicionar Nova Área de Atuação
        </button>
    </div>

    <script>
    jQuery(document).ready(function($){
        var areaIndex = <?php echo count( $saved_areas ); ?>;

        $('#jsa-add-area-btn').click(function(){
            var newCard = `
            <div class="jsa-area-item" style="border: 1px solid #CBD5E1; border-left: 4px solid #D1A748; padding: 15px; border-radius: 8px; background: #FAFBFD; position: relative;">
                <button type="button" class="button jsa-remove-area-btn" style="position: absolute; top: 10px; right: 10px; color: #DC2626; border-color: #FCA5A5; background: #FEF2F2;" title="Excluir esta área">🗑️ Remover</button>
                <h4 style="margin: 0 0 10px 0; color: #0E1928;">Nova Área</h4>
                
                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Título da Área:</label>
                    <input type="text" name="jsa_areas[`+areaIndex+`][title]" placeholder="Ex: Direito Previdenciário" style="width: 100%;" required />
                </div>

                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Subtítulo / Destaque Curto:</label>
                    <input type="text" name="jsa_areas[`+areaIndex+`][subtitle]" placeholder="Ex: Aposentadoria e auxílios" style="width: 100%;" />
                </div>

                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Descrição Completa:</label>
                    <textarea name="jsa_areas[`+areaIndex+`][desc]" rows="2" placeholder="Descreva os serviços prestados nesta área..." style="width: 100%; font-size: 12px;"></textarea>
                </div>

                <div style="margin-bottom: 8px;">
                    <label style="font-size: 11px; font-weight: bold; display: block;">Link do WhatsApp (CTA):</label>
                    <input type="url" name="jsa_areas[`+areaIndex+`][link]" value="https://wa.me/5579999202205" style="width: 100%;" />
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; align-items: center; margin-top: 10px; padding-top: 10px; border-top: 1px dashed #E2E8F0;">
                    <div>
                        <label style="font-size: 11px; font-weight: bold; display: block;">Ícone (FontAwesome):</label>
                        <input type="text" name="jsa_areas[`+areaIndex+`][icon]" value="fa-scale-balanced" style="width: 100%;" />
                    </div>
                    <div>
                        <label style="font-size: 11px; font-weight: bold; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                            <input type="checkbox" name="jsa_areas[`+areaIndex+`][featured]" value="1" />
                            ⭐ Destaque Dourado
                        </label>
                    </div>
                </div>
            </div>`;
            $('#jsa-areas-container').append(newCard);
            areaIndex++;
        });

        $(document).on('click', '.jsa-remove-area-btn', function(){
            if (confirm('Tem certeza que deseja remover esta área de atuação?')) {
                $(this).closest('.jsa-area-item').remove();
            }
        });
    });
    </script>
    <?php
}

// -------------------------------------------------------------
// RENDER DISTRATO & PROTEÇÃO VEICULAR METABOX
// -------------------------------------------------------------
function jsa_render_distrato_pv_metabox( $post ) {
    $distrato_title = get_post_meta( $post->ID, 'jsa_distrato_title', true ) ?: 'Comprou um Lote e as Parcelas Ficaram Pesadas Demais?';
    $distrato_desc = get_post_meta( $post->ID, 'jsa_distrato_desc', true ) ?: 'Muitos compradores adquirem lotes ou imóveis na planta e, após aumentos sucessivos nas parcelas ou mudança financeira, não conseguem mais manter os pagamentos. Não abandone seu contrato sem orientação jurídica!';
    $distrato_link = get_post_meta( $post->ID, 'jsa_distrato_link', true ) ?: 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+comprei+um+lote+e+preciso+de+orienta%C3%A7%C3%A3o+para+distrato/cancelamento.';

    $pv_title = get_post_meta( $post->ID, 'jsa_pv_title', true ) ?: 'Assessoria Jurídica e Defesa para Associações de Proteção Veicular';
    $pv_desc = get_post_meta( $post->ID, 'jsa_pv_desc', true ) ?: 'As associações de proteção veicular necessitam de instrumentos jurídicos sólidos e bem estruturados para garantir a sustentabilidade do grupo mútuo e a segurança jurídica nas relações com associados, oficinas e fornecedores.';
    $pv_link = get_post_meta( $post->ID, 'jsa_pv_link', true ) ?: 'https://wa.me/5579999202205?text=Ol%C3%A1%2C+gostaria+de+conversar+sobre+assessoria+para+Associa%C3%A7%C3%A3o+de+Prote%C3%A7%C3%A3o+Veicular.';
    $pv_image = get_post_meta( $post->ID, 'jsa_pv_image', true ) ?: home_url( '/wp-content/uploads/2026/08/foto-2.jpeg' );
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div style="border: 1px solid #E2E8F0; padding: 15px; border-radius: 8px;">
            <h4 style="margin-top: 0; color: #0E1928;">🏡 Distrato de Lotes & Imóveis</h4>
            <p><label><strong>Título:</strong></label><input type="text" name="jsa_distrato_title" value="<?php echo esc_attr( $distrato_title ); ?>" style="width: 100%;" /></p>
            <p><label><strong>Descrição:</strong></label><textarea name="jsa_distrato_desc" rows="3" style="width: 100%;"><?php echo esc_textarea( $distrato_desc ); ?></textarea></p>
            <p><label><strong>Link WhatsApp:</strong></label><input type="url" name="jsa_distrato_link" value="<?php echo esc_url( $distrato_link ); ?>" style="width: 100%;" /></p>
        </div>

        <div style="border: 1px solid #E2E8F0; padding: 15px; border-radius: 8px;">
            <h4 style="margin-top: 0; color: #0E1928;">🚗 Associações de Proteção Veicular</h4>
            <p><label><strong>Título:</strong></label><input type="text" name="jsa_pv_title" value="<?php echo esc_attr( $pv_title ); ?>" style="width: 100%;" /></p>
            <p><label><strong>Descrição:</strong></label><textarea name="jsa_pv_desc" rows="3" style="width: 100%;"><?php echo esc_textarea( $pv_desc ); ?></textarea></p>
            <p><label><strong>Link WhatsApp:</strong></label><input type="url" name="jsa_pv_link" value="<?php echo esc_url( $pv_link ); ?>" style="width: 100%;" /></p>
            <p><label><strong>Foto Seção Proteção Veicular:</strong></label>
            <input type="text" id="jsa_pv_image" name="jsa_pv_image" value="<?php echo esc_url( $pv_image ); ?>" style="width: 70%;" />
            <button type="button" class="button jsa-upload-btn" data-target="#jsa_pv_image">Selecionar</button></p>
        </div>
    </div>
    <?php
}

// -------------------------------------------------------------
// RENDER SOBRE METABOX
// -------------------------------------------------------------
function jsa_render_sobre_metabox( $post ) {
    $sobre_title = get_post_meta( $post->ID, 'jsa_sobre_title', true ) ?: 'Jorge Santos Advocacia: Advocacia Humanizada, Clara e Transparente';
    $sobre_text1 = get_post_meta( $post->ID, 'jsa_sobre_text1', true ) ?: 'Acreditamos que a relação entre advogado e cliente deve ser pautada na confiança absoluta e na clareza. Você não precisa se sentir confuso com termos técnicos ou burocracias.';
    $sobre_text2 = get_post_meta( $post->ID, 'jsa_sobre_text2', true ) ?: 'Nosso compromisso é ouvir você com atenção, avaliar minuciosamente cada documento e propor estratégias eficazes para proteger seu patrimônio, seus direitos e a tranquilidade da sua família ou da sua empresa.';
    $sobre_image = get_post_meta( $post->ID, 'jsa_sobre_image', true ) ?: home_url( '/wp-content/uploads/2026/08/foto-3.jpeg' );
    ?>
    <div>
        <p><label><strong>Título da Seção Sobre:</strong></label><input type="text" name="jsa_sobre_title" value="<?php echo esc_attr( $sobre_title ); ?>" style="width: 100%;" /></p>
        <p><label><strong>Parágrafo 1:</strong></label><textarea name="jsa_sobre_text1" rows="2" style="width: 100%;"><?php echo esc_textarea( $sobre_text1 ); ?></textarea></p>
        <p><label><strong>Parágrafo 2:</strong></label><textarea name="jsa_sobre_text2" rows="2" style="width: 100%;"><?php echo esc_textarea( $sobre_text2 ); ?></textarea></p>
        <p><label><strong>Foto da Seção Sobre:</strong></label>
        <input type="text" id="jsa_sobre_image" name="jsa_sobre_image" value="<?php echo esc_url( $sobre_image ); ?>" style="width: 70%;" />
        <button type="button" class="button jsa-upload-btn" data-target="#jsa_sobre_image">Selecionar Imagem</button></p>
    </div>
    <?php
}

// -------------------------------------------------------------
// RENDER FAQ METABOX DINÂMICO
// -------------------------------------------------------------
function jsa_get_default_faqs() {
    return [
        [
            'q' => '1. Como funciona o primeiro atendimento com um advogado?',
            'a' => 'O primeiro contato é utilizado para compreender o caso, identificar os principais documentos e avaliar juridicamente as medidas que podem ser adotadas. O atendimento pode ser realizado de forma presencial ou online.'
        ],
        [
            'q' => '2. Posso enviar documentos pelo WhatsApp?',
            'a' => 'Sim. Documentos e informações iniciais podem ser encaminhados pelo WhatsApp para facilitar a análise do caso e o atendimento jurídico.'
        ],
        [
            'q' => '3. Posso contratar o escritório mesmo estando fora de Aracaju?',
            'a' => 'Sim. O escritório realiza atendimento online e pode atuar em processos eletrônicos em outras cidades e estados, de acordo com as particularidades de cada demanda.'
        ],
        [
            'q' => '4. O escritório atua em Direito Trabalhista para empregados e empresas?',
            'a' => 'Sim. O atendimento abrange trabalhadores e empresas em questões como rescisão, verbas trabalhistas, horas extras, acidentes de trabalho, defesa empresarial e consultoria preventiva, sempre observando eventual conflito de interesses.'
        ],
        [
            'q' => '5. O escritório atua com divórcio, guarda e pensão alimentícia?',
            'a' => 'Sim. A atuação em Direito de Família compreende divórcio consensual ou litigioso, guarda dos filhos, pensão alimentícia, regulamentação de convivência, união estável e partilha de bens.'
        ],
        [
            'q' => '6. Quais problemas imobiliários podem ser analisados?',
            'a' => 'O escritório atua em questões envolvendo compra e venda de imóveis, distrato imobiliário, atraso de obras, loteamentos, contratos, locações, despejo, regularização e usucapião.'
        ],
        [
            'q' => '7. O escritório presta assessoria jurídica para empresas?',
            'a' => 'Sim. A atuação empresarial envolve elaboração e revisão de contratos, cobranças, prevenção de riscos, conflitos entre sócios e acompanhamento jurídico das atividades da empresa.'
        ],
        [
            'q' => '8. O escritório realiza inventário e partilha de herança?',
            'a' => 'Sim. O inventário pode ser judicial ou extrajudicial, dependendo das circunstâncias do caso. Também são analisadas questões envolvendo herança, partilha de bens e direitos sucessórios.'
        ],
        [
            'q' => '9. O escritório atua em casos de erro médico e procedimentos estéticos?',
            'a' => 'Sim. Podem ser analisados casos envolvendo possível erro médico ou odontológico, falha em hospitais e clínicas, cirurgia plástica, procedimentos estéticos malsucedidos, falha de diagnóstico e outros danos relacionados à prestação de serviços de saúde.'
        ],
        [
            'q' => '10. Problemas com planos de saúde também são atendidos?',
            'a' => 'Sim. O escritório pode analisar negativas de cobertura, tratamentos, cirurgias, medicamentos, exames, internações, reembolsos e outras controvérsias envolvendo planos de saúde.'
        ]
    ];
}

function jsa_render_faq_metabox( $post ) {
    $saved_faqs = get_post_meta( $post->ID, 'jsa_faqs_list', true );
    if ( ! is_array( $saved_faqs ) || empty( $saved_faqs ) ) {
        $saved_faqs = jsa_get_default_faqs();
    }
    ?>
    <p style="color: #64748B; font-size: 13px; margin-bottom: 15px;">
        💡 Adicione, edite ou remova perguntas frequentes com facilidade:
    </p>

    <div id="jsa-faqs-container" style="display: grid; gap: 15px;">
        <?php foreach ( $saved_faqs as $findex => $faq ) : ?>
            <div class="jsa-faq-item" style="border: 1px solid #CBD5E1; padding: 12px; border-radius: 8px; background: #FFFFFF; position: relative;">
                <button type="button" class="button jsa-remove-faq-btn" style="position: absolute; top: 10px; right: 10px; color: #DC2626; border-color: #FCA5A5; background: #FEF2F2;" title="Remover Pergunta">🗑️ Remover</button>
                <label style="font-weight: bold; display: block; margin-bottom: 4px;">Pergunta <span class="jsa-faq-num"><?php echo $findex + 1; ?></span>:</label>
                <input type="text" name="jsa_faqs[<?php echo $findex; ?>][q]" value="<?php echo esc_attr( $faq['q'] ?? '' ); ?>" style="width: 100%; margin-bottom: 8px;" required />
                <label style="font-weight: bold; display: block; margin-bottom: 4px;">Resposta:</label>
                <textarea name="jsa_faqs[<?php echo $findex; ?>][a]" rows="2" style="width: 100%;"><?php echo esc_textarea( $faq['a'] ?? '' ); ?></textarea>
            </div>
        <?php endforeach; ?>
    </div>

    <div style="margin-top: 15px;">
        <button type="button" id="jsa-add-faq-btn" class="button" style="border-color: #D1A748; color: #B38B2F; font-weight: bold;">
            ➕ Adicionar Nova Pergunta no FAQ
        </button>
    </div>

    <script>
    jQuery(document).ready(function($){
        var faqIndex = <?php echo count( $saved_faqs ); ?>;

        $('#jsa-add-faq-btn').click(function(){
            var newFaq = `
            <div class="jsa-faq-item" style="border: 1px solid #CBD5E1; padding: 12px; border-radius: 8px; background: #FFFFFF; position: relative;">
                <button type="button" class="button jsa-remove-faq-btn" style="position: absolute; top: 10px; right: 10px; color: #DC2626; border-color: #FCA5A5; background: #FEF2F2;" title="Remover Pergunta">🗑️ Remover</button>
                <label style="font-weight: bold; display: block; margin-bottom: 4px;">Nova Pergunta:</label>
                <input type="text" name="jsa_faqs[`+faqIndex+`][q]" placeholder="Digite a pergunta..." style="width: 100%; margin-bottom: 8px;" required />
                <label style="font-weight: bold; display: block; margin-bottom: 4px;">Resposta:</label>
                <textarea name="jsa_faqs[`+faqIndex+`][a]" rows="2" placeholder="Digite a resposta explicativa..." style="width: 100%;"></textarea>
            </div>`;
            $('#jsa-faqs-container').append(newFaq);
            faqIndex++;
        });

        $(document).on('click', '.jsa-remove-faq-btn', function(){
            if (confirm('Deseja remover esta pergunta do FAQ?')) {
                $(this).closest('.jsa-faq-item').remove();
            }
        });
    });
    </script>
    <?php
}

// -------------------------------------------------------------
// RENDER CONTATOS METABOX
// -------------------------------------------------------------
function jsa_render_contatos_metabox( $post ) {
    $phone = get_post_meta( $post->ID, 'jsa_contact_phone', true ) ?: '(79) 99920-2205';
    $email = get_post_meta( $post->ID, 'jsa_contact_email', true ) ?: 'contato@advogadoonlinearacaju.com.br';
    $address = get_post_meta( $post->ID, 'jsa_contact_address', true ) ?: 'Aracaju - SE';
    $instagram = get_post_meta( $post->ID, 'jsa_contact_instagram', true ) ?: 'https://www.instagram.com/advogado.online.aracaju';
    $facebook = get_post_meta( $post->ID, 'jsa_contact_facebook', true ) ?: 'https://web.facebook.com/profile.php?id=61594068069533';
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
        <div>
            <label><strong>WhatsApp / Telefone:</strong></label>
            <input type="text" name="jsa_contact_phone" value="<?php echo esc_attr( $phone ); ?>" style="width: 100%;" />
        </div>
        <div>
            <label><strong>E-mail de Atendimento:</strong></label>
            <input type="email" name="jsa_contact_email" value="<?php echo esc_attr( $email ); ?>" style="width: 100%;" />
        </div>
        <div>
            <label><strong>Endereço / Localidade:</strong></label>
            <input type="text" name="jsa_contact_address" value="<?php echo esc_attr( $address ); ?>" style="width: 100%;" />
        </div>
        <div>
            <label><strong>Link do Instagram:</strong></label>
            <input type="url" name="jsa_contact_instagram" value="<?php echo esc_url( $instagram ); ?>" style="width: 100%;" />
        </div>
        <div style="grid-column: span 2;">
            <label><strong>Link do Facebook:</strong></label>
            <input type="url" name="jsa_contact_facebook" value="<?php echo esc_url( $facebook ); ?>" style="width: 100%;" />
        </div>
    </div>
    <script>
    jQuery(document).ready(function($){
        $('.jsa-upload-btn').click(function(e){
            e.preventDefault();
            var target = $(this).data('target');
            var custom_uploader = wp.media({
                title: 'Selecionar Imagem',
                button: { text: 'Usar esta Imagem' },
                multiple: false
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $(target).val(attachment.url);
            }).open();
        });
    });
    </script>
    <?php
}

/**
 * Salva os dados das Metaboxes ao atualizar a página
 */
function jsa_save_metaboxes_data( $post_id ) {
    if ( ! isset( $_POST['jsa_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['jsa_metabox_nonce'], 'jsa_save_metabox_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

    $fields = [
        'jsa_header_logo', 'jsa_footer_logo', 'jsa_custom_favicon',
        'jsa_atendimento_badge', 'jsa_atendimento_title', 'jsa_atendimento_desc',
        'jsa_analise_badge', 'jsa_analise_title', 'jsa_analise_desc',
        'jsa_hero_badge', 'jsa_hero_title', 'jsa_hero_subtitle', 'jsa_hero_cta_text', 'jsa_hero_cta_link', 'jsa_hero_image',
        'jsa_distrato_title', 'jsa_distrato_desc', 'jsa_distrato_link',
        'jsa_pv_title', 'jsa_pv_desc', 'jsa_pv_link', 'jsa_pv_image',
        'jsa_sobre_title', 'jsa_sobre_text1', 'jsa_sobre_text2', 'jsa_sobre_image',
        'jsa_contact_phone', 'jsa_contact_email', 'jsa_contact_address', 'jsa_contact_instagram', 'jsa_contact_facebook'
    ];

    foreach ( $fields as $f ) {
        if ( isset( $_POST[$f] ) ) {
            $val = sanitize_text_field( $_POST[$f] );
            update_post_meta( $post_id, $f, $val );
            // Sincroniza logos e favicon com options globais para que toda a aplicação e SEO usem imediatamente
            if ( in_array( $f, ['jsa_header_logo', 'jsa_footer_logo', 'jsa_custom_favicon'] ) && ! empty( $val ) ) {
                update_option( $f, $val );
            }
        }
    }

    // Salva a lista dinâmica de Áreas de Atuação
    if ( isset( $_POST['jsa_areas'] ) && is_array( $_POST['jsa_areas'] ) ) {
        $clean_areas = [];
        foreach ( $_POST['jsa_areas'] as $area ) {
            if ( ! empty( $area['title'] ) ) {
                $clean_areas[] = [
                    'title'    => sanitize_text_field( $area['title'] ),
                    'subtitle' => sanitize_text_field( $area['subtitle'] ?? '' ),
                    'desc'     => sanitize_textarea_field( $area['desc'] ?? '' ),
                    'link'     => esc_url_raw( $area['link'] ?? '' ),
                    'icon'     => sanitize_html_class( $area['icon'] ?? 'fa-scale-balanced' ),
                    'featured' => isset( $area['featured'] ) ? '1' : '0',
                ];
            }
        }
        update_post_meta( $post_id, 'jsa_areas_list', $clean_areas );
    }

    // Salva a lista dinâmica de FAQs
    if ( isset( $_POST['jsa_faqs'] ) && is_array( $_POST['jsa_faqs'] ) ) {
        $clean_faqs = [];
        foreach ( $_POST['jsa_faqs'] as $faq ) {
            if ( ! empty( $faq['q'] ) ) {
                $clean_faqs[] = [
                    'q' => sanitize_text_field( $faq['q'] ),
                    'a' => wp_kses_post( $faq['a'] ?? '' ),
                ];
            }
        }
        update_post_meta( $post_id, 'jsa_faqs_list', $clean_faqs );
    }
}
add_action( 'save_post', 'jsa_save_metaboxes_data' );
