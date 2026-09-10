# Manual do Desenvolvedor (MANUAL_DEV.md)

## 📌 Visão Geral da Arquitetura
- **Plataforma**: WordPress (PHP 8.2+ / MySQL 8.4)
- **Tema Base**: Hello Elementor
- **Page Builder**: Elementor & Elementor Pro
- **Estilo & Design**: Tailwind CSS / CSS moderno responsivo otimizado para alta taxa de conversão (CRO) e mobile-first.

## 🚀 Como Executar o Ambiente Localmente
1. O projeto roda através do aplicativo **Local WP**.
2. O servidor web é Nginx com PHP-FPM e banco de dados MySQL na porta `10023`.
3. Para comandos de CLI:
   `& "C:\Users\rfpit\AppData\Roaming\Local\lightning-services\php-8.2.29+0\bin\win64\php.exe" -c "C:\Users\rfpit\AppData\Roaming\Local\run\newhO45rp\conf\php\php.ini" "C:\Users\rfpit\AppData\Local\Programs\Local\resources\extraResources\bin\wp-cli\wp-cli.phar" --path="c:\Users\rfpit\Local Sites\jorge-santos-advocacia-advogado-em-goinia\app\public"`

## 📂 Estrutura de Diretórios
- `/app/public/wp-content/themes/hello-elementor`: Tema ativo com a Landing Page customizada (`front-page.php`), metaboxes dinâmicas (`jorge-santos-metaboxes.php`) e motor de SEO local (`jorge-santos-seo.php`).
- `/imagens`: Ativos visuais originais (fotos do advogado, logo e referências).
- `/dados_aracaju.md`: Base de conteúdo e palavras-chave de SEO para Aracaju e Sergipe.
- `/documents/task.md`: Roadmap e status de tarefas.

---

## 🚢 Passo a Passo para Subir em Produção (Deploy)

### Opção A: Migração Rápida 1-Clique (All-in-One WP Migration) - Recomendada
1. No WordPress Local, acesse **All-in-One WP Migration > Exportar > Arquivo**.
2. Baixe o arquivo `.wpress` gerado.
3. No servidor de produção (Hostinger, Cloudways, VPS, cPanel):
   - Instale um WordPress limpo.
   - Instale o plugin **All-in-One WP Migration**.
   - Acesse **Importar** e envie o arquivo `.wpress`.
4. Em **Configurações > Links Permanentes**, clique em *Salvar Alterações* duas vezes.

### Opção B: Deploy Contínuo via Git (Tema Customizado)
1. Conecte o repositório local ao GitHub/GitLab:
   ```bash
   git remote add origin https://github.com/SEU_USUARIO/jorge-santos-advocacia.git
   git push -u origin main
   ```
2. No servidor de produção, clone ou sincronize a pasta do tema:
   - Caminho: `/wp-content/themes/hello-elementor/`
   - O tema contém todo o código da Landing Page (`front-page.php`), SEO local e metaboxes administrativas.

