<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

$content = array();
$_SESSION['page'] = '';

$content['head_title'] = 'Página não encontrada';
$content['id_section'] = '404';
$content['title'] = 'Página não encontrada';

ob_start();
// Digite abaixo todo o conteúdo da página ?>

<p>Desculpe, mas a página solicitada não existe.</p>

<?php
$content['content'] = ob_get_contents();
ob_end_clean();

$_SESSION['page'] = $content;


