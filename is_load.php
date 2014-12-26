<?php defined( 'is_running' ) or define( 'is_running', true );

/**
 * DIRETÓRIOS
 * ------------------------------------------------------------------
 */
define( 'DS', DIRECTORY_SEPARATOR );
define( 'ROOT', dirname( __FILE__ ) . DS );
define( 'ADM_DIR', ROOT . 'admin' . DS );
define( 'CORE_DIR', ROOT . 'core' . DS );
define( 'INC_DIR', ROOT . 'inc' . DS );
define( 'PG_DIR', ROOT . 'pages' . DS );
define( 'THEME_DIR', ROOT . 'themes' . DS );
 
// Carrega o arquivo de configurações 
require_once ROOT . 'is_config.php';

if ( $config['url']['home'] == '' ) :
	?>
	<script>
		alert( "Por favor, configure a url da home do seu site no arquivo is_config.php." );
		location.href="error.php";
	</script>
	<?php
else :
	// Funções essenciais para o funcionamento do sistema
	require_once CORE_DIR . 'load_core.php';
endif;