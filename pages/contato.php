<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

$content = array();
$_SESSION['page'] = '';

$content['head_title'] = 'Contato';
$content['title'] = 'Formulário de Contato';

ob_start();
// Digite abaixo todo o conteúdo da página ?>

<p>Fique a vontade para entrar em contato conosco através do formulário abaixo.</p>

<?php include_theme_part( 'contact_form' ); ?>

<?php
$content['content'] = ob_get_contents();
ob_end_clean();

$_SESSION['page'] = $content;



