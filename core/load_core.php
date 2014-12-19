<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

// Funções essenciais para o funcionamento do sistema
require_once 'core_functions.php';

// Carrega códigos padrão do sistema
require_once $config['inc_dir'] . 'load_includes.php';

// Funções essenciais para o funcionamento do sistema
require_once 'template.php';

// Classe Pages
require_once 'Pages.php';

// CONFIGURAÇÕES DE PÁGINAS
require_once $config['page_dir'] . 'pages_config.php';

// Carrega o tema
load_theme();