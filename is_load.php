<?php defined( 'is_running' ) or define( 'is_running', true );

// Carrega o arquivo de configurações 
require_once dirname( __FILE__ ) . '/is_config.php';

if ($config['url']['home'] == '' ) :
	?>
	<script>
		alert( "Por favor, configure a url da home do seu site no arquivo is_config.php." );
		location.href="error.php";
	</script>
	<?php
else :
	// Funções essenciais para o funcionamento do sistema
	require_once $config['core_dir'] . 'load_core.php';
endif;