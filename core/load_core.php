<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

// Classes
require_once CLASS_DIR . 'Files.class.php';		// Classe Files
require_once CLASS_DIR . 'Pages.class.php';		// Classe Pages

// Funções essenciais para o funcionamento do sistema
require_once 'core_functions.php';

// Carrega códigos padrão do sistema
require_once INC_DIR . 'load_includes.php';

// Funções essenciais para o funcionamento do sistema
require_once 'template.php';

// Arquivo para funções personalizadas do tema
require_once $config['theme_dir'] . 'functions.php';

// CONFIGURAÇÕES DE PÁGINAS
require_once PG_DIR . 'pages_config.php';

// Variável que armazena o conteúdo das páginas
$pages = new Pages();
/*
echo '<pre>';
print_r( $pages );
echo '</pre>';
*/
// Carrega o tema
load_theme();