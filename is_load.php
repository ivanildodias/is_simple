<?php defined( 'is_running' ) or define( 'is_running', true );

// Carrega o arquivo de configurações 
require_once dirname( __FILE__ ) . '/is_config.php';

// Funções essenciais para o funcionamento do sistema
require_once $config['core_dir'] . 'load_core.php';
?>