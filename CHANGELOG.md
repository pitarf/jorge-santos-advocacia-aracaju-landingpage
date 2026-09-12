# Registro de Alterações (CHANGELOG)

Todas as modificações notáveis neste projeto estão documentadas neste arquivo.

## [3.5.5] - 2026-09-12
### Corrigido
- **Ajuste de Quebra de Linha e Enquadramento do FAQ em Dispositivos Móveis (Zero Overflow)**:
  - Corrigido o corte e vazamento de texto para fora do card no botão das perguntas (`.faq-toggle` e `.elementor-tab-title`).
  - O tema base continha a regra `button { white-space: nowrap }` do CSS de reset, o que impedia que perguntas mais longas quebrassem em duas linhas na tela do celular.
  - Aplicado `white-space: normal !important`, `word-break: break-word !important`, `overflow-wrap: break-word !important` e `flex: 1 1 auto` nos títulos de cada pergunta.
  - Todas as perguntas agora se ajustam com precisão milimétrica dentro da moldura dos cards, independentemente da largura da tela.

## [3.5.4] - 2026-09-12
### Corrigido
- **Blindagem e Especificidade do Acordeão de FAQ (Zero Rosa / 100% Navy & Gold)**:
  - Aplicada especificidade máxima nos seletores de estilo CSS do acordeão (`.faq-toggle`, `.elementor-tab-title.elementor-active`, `.elementor-accordion-item`, `.faq-item`), eliminando integralmente a herança de cores magenta/rosa do kit padrão do Elementor.
  - O item ativo agora assume estritamente o fundo azul-marinho profundo (`#0E1928`), texto branco e setas/chevrons dourados (`#D1A748`).
  - Inclusão incondicional em nível de template da lista com as 10 perguntas e respostas jurídicas completas de Aracaju, impedindo que dados incompletos em cache ou versões anteriores no banco impeçam a exibição dos itens 9 (Erro Médico/Estética) e 10 (Planos de Saúde).

## [3.5.3] - 2026-09-12
### Modificado
- **Reformulação Completa da Seção de Dúvidas Frequentes (FAQ)**:
  - Título e subtítulo da seção atualizados com redação persuasiva e elegante:
    - *Dúvidas frequentes sobre nossos serviços jurídicos em Aracaju*
    - *Encontre respostas para algumas das principais dúvidas sobre atendimento, contratação e áreas de atuação.*
  - Implementação das **10 perguntas e respostas completas**, abrangendo Atendimento (Presencial e Online), Envio de Documentos via WhatsApp, Atuação fora de Aracaju, Direito Trabalhista, Divórcio/Família, Imobiliário, Empresarial, Inventário/Herança, Erro Médico/Estética e Planos de Saúde.
  - Reforço visual: bordas cinza-claro sutis (`#E2E8F0`), hover dourado nobre (`#D1A748`), cabeçalho escuro quando aberto e chevrons em dourado, sem resquício de cores padrão do Elementor.
  - Adicionado **CTA de conversão após a última pergunta**:
    - *"Ainda tem dúvidas sobre o seu caso? Converse com nossa equipe e explique sua situação. [Falar pelo WhatsApp]"*.
  - Sincronização simultânea nos dados estruturados Schema.org `FAQPage` (`jorge-santos-seo.php`) para geração de Rich Snippets no Google.

## [3.5.2] - 2026-09-12
### Modificado
- **Otimização de Espaçamento e Respiro da Barra de Navegação (Navbar)**:
  - Resolvida a aglomeração visual de elementos no Header:
    - Subtítulo da marca ajustado para a proporção nobre **`Advocacia & Consultoria`** (evitando linhas longas que empurravam o menu).
    - Ícone da marca redimensionado com precisão óptica (`46px`), garantindo proporção áurea com o texto.
    - Espaçamento amplo e progressivo entre os itens de menu (`gap-6 2xl:gap-8`), permitindo leitura limpa e confortável.
    - Gatilho do menu mobile reposicionado para telas intermediárias (`xl:hidden`), assegurando que em nenhuma resolução os links fiquem colados na marca ou no botão do WhatsApp.

## [3.5.1] - 2026-09-12
### Modificado
- **Identidade Tipográfica 100% Fiel à Logomarca Oficial (Cormorant Garamond + Sans Tracking)**:
  - Analisada a tipografia nativa presente no brasão oficial (`logo_js_quadrada.png` e `logo_jfs_horizontal.png`).
  - Alinhamento rigoroso da tipografia da marca no Header e Rodapé:
    - **`JORGE SANTOS`**: Tipografia nobre **Cormorant Garamond**, caixa alta com tracking `0.14em`, exatamente com as formas de letras e serifas da logo oficial do Dr. Jorge Santos.
    - **`ADVOCACIA E ASSESSORIA JURÍDICA`**: Tipografia sem serifa geométrica com espaçamento nobre (`tracking-[0.32em]`) em dourado, idêntica ao texto de suporte da logomarca oficial.

## [3.5.0] - 2026-09-12
### Modificado
- **Tipografia Imponente da Marca no Header e Rodapé (Cinzel Monumental)**:
  - Substituída a fonte serifada anterior pela **Cinzel** (fonte imperial romana baseada em inscrições de cortes e palácios de justiça).
  - Estruturação monumental aplicada:
    - **JORGE SANTOS:** Caixa alta com `tracking-wider`, peso bold e presença visual austera.
    - **ADVOCACIA:** Caixa alta com `tracking-[0.28em]` lapidar em dourado nobre (`#D1A748` / `#B38B2F`), harmonizando perfeitamente com o brasão dourado 3D.
  - Aplicada no Header (Navbar) e no Rodapé oficial.

## [3.4.9] - 2026-09-11
### Adicionado
- **Seção "Outras áreas de atuação" na Landing Page**:
  - Implementado bloco nobre e responsivo logo abaixo dos 6 cards de atuação em `front-page.php`.
  - Exibição elegante com separadores dourados dos seguintes ramos do Direito:
    - *Direito do Consumidor • Responsabilidade Civil e Indenizações • Direito Previdenciário • Direito Agrário e Ambiental • Cobranças e Execuções • Contratos • Direito Associativo*
  - Botão/Link direto para o WhatsApp permitindo que clientes com demandas nessas áreas consultem a equipe rapidamente.
  - Atualização do Schema.org `LegalService` (`jorge-santos-seo.php`) e da lista de especialidades do rodapé.

## [3.4.8] - 2026-09-11
### Modificado
- **Otimização de Conteúdo: Chamadas Curtas nas Áreas de Atuação**:
  - Textos descritivos dos 6 cards substituídos por chamadas curtas, diretas e de alto impacto:
    - **Direito Trabalhista:** *Demissões, verbas, rescisão, horas extras e defesa empresarial*
    - **Divórcio e Família:** *Divórcio, guarda, alimentos, união estável e partilha*
    - **Direito Imobiliário:** *Compra e venda, distrato, atraso de obras, usucapião e locação*
    - **Direito Empresarial:** *Contratos, cobrança, prevenção de riscos e conflitos societários*
    - **Inventário e Herança:** *Inventário judicial e extrajudicial, partilha e sucessões*
    - **Erro Médico, Saúde e Estética:** *Falhas médicas, odontológicas, procedimentos estéticos e planos de saúde*

## [3.4.7] - 2026-09-11
### Modificado
- **Padronização dos Cards e Botões de Áreas de Atuação**:
  - Subtítulos atualizados e padronizados em caixa alta para todas as 6 áreas:
    - `DIREITO TRABALHISTA EM ARACAJU`
    - `DIVÓRCIO E DIREITO DE FAMÍLIA EM ARACAJU`
    - `ADVOGADO IMOBILIÁRIO EM ARACAJU`
    - `DIREITO EMPRESARIAL EM ARACAJU`
    - `INVENTÁRIO E HERANÇA EM ARACAJU`
    - `ERRO MÉDICO, SAÚDE E ESTÉTICA EM ARACAJU`
  - Todos os botões dos cards foram padronizados com o estilo dourado premium (`gold-gradient-bg`) com texto escuro Navy e efeito de hover uniforme.
  - Alterado o texto de todos os botões de *"Falar com Especialista"* para **"Falar com Advogado"**.
  - Todos os 6 cards alinhados com a mesma moldura e estética nobre.

## [3.4.6] - 2026-09-11
### Adicionado
- **Nova Área de Atuação: Erro Médico, Saúde e Estética**:
  - Adicionado novo card de especialidade na grade de "Como Podemos Ajudar" com selo de destaque dourado:
    - **Título:** *Erro Médico, Saúde e Estética*
    - **Subtítulo:** *ERRO MÉDICO E INDENIZAÇÃO EM ARACAJU*
    - **Descrição:** *Orientação jurídica em casos de erro médico e odontológico, cirurgia plástica, procedimentos estéticos malsucedidos, falha de diagnóstico, hospitais, clínicas e negativa de plano de saúde.*
    - **Ícone:** `fa-user-doctor` e CTA direto com mensagem personalizada para o WhatsApp oficial.
  - Integrado no painel administrativo editável (**Metaboxes**) e no catálogo Schema.org LegalService para indexação no Google.
  - Incluído na listagem de atuação do rodapé.

## [3.4.5] - 2026-09-11
### Modificado
- **Atualização Tipográfica da Marca na Navbar e Rodapé (Libre Baskerville)**:
  - Integrada a fonte serifada clássica **Libre Baskerville** (`Google Fonts`) ao tema e ao Tailwind.
  - Aplicada na assinatura textual da marca (**Jorge Santos Advocacia**) no Header e no Footer, seguindo exatamente o peso, proporção e elegância visual solicitados pelo cliente.

## [3.4.4] - 2026-09-10
### Modificado
- **Ajuste de Redação na Faixa de Destaques**:
  - Alterado o texto sob a localização de "Atendimento Local e Online" para "**Atendimento Presencial e Online**", deixando explícita a modalidade de atendimento presencial no escritório em conjunto com a consultoria online.

## [3.4.3] - 2026-09-10
### Adicionado / Modificado
- **Favicon Oficial do Escritório (Aba do Navegador e Barra de Endereço)**:
  - Definido como favicon oficial o ícone clássico com o templo grego / colunas romanas sobre fundo amarelo-dourado enviado pelo cliente.
  - Gerados e otimizados os formatos padrão `favicon.ico`, `favicon-32x32.png`, `favicon-192x192.png`, `favicon-512x512.png` e `apple-touch-icon.png` dentro de `hello-elementor/assets/images/` e na raiz do site.
  - Injetadas meta tags com mecanismo anti-cache dinâmico (`?v=timestamp`) para atualização imediata no Google Chrome, navegadores mobile e desktop.

## [3.4.2] - 2026-09-10
### Adicionado
- **Tipografia Nobre da Marca ao Lado da Logo (Header e Footer)**:
  - Inserido o letreiro estilizado e hierarquizado com o nome completo do escritório: **Jorge Santos** (em fonte serifada nobre e cor Navy) acompanhado de **ADVOCACIA** (em caixa alta, tracking expandido e tom dourado clássico) ao lado da logomarca oficial, tanto na barra de navegação principal (header) quanto no rodapé (footer).

## [3.4.1] - 2026-09-10
### Modificado
- **Ajuste na Barra de Navegação a Pedido do Cliente**:
  - Removido o ícone/selo dourado (`fa-scale-balanced`) que acompanhava a logo na navbar, mantendo a apresentação da marca limpa, discreta e focada unicamente na logomarca oficial do escritório (`logo_jfs_quadrada_nobre.jpg`).

## [3.4.0] - 2026-09-10
### Modificado
- **Atualização da Logomarca Nobre do Escritório na Navbar e Rodapé**:
  - Implementada a nova identidade visual oficial quadrada em dourado nobre 3D com relevo (`logo_jfs_quadrada_nobre.jpg`) com a assinatura *JFS Advocacia e Consultoria*.
  - Configurado o fallback nativo no tema (`hello-elementor/assets/images/`) para garantia de exibição imediata em qualquer ambiente (local ou produção).
  - Otimizada a proporção visual na navbar móvel e desktop com bordas suaves e moldura dourada sutil.

## [3.3.0] - 2026-09-10
### Adicionado
- **Configuração de Versionamento Git e Guia de Deploy para Produção**:
  - Repositório Git inicializado na raiz do projeto (`git init`).
  - Arquivo `.gitignore` rigoroso e seguro configurado: protege senhas (`wp-config.php`), ignora o core do WordPress e logs do LocalWP, mas preserva a Landing Page, temas, plugins e mídias essenciais.
  - Documentação do `MANUAL_DEV.md` e `MANUAL_USER.md` atualizada com o guia de publicação em produção via **All-in-One WP Migration** (1-clique) e via **Git/CI-CD**.

## [3.2.0] - 2026-09-10
### Corrigido / Otimizado
- **Ajuste de Responsividade Mobile-First e Eliminação de Overflow Horizontal**:
  - Inclusão do container global `<div class="lp-site-wrapper">` com `overflow-x: hidden !important; width: 100% !important; position: relative !important;`, blindando o layout contra qualquer rolagem horizontal residual.
  - Injeção das regras de responsividade com prioridade máxima **após** o `wp_head()`, impedindo que estilos de plugins ou do WordPress sobrescrevam a contenção de largura.
  - Desativação automática de translações do AOS (`disable: window.innerWidth < 768`) em smartphones e tablets, eliminando empurrões de viewport causados por elementos que chegam de fora da tela via JavaScript.
  - Removido o uso rígido de `whitespace-nowrap` em botões de ação e CTAs extensos (Hero, Faixa de Destaques, Banner Intermediário, Seção de Análise, Passo a Passo e Formulário de Contato), permitindo quebra e acomodação de texto perfeita em telas a partir de 320px.
  - Ajustado o padding da caixa principal de *Análise Individual do Seu Caso* (`#analise`) de `p-8 sm:p-12` para `p-5 sm:p-8 md:p-12 rounded-2xl sm:rounded-3xl` e adicionado `w-full` nos cartões internos para não vazar a viewport em dispositivos móveis.
  - Otimizada a largura da logomarca no cabeçalho mobile (`max-w-[200px] sm:max-w-[260px]`) e adicionado `shrink` no container para evitar colisão ou deslocamento do botão do menu hamburguer.
  - Reposicionados os cards flutuantes da foto humana do Dr. Jorge Santos no Hero para `max-w-[85%]` e recuo seguro, impedindo qualquer expansão fora da margem da tela.

## [3.1.0] - 2026-09-10
### Adicionado / Modificado
- **Gerenciamento Dinâmico de Identidade Visual e Conteúdo pelo Cliente**:
  - Implementado suporte completo para o dono alterar a **Logomarca do Cabeçalho (Header)**, **Logomarca do Rodapé (Footer)** e o **Ícone do Site (Favicon)** diretamente pelo WordPress sem tocar em código.
  - Disponibilizado tanto no painel **Jorge Santos SEO** quanto na tela padrão **Páginas > Início (Editar Página)** com botões de upload/seleção da galeria do WordPress e pré-visualização instantânea.
  - Sincronização automática entre as metaboxes da página e as configurações globais de SEO/Branding.
  - Tornados totalmente editáveis os títulos e descrições das seções de *Atendimento Jurídico em Aracaju* e *Análise Individual do Caso*.
  - `MANUAL_USER.md` atualizado com o passo a passo completo para o Dr. Jorge Santos e sua equipe.

## [3.0.0] - 2026-09-10
### Adicionado / Modificado
- **Migração Completa para Aracaju / Sergipe**:
  - Atualização do domínio para `advogadoonlinearacaju.com.br`.
  - Adaptação integral dos números de contato para `(79) 99920-2205` e integração direta com WhatsApp.
  - Novas logomarcas oficiais adicionadas: `logo_jfs_horizontal.png` e `logo_js_quadrada.png` em dourado nobre 3D.
  - Reestruturação das áreas de atuação prioritárias: Direito Trabalhista, Advogado para Divórcio, Direito Imobiliário, Advogado Empresarial e Inventário/Sucessões.
  - Otimização de SEO local para Aracaju e Sergipe (Geo-targeting `-10.947247, -37.073082`, Schema.org `LegalService`, Meta Tags e Breadcrumbs).
  - Atualização do formulário inteligente e FAQs oficiais no frontend e nas metaboxes do painel administrativo.
  - Inclusão dos canais oficiais: Instagram `@advogado.online.aracaju` e página oficial do Facebook.
  - Inclusão do Favicon Oficial JS Dourado (`favicon.png`, `favicon.ico`, `apple-touch-icon`).
  - Créditos do rodapé preservados para *Rafael Solutions*.

## [2.10.0] - 2026-08-28
### Corrigido
- Sobrescrita de estilo no Botão de Menu Mobile (`#mobileMenuBtn`):
  - Removido fundo/borda rosa padrão do tema Hello Elementor / WordPress.
  - Aplicado estilo nobre com fundo branco (`#FFFFFF`), borda cinza suave (`#E2E8F0`), ícone Navy (`#0E1928`) e hover/focus em Dourado (`#D1A748`), eliminando qualquer resquício de cor indesejada.
