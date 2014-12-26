<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Nome da página: Home
 * Breve descrição: Essa é a página inicial do seu site. Fique à vontade para 
 * alterar o conteúdo desta página para as informações que deseja.
 * ------------------------------------------------------------------
 */

/**
 * ESSAS INFORMAÇÕES NÃO PODEM SER ALTERADAS.
 * PODE OCASIONAR EM ERRO NA LEITURA DO CONTEÚDO DAS PÁGINAS.
 * ------------------------------------------------------------------
 */
$page_id = basename( __FILE__, '.php' );
$content = array();

/**
 * Sub-página
 * 
 * Especifique nessa variável a págian da qual ela é sub-página.
 * ------------------------------------------------------------------
 */
$content['parent_page'] = '';

/**
 * Título do navegador
 * 
 * Título que aparecerá no cabeçalho do navegador.
 * ------------------------------------------------------------------
 */
$content['head_title'] = 'Home';

/**
 * Título
 * 
 * Título da página exibido como conteúdo do site.
 * ------------------------------------------------------------------
 */
$content['title'] = 'Site em construção';

/**
 * Autor
 * 
 * Quem escreveu essa página?
 * ------------------------------------------------------------------
 */
$content['author'] ='';

/**
 * Categorias
 * 
 * Que categorias deseja aplicar a essa página?
 * ------------------------------------------------------------------
 */
$content['categs'] = '';

/**
 * Tags
 * 
 * Deseja aplicar alguma tag a essa página?
 * ------------------------------------------------------------------
 */
$content['tags'] = '';

/**
 * Conteúdo
 * 
 * Digite o conteúdo que deseja que seja exibido na sua página.
 * ------------------------------------------------------------------
 */
ob_start();
// Digite abaixo todo o conteúdo da página ?>

<p>O nosso site está em processo de construção. Enquanto concluímos, você pode entrar em contato conosco através do telefone: <b>85 8940.2955</b>.</p>
<p>Se preferir, envie um email para <a href="mailto:contato@ignusstudios.com">contato@ignusstudios.com</a> ou através do nosso formulário de contato clicando <a href="#contato">aqui</a>.</p>

<?php

/**
 * ESSAS INFORMAÇÕES NÃO PODEM SER ALTERADAS.
 * PODE OCASIONAR EM ERRO NA LEITURA DO CONTEÚDO DAS PÁGINAS.
 * ------------------------------------------------------------------
 */
$content['content'] = ob_get_contents();
ob_end_clean();

$this->set_all_page_values( $page_id, $content );




