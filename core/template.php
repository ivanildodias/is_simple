<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Gerencia páginas para exibição no site e retorna o valor solicitado
 * ------------------------------------------------------------------
 */
function content_site( $term, $display = '' ) {
	global $config;
	
	$url = $config['base_url'];
	$page_dir = $config['page_dir'];
	$page_inc = $page_dir . $url . '.php';
	$page = '';
	
	if ( is_home() ) :
		include $page_dir.'home.php';
	elseif ( file_exists( $page_inc ) ) :
		include $page_inc;
	else :
		include $page_dir.'404.php';
	endif;
	
	$page = $_SESSION['page'];
	
	if ( $display == 'display' ) :
		return $page[$term];
	else :
		echo $page[$term];
	endif;
}


/**
 * Dá include de um arquivo do seu tema
 * ------------------------------------------------------------------
 */
function include_theme_part( $theme_part_name ) {
	global $config;
	
	$theme_dir = $config['theme_dir'];
	$filename = $theme_dir . $theme_part_name . '.php';
	
	if ( file_exists( $filename ) ) :
		include $filename;
	else :
		echo '<p class="alert">O arquivo solicitado não foi encontrado.</p>';
	endif;
}


/**
 * Carrega o template do site
 * ------------------------------------------------------------------
 */
function load_theme() {
	global $config;
	
	$theme_dir = $config['theme_dir'];
	$url = $config['base_url'];

	// Arquivo para funções personalizadas do tema
	require_once $theme_dir . 'functions.php';
	
	// Inclui o cabeçalho do tema
	include $theme_dir . 'header.php';
	
	// Inclui a página de conteúdo principal do tema
	if ( file_exists( $theme_dir . 'page-' . $url . '.php' ) ) :		// Se houver um arquivo personalizado para a página...
		include $theme_dir . 'page-' . $url . '.php';	// Inclui o arquivo personalizado
	else :
		include $theme_dir . 'index.php';	// Inclui o arquivo padrão (index.php)
	endif;
	
	// Inclui o rodapé do tema
	include $theme_dir . 'footer.php';
}


/**
 * Gera os títulos das páginas
 * ------------------------------------------------------------------
 */
function head_title( $sep = '-' ) {
	global $config;
	
	$site_name = $config['site_name'];
	$site_desc = $config['site_desc'];
	$sep = ' ' . $sep . ' ';
	$base_title = $site_name . $sep . $site_desc;
	
	if ( is_home() ) :
		echo $base_title;
	else :
		echo content_site( 'head_title' ) . $sep . $site_name;
	endif;
}

// Carrega o tema
load_theme();






