<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Nome da página: Blank
 * Breve descrição: Essa é uma página em branco para servir de modelo
 * para as próximas páginas que você irá desenvolver para o seu site.
 * Faça as alterações que deseja e não se esqueça de salvar com o nome
 *  que deseja para a sua página usando o comando SALVAR COMO.
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
$content['parent_page'] = 'empresa';

/**
 * Título do navegador
 * 
 * Título que aparecerá no cabeçalho do navegador.
 * ------------------------------------------------------------------
 */
$content['head_title'] = 'Exemplo de Sub-página';

/**
 * Título
 * 
 * Título da página exibido como conteúdo do site.
 * ------------------------------------------------------------------
 */
$content['title'] = 'Exemplo de Sub-página';

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

<p>Esse é um exemplo de sub-página.</p>

<?php

/**
 * ESSAS INFORMAÇÕES NÃO PODEM SER ALTERADAS.
 * PODE OCASIONAR EM ERRO NA LEITURA DO CONTEÚDO DAS PÁGINAS.
 * ------------------------------------------------------------------
 */
$content['content'] = ob_get_contents();
ob_end_clean();

$this->set_all_page_values( $page_id, $content );



