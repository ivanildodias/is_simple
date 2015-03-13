<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Nome da página: 404
 * Breve descrição: Página padrão que é exibida quando a url digitada não é
 * encontrada nos arquivos de páginas.
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
$content['head_title'] = 'Página não encontrada';

/**
 * Título
 * 
 * Título da página exibido como conteúdo do site.
 * ------------------------------------------------------------------
 */
$content['title'] = 'Página não encontrada';

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

<p>Desculpe, mas a página solicitada não existe.</p>

<?php

/**
 * ESSAS INFORMAÇÕES NÃO PODEM SER ALTERADAS.
 * PODE OCASIONAR EM ERRO NA LEITURA DO CONTEÚDO DAS PÁGINAS.
 * ------------------------------------------------------------------
 */
$content['content'] = ob_get_contents();
ob_end_clean();


