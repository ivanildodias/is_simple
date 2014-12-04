<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Nome da página: Blank
 * Breve descrição: Essa é uma página em branco para servir de modelo para as próximas
 * páginas que você irá desenvolver para o seu site.
 * ------------------------------------------------------------------
 */

$content = array();
$_SESSION['page'] = '';

$content['head_title'] = '';
$content['title'] = '';

ob_start();
// Digite abaixo todo o conteúdo da página ?>



<?php
$content['content'] = ob_get_contents();
ob_end_clean();

$_SESSION['page'] = $content;



