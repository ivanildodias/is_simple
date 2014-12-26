<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Nome da página: Contato
 * Breve descrição: Essa é a página de contato do seu site.
 * ------------------------------------------------------------------
 */

/**
 * ESSAS INFORMAÇÕES NÃO PODEM SER ALTERADAS.
 * PODE OCASIONAR EM ERRO NA LEITURA DO CONTEÚDO DAS PÁGINAS.
 * ------------------------------------------------------------------
 */
$page_id = explode( '/', filename( __FILE__ ) );
$page_id = end( $page_id );
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
$content['head_title'] = 'Contato';

/**
 * Título
 * 
 * Título da página exibido como conteúdo do site.
 * ------------------------------------------------------------------
 */
$content['title'] = 'Formulário de Contato';

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

<p>Fique a vontade para entrar em contato conosco através do formulário abaixo.</p>

<?php include_theme_part( 'contact_form' ); ?>

<?php

/**
 * ESSAS INFORMAÇÕES NÃO PODEM SER ALTERADAS.
 * PODE OCASIONAR EM ERRO NA LEITURA DO CONTEÚDO DAS PÁGINAS.
 * ------------------------------------------------------------------
 */
$content['content'] = ob_get_contents();
ob_end_clean();

$this->set_all_page_values( $page_id, $content );



