<?php
/**
 * VARIÁVEIS DE CONFIGURAÇÕES DO SITE
 * 
 * Defina aqui as Configurações do Site
 * ------------------------------------------------------------------
 */
$config = array();

// GERAIS
$config['url']['home'] = 'http://localhost/ignus_temp/';
$config['theme'] = 'scroll_site';
$config['site_name'] = 'Ignus Studios';
$config['site_desc'] = 'Tudo começa com uma ideia!';

/**
 * NÃO MEXA EM NADA APARTIR DAQUI!
 * A NÃO SER QUE SAIBA EXATAMENTE O QUE PRETENDE FAZER.
 * ------------------------------------------------------------------
 */

// DIRETÓRIOS
$config['base_dir'] = dirname( __FILE__ ) . '/';
$config['core_dir'] = $config['base_dir'] . 'core/';
$config['inc_dir'] = $config['base_dir'] . 'inc/';
$config['page_dir'] = $config['base_dir'] . 'pages/';
$config['theme_dir'] = $config['base_dir'] . 'theme/' . $config['theme'] . '/';

// URL'S
$count_localhost_base_url = strlen( $config['url']['home'] ) - 16;
$config['base_url'] = ( $_SERVER['HTTP_HOST'] = 'localhost' ) ? substr( $_SERVER['REQUEST_URI'], $count_localhost_base_url ) : $_SERVER['REQUEST_URI'];
$config['url']['theme'] = $config['url']['home'] . 'theme/' . $config['theme'] . '/';
?>