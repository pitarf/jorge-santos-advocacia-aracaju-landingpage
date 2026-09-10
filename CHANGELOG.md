# Registro de Alterações (CHANGELOG)

Todas as modificações notáveis neste projeto estão documentadas neste arquivo.

## [3.4.0] - 2026-09-10
### Modificado
- **Atualização da Logomarca Nobre do Escritório na Navbar e Rodapé**:
  - Implementada a nova identidade visual oficial quadrada em dourado nobre 3D com relevo (`logo_jfs_quadrada_nobre.jpg`) com a assinatura *JFS Advocacia e Consultoria*.
  - Adicionado selo dourado premium com o ícone de balança (`fa-scale-balanced`) ao lado da logomarca na barra de navegação, harmonizando com a identidade visual da advocacia.
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
