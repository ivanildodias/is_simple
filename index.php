<?php
/**
 * CONSIDERAÇÕES PARA USUÁRIOS
 * ------------------------------------------------------------------
 * 
 * Usuários do IS Simple devem atender certas considerações:
 * - mod_rewrite deve estar disponível ou o arquivo .htaccess não será suportado
 * 
 * Copyright (c) Ignus Studios. (http://ignusstudios.com/)
 * 
 * Licenciado sob a licença GPL v2
 * Para informações completas de direitos autorais e de licença, consulte o arquivo LICENSE.txt
 * Redistribuições de arquivos devem manter o aviso de direitos autorais acima.
 * 
 * @copyright	Copyright (c) Ignus Studios. (http://ignusstudios.com/)
 * @link		https://github.com/ivanildodias/is_simple
 * @license		http://opensource.org/licenses/GPL-2.0	GNU GPL v2
 */

/**
 * Certifique-se que o PHP é executado
 * ------------------------------------------------------------------
 */
if ( false ) : ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Erro: PHP não é executado</title>
	</head>
	<body>
		<h1><a href="https://github.com/ivanildodias/is_simple">IS_Simple</a></h1>
		<h2>Erro: PHP não é executado</h2>
		<p>O IS_Simple requer que o seu servidor web execute PHP. Seu servidor não tem PHP instalado ou o PHP está desligado.</p>
	</body>
</html>

<?php endif;

/**
* Veja is_config.php para opções de configuração
* ------------------------------------------------------------------
*/
if ( file_exists( 'is_load.php' ) ) require_once 'is_load.php';