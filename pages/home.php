<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

$content = array();
$_SESSION['page'] = '';

$content['head_title'] = 'Home';
$content['title'] = 'Site em construção';

ob_start();
// Digite abaixo todo o conteúdo da página ?>

<p>O nosso site está em processo de construção. Enquanto concluímos, você pode entrar em contato conosco através do telefone: <b>85 8940.2955</b>.</p>
<p>Se preferir, envie um email para <a href="mailto:contato@ignusstudios.com">contato@ignusstudios.com</a> ou através do nosso formulário de contato clicando <a href="contato">aqui</a>.</p>

<?php
$content['content'] = ob_get_contents();
ob_end_clean();

$_SESSION['page'] = $content;




