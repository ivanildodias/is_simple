<?php
/**
 * Arquivo: index.php
 * 
 * Função: Testa se o PHP está sendo executado e chama o arquivo
 * responsável pelo carregamento de todo o restante do código
 * ------------------------------------------------------------------
 */

/**
 * Certifique-se que o PHP é executado
 * ------------------------------------------------------------------
 */
if ( false ) :
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8" />
			<title>Erro: PHP não é executado</title>
		</head>
		<body>
			<h1><a href="http://ignusstudios.com/">Ignus Studios</a></h1>
			<h2>Erro: PHP não é executado</h2>
			<p>Nosso sistema requer que o seu servidor web execute PHP. Seu servidor não tem PHP instalado ou o PHP está desligado.</p>
		</body>
	</html>
	<?php
endif;


/**
 * Veja is_config.php para opções de configuração
 * ------------------------------------------------------------------
 */
if ( file_exists( 'is_load.php' ) ) require_once 'is_load.php';
?>