<?php
/**
 * VARIÁVEIS DE CONFIGURAÇÕES DO SITE
 * 
 * Defina aqui as Configurações do Site
 * ------------------------------------------------------------------
 */
$config = array();

// GERAIS
$config['url']['home'] = 'http://localhost/is_simple_master/';
$config['theme'] = 'default';
$config['site_name'] = 'IS_Simple';
$config['site_desc'] = 'Um Framework PHP simples, leve e robusto sem acesso a banco de dados';

/**
 * NÃO MEXA EM NADA A PARTIR DAQUI!
 * A NÃO SER QUE SAIBA EXATAMENTE O QUE PRETENDE FAZER.
 * ------------------------------------------------------------------
 */

// DIRETÓRIOS
$config['root'] = ROOT;
$config['core_dir'] = CORE_DIR;
$config['inc_dir'] = INC_DIR;
$config['page_dir'] = PG_DIR;
$config['theme_dir'] = THEME_DIR . $config['theme'] . '/';

// URL'S
$count_localhost_base_url = strlen( $config['url']['home'] ) - 16;
$config['base_url'] = ( $_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ) ? substr( $_SERVER['REQUEST_URI'], $count_localhost_base_url ) : substr( $_SERVER['REQUEST_URI'], 1 );
if ( stripos( $config['base_url'], '?' ) ) :
	$name = explode( '?', $config['base_url'] );
	$config['base_url'] = str_replace( '?' . end( $name ), '', $config['base_url'] );
endif;
$config['url']['admin'] = $config['url']['home'] . 'admin/';
$config['url']['core'] = $config['url']['home'] . 'core/';
$config['url']['inc'] = $config['url']['home'] . 'inc/';
$config['url']['pages'] = $config['url']['home'] . 'pages/';
$config['url']['theme'] = $config['url']['home'] . 'themes/' . $config['theme'] . '/';