<?php
/**
 * Construtor de Landing Page 100% nativa em Elementor para Jorge Santos Advocacia
 */

require_once dirname( __DIR__ ) . '/app/public/wp-load.php';

if ( ! class_exists( '\Elementor\Plugin' ) ) {
    echo "Elementor plugin not found.\n";
    exit(1);
}

$page_id = 14;

function generate_elem_id() {
    return substr( md5( uniqid( mt_rand(), true ) ), 0, 7 );
}

$logo_url = home_url( '/wp-content/uploads/2026/08/logo-1.jpeg' );
$foto1_url = home_url( '/wp-content/uploads/2026/08/foto-1.jpeg' );
$foto2_url = home_url( '/wp-content/uploads/2026/08/foto-2.jpeg' );
$foto3_url = home_url( '/wp-content/uploads/2026/08/foto-3.jpeg' );
$foto4_url = home_url( '/wp-content/uploads/2026/08/foto-4.jpeg' );

// Monta as seções completas em widgets nativos do Elementor
$elements = [];

// -------------------------------------------------------------
// 1. TOP BAR & NAVBAR SECTION
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#FFFFFF',
        'padding' => [
            'unit' => 'px',
            'top' => '15',
            'bottom' => '15',
            'left' => '20',
            'right' => '20',
            'isLinked' => false
        ],
        'border_border' => 'solid',
        'border_width' => ['unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '1', 'left' => '0', 'isLinked' => false],
        'border_color' => '#E2E8F0',
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 50,
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'image',
                    'settings' => [
                        'image' => [
                            'url' => $logo_url,
                            'id' => 9,
                        ],
                        'image_size' => 'custom',
                        'image_custom_dimension' => [
                            'width' => 220,
                            'height' => 60,
                        ],
                        'align' => 'left',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 50,
                'content_position' => 'middle',
                'align' => 'right',
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar no WhatsApp (62) 98136-5011',
                        'link' => [
                            'url' => 'https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20um%20atendimento%20com%20o%20Dr.%20Jorge%20Santos.',
                            'is_external' => 'on',
                        ],
                        'align' => 'right',
                        'button_type' => 'success',
                        'background_color' => '#25D366',
                        'hover_background_color' => '#1EBE5D',
                        'border_radius' => ['unit' => 'px', 'top' => '8', 'right' => '8', 'bottom' => '8', 'left' => '8', 'isLinked' => true],
                        'icon' => [
                            'value' => 'fab fa-whatsapp',
                            'library' => 'fa-brands',
                        ],
                        'icon_align' => 'left',
                        'icon_indent' => ['unit' => 'px', 'size' => 8],
                    ],
                ],
            ],
        ],
    ],
];

// -------------------------------------------------------------
// 2. HERO SECTION
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#F8F9FB',
        'padding' => [
            'unit' => 'px',
            'top' => '60',
            'bottom' => '60',
            'left' => '20',
            'right' => '20',
            'isLinked' => false
        ],
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 60,
                'content_position' => 'middle',
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => '⚖️ ADVOCACIA ESPECIALIZADA EM GOIÂNIA - GO',
                        'header_size' => 'h6',
                        'title_color' => '#B38B2F',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Atendimento Jurídico Claro, Próximo e Focado na Solução do Seu Caso.',
                        'header_size' => 'h1',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="font-size: 16px; color: #475569; line-height: 1.7;">A <strong>Jorge Santos Advocacia</strong> oferece atendimento descomplicado, em linguagem simples e sem juridiquês para pessoas, famílias, empresários e associações de proteção veicular em Goiânia e região.</p>',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar com o Advogado no WhatsApp',
                        'link' => [
                            'url' => 'https://wa.me/5562981365011?text=Olá,%20Dr.%20Jorge!%20Gostaria%20de%20orientação%20jurídica%20para%20o%20meu%20caso.',
                            'is_external' => 'on',
                        ],
                        'size' => 'lg',
                        'background_color' => '#25D366',
                        'hover_background_color' => '#1EBE5D',
                        'border_radius' => ['unit' => 'px', 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'isLinked' => true],
                        'icon' => [
                            'value' => 'fab fa-whatsapp',
                            'library' => 'fa-brands',
                        ],
                        'icon_align' => 'left',
                        'icon_indent' => ['unit' => 'px', 'size' => 10],
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 40,
                'content_position' => 'middle',
                'align' => 'center',
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'image',
                    'settings' => [
                        'image' => [
                            'url' => $foto1_url,
                            'id' => 10,
                        ],
                        'border_border' => 'solid',
                        'border_width' => ['unit' => 'px', 'top' => '4', 'right' => '4', 'bottom' => '4', 'left' => '4', 'isLinked' => true],
                        'border_color' => '#D1A748',
                        'border_radius' => ['unit' => 'px', 'top' => '20', 'right' => '20', 'bottom' => '20', 'left' => '20', 'isLinked' => true],
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Dr. Jorge Santos - OAB/GO',
                        'header_size' => 'h4',
                        'align' => 'center',
                        'title_color' => '#0E1928',
                    ],
                ],
            ],
        ],
    ],
];

// -------------------------------------------------------------
// 3. FAIXA DE DESTAQUES (STATS)
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#0E1928',
        'padding' => [
            'unit' => 'px',
            'top' => '30',
            'bottom' => '30',
            'left' => '20',
            'right' => '20',
            'isLinked' => false
        ],
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 25, 'align' => 'center'],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Linguagem Clara',
                        'header_size' => 'h3',
                        'align' => 'center',
                        'title_color' => '#D1A748',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="text-align: center; color: #CBD5E1; font-size: 13px;">Sem termos difíceis</p>',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 25, 'align' => 'center'],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Goiânia - GO',
                        'header_size' => 'h3',
                        'align' => 'center',
                        'title_color' => '#FFFFFF',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="text-align: center; color: #CBD5E1; font-size: 13px;">Presencial e Online</p>',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 25, 'align' => 'center'],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'WhatsApp Direto',
                        'header_size' => 'h3',
                        'align' => 'center',
                        'title_color' => '#25D366',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="text-align: center; color: #CBD5E1; font-size: 13px;"><a href="https://wa.me/5562981365011" target="_blank" style="color:#25D366; text-decoration:underline;">(62) 98136-5011</a></p>',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 25, 'align' => 'center'],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Atendimento Seguro',
                        'header_size' => 'h3',
                        'align' => 'center',
                        'title_color' => '#D1A748',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="text-align: center; color: #CBD5E1; font-size: 13px;">100% Personalizado</p>',
                    ],
                ],
            ],
        ],
    ],
];

// -------------------------------------------------------------
// 4. ÁREAS DE ATUAÇÃO (HEADER)
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#FFFFFF',
        'padding' => ['unit' => 'px', 'top' => '60', 'bottom' => '20', 'left' => '20', 'right' => '20', 'isLinked' => false],
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 100, 'align' => 'center'],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'ESPECIALIDADES JURÍDICAS',
                        'header_size' => 'h6',
                        'align' => 'center',
                        'title_color' => '#B38B2F',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Áreas de Atuação em Goiânia e Região',
                        'header_size' => 'h2',
                        'align' => 'center',
                        'title_color' => '#0E1928',
                    ],
                ],
            ],
        ],
    ],
];

// -------------------------------------------------------------
// 5. ÁREAS DE ATUAÇÃO (CARDS 1, 2, 3)
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#FFFFFF',
        'padding' => ['unit' => 'px', 'top' => '20', 'bottom' => '20', 'left' => '20', 'right' => '20', 'isLinked' => false],
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 33.33,
                'border_border' => 'solid',
                'border_width' => ['unit' => 'px', 'top' => '1', 'right' => '1', 'bottom' => '1', 'left' => '4', 'isLinked' => false],
                'border_color' => '#D1A748',
                'border_radius' => ['unit' => 'px', 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'isLinked' => true],
                'padding' => ['unit' => 'px', 'top' => '25', 'right' => '20', 'bottom' => '25', 'left' => '20', 'isLinked' => true],
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Direito Trabalhista',
                        'header_size' => 'h3',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #475569; font-size: 14px;">Rescisões, horas extras, reconhecimento de vínculo, FGTS, estabilidade e defesa consultiva e contenciosa de empresas em Goiânia.</p>',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar com Advogado Trabalhista',
                        'link' => ['url' => 'https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Direito%20Trabalhista.', 'is_external' => 'on'],
                        'button_type' => 'default',
                        'background_color' => '#0E1928',
                        'align' => 'center',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 33.33,
                'border_border' => 'solid',
                'border_width' => ['unit' => 'px', 'top' => '2', 'right' => '2', 'bottom' => '2', 'left' => '4', 'isLinked' => false],
                'border_color' => '#D1A748',
                'border_radius' => ['unit' => 'px', 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'isLinked' => true],
                'padding' => ['unit' => 'px', 'top' => '25', 'right' => '20', 'bottom' => '25', 'left' => '20', 'isLinked' => true],
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Direito Imobiliário & Distratos',
                        'header_size' => 'h3',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #475569; font-size: 14px;">Cancelamento e distrato de lote ou imóvel na planta, devolução justa de valores pagos, combate a multas abusivas e atrasos de obras.</p>',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar com Advogado Imobiliário',
                        'link' => ['url' => 'https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Direito%20Imobiliário.', 'is_external' => 'on'],
                        'button_type' => 'default',
                        'background_color' => '#D1A748',
                        'align' => 'center',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 33.33,
                'border_border' => 'solid',
                'border_width' => ['unit' => 'px', 'top' => '1', 'right' => '1', 'bottom' => '1', 'left' => '4', 'isLinked' => false],
                'border_color' => '#D1A748',
                'border_radius' => ['unit' => 'px', 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'isLinked' => true],
                'padding' => ['unit' => 'px', 'top' => '25', 'right' => '20', 'bottom' => '25', 'left' => '20', 'isLinked' => true],
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Proteção Veicular',
                        'header_size' => 'h3',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #475569; font-size: 14px;">Assessoria preventiva, elaboração de estatutos e regulamentos de eventos, e defesa em processos judiciais de sinistros para associações.</p>',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar com Especialista em Proteção Veicular',
                        'link' => ['url' => 'https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20para%20Associação%20de%20Proteção%20Veicular.', 'is_external' => 'on'],
                        'button_type' => 'default',
                        'background_color' => '#0E1928',
                        'align' => 'center',
                    ],
                ],
            ],
        ],
    ],
];

// -------------------------------------------------------------
// 6. ÁREAS DE ATUAÇÃO (CARDS 4, 5, 6)
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#FFFFFF',
        'padding' => ['unit' => 'px', 'top' => '10', 'bottom' => '60', 'left' => '20', 'right' => '20', 'isLinked' => false],
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 33.33,
                'border_border' => 'solid',
                'border_width' => ['unit' => 'px', 'top' => '1', 'right' => '1', 'bottom' => '1', 'left' => '4', 'isLinked' => false],
                'border_color' => '#D1A748',
                'border_radius' => ['unit' => 'px', 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'isLinked' => true],
                'padding' => ['unit' => 'px', 'top' => '25', 'right' => '20', 'bottom' => '25', 'left' => '20', 'isLinked' => true],
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Direito de Família',
                        'header_size' => 'h3',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #475569; font-size: 14px;">Divórcio em cartório ou judicial, pensão alimentícia, guarda compartilhada, visitas e partilha de bens com total discrição.</p>',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar sobre Família / Divórcio',
                        'link' => ['url' => 'https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Direito%20de%20Família/Divórcio.', 'is_external' => 'on'],
                        'button_type' => 'default',
                        'background_color' => '#0E1928',
                        'align' => 'center',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 33.33,
                'border_border' => 'solid',
                'border_width' => ['unit' => 'px', 'top' => '1', 'right' => '1', 'bottom' => '1', 'left' => '4', 'isLinked' => false],
                'border_color' => '#D1A748',
                'border_radius' => ['unit' => 'px', 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'isLinked' => true],
                'padding' => ['unit' => 'px', 'top' => '25', 'right' => '20', 'bottom' => '25', 'left' => '20', 'isLinked' => true],
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Inventário e Herança',
                        'header_size' => 'h3',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #475569; font-size: 14px;">Inventário extrajudicial em cartório (rápido), inventário judicial, regularização de imóveis, partilha e planejamento sucessório.</p>',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar sobre Inventário',
                        'link' => ['url' => 'https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20sobre%20Inventário%20em%20Goiânia.', 'is_external' => 'on'],
                        'button_type' => 'default',
                        'background_color' => '#0E1928',
                        'align' => 'center',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => [
                '_column_size' => 33.33,
                'border_border' => 'solid',
                'border_width' => ['unit' => 'px', 'top' => '1', 'right' => '1', 'bottom' => '1', 'left' => '4', 'isLinked' => false],
                'border_color' => '#D1A748',
                'border_radius' => ['unit' => 'px', 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'isLinked' => true],
                'padding' => ['unit' => 'px', 'top' => '25', 'right' => '20', 'bottom' => '25', 'left' => '20', 'isLinked' => true],
            ],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Civil, Contratos e Cobranças',
                        'header_size' => 'h3',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #475569; font-size: 14px;">Elaboração de contratos, cobrança judicial de devedores, indenização por danos morais/materiais e defesa do consumidor.</p>',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'button',
                    'settings' => [
                        'text' => 'Falar sobre Contratos / Cobranças',
                        'link' => ['url' => 'https://wa.me/5562981365011?text=Olá,%20gostaria%20de%20atendimento%20em%20Contratos/Civil/Cobranças.', 'is_external' => 'on'],
                        'button_type' => 'default',
                        'background_color' => '#0E1928',
                        'align' => 'center',
                    ],
                ],
            ],
        ],
    ],
];

// -------------------------------------------------------------
// 7. SEÇÃO DE PERGUNTAS FREQUENTES (FAQ ACCORDION ELEMENTOR NATIVO)
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#F8F9FB',
        'padding' => ['unit' => 'px', 'top' => '60', 'bottom' => '60', 'left' => '20', 'right' => '20', 'isLinked' => false],
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 100],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'TIRE SUAS DÚVIDAS',
                        'header_size' => 'h6',
                        'align' => 'center',
                        'title_color' => '#B38B2F',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Perguntas Frequentes',
                        'header_size' => 'h2',
                        'align' => 'center',
                        'title_color' => '#0E1928',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'accordion',
                    'settings' => [
                        'tabs' => [
                            [
                                '_id' => generate_elem_id(),
                                'tab_title' => 'Como falar com um advogado em Goiânia?',
                                'tab_content' => 'Você pode entrar em contato diretamente pelo WhatsApp <a href="https://wa.me/5562981365011" target="_blank" style="color:#25D366; font-weight:bold;">(62) 98136-5011</a> e explicar resumidamente o que aconteceu. Nossa equipe dará o retorno rapidamente.',
                            ],
                            [
                                '_id' => generate_elem_id(),
                                'tab_title' => 'Comprei um lote e me arrependi. Posso cancelar o contrato?',
                                'tab_content' => 'Sim. É possível solicitar o distrato imobiliário. O contrato precisa ser analisado para calcular a quantia correta a ser devolvida pela loteadora e combater retenções abusivas. <a href="https://wa.me/5562981365011" target="_blank" style="color:#25D366; font-weight:bold;">Fale no WhatsApp</a>.',
                            ],
                            [
                                '_id' => generate_elem_id(),
                                'tab_title' => 'A construtora atrasou a entrega do imóvel. Quais são os meus direitos?',
                                'tab_content' => 'Em caso de atraso injustificado na entrega de casa, apartamento na planta ou condomínio/loteamento, o comprador pode requerer a rescisão contratual com devolução integral de valores, ou indenização pelos prejuízos causados pelo atraso.',
                            ],
                            [
                                '_id' => generate_elem_id(),
                                'tab_title' => 'Como funciona o atendimento para Associações de Proteção Veicular?',
                                'tab_content' => 'Prestamos suporte consultivo integral (elaboração de estatutos e regulamentos) e defesa jurídica especializada em processos judiciais de acidentes, perda total, furto, roubo e negativas regulamentares.',
                            ],
                            [
                                '_id' => generate_elem_id(),
                                'tab_title' => 'O escritório atende causas trabalhistas e de família?',
                                'tab_content' => 'Sim! Atuamos em rescisões, horas extras, reconhecimento de vínculo e defesa de empresas no Direito Trabalhista, bem como divórcios (consensual e litigioso), pensão, guarda e inventários no Direito de Família e Sucessões.',
                            ],
                            [
                                '_id' => generate_elem_id(),
                                'tab_title' => 'O atendimento pode ser feito totalmente online?',
                                'tab_content' => 'Sim! Atendemos presencialmente em Goiânia e também de forma 100% digital e segura via WhatsApp, chamada de vídeo e e-mail (<a href="mailto:jorgesantosadvocacia@gmail.com" style="color:#D1A748;">jorgesantosadvocacia@gmail.com</a>) para clientes de todo o estado de Goiás e do Brasil.',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];

// -------------------------------------------------------------
// 8. RODAPÉ / FOOTER SECTION
// -------------------------------------------------------------
$elements[] = [
    'id' => generate_elem_id(),
    'elType' => 'section',
    'isInner' => false,
    'settings' => [
        'background_background' => 'classic',
        'background_color' => '#0E1928',
        'padding' => ['unit' => 'px', 'top' => '50', 'bottom' => '30', 'left' => '20', 'right' => '20', 'isLinked' => false],
    ],
    'elements' => [
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 50],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Jorge Santos Advocacia',
                        'header_size' => 'h3',
                        'title_color' => '#D1A748',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #94A3B8; font-size: 14px;">Atendimento jurídico humanizado e focado em soluções práticas para pessoas, famílias, empresas e associações de proteção veicular em Goiânia e região.</p>',
                    ],
                ],
            ],
        ],
        [
            'id' => generate_elem_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 50],
            'elements' => [
                [
                    'id' => generate_elem_id(),
                    'elType' => 'widget',
                    'widgetType' => 'heading',
                    'settings' => [
                        'title' => 'Contato',
                        'header_size' => 'h3',
                        'title_color' => '#FFFFFF',
                    ],
                ],
                [
                    'id' => generate_elem_id(),
                    'elType' => 'text-editor',
                    'widgetType' => 'text-editor',
                    'settings' => [
                        'editor' => '<p style="color: #CBD5E1; font-size: 14px;">📍 <strong>Goiânia - GO</strong><br>📱 WhatsApp: <a href="https://wa.me/5562981365011" target="_blank" style="color:#25D366; font-weight:bold;">(62) 98136-5011</a><br>✉️ E-mail: <a href="mailto:jorgesantosadvocacia@gmail.com" style="color:#D1A748;">jorgesantosadvocacia@gmail.com</a><br>⏰ Atendimento: Seg a Sex das 08h às 18h</p>',
                    ],
                ],
            ],
        ],
    ],
];

// Salva os dados no formato nativo do Elementor
$json_data = json_encode( $elements );
update_post_meta( $page_id, '_elementor_data', wp_slash( $json_data ) );
update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
update_post_meta( $page_id, '_elementor_version', ELEMENTOR_VERSION );

echo "Página ID {$page_id} preenchida com sucesso com componentes 100% nativos do Elementor!\n";
