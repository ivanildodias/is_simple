<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Retorna as informações solicitadas do site
 * ------------------------------------------------------------------
 */
function site_info( $info = 'site_name', $display = '' ) {
	global $config;
	
	if ( $display == 'display' ) :
		return $config[$info];
	else :
		echo $config[$info];
	endif;
}


/**
 * Retorna as url's solicitadas
 * ------------------------------------------------------------------
 */
function get_url( $url = 'home', $display = '' ) {
	global $config;
	
	if ( $display == 'display' ) :
		return $config['url'][$url];
	else :
		echo $config['url'][$url];
	endif;
}


/**
 * Retorna verdadeiro se estiver na pagina inicial do site
 * ------------------------------------------------------------------
 */
function is_home(){
	global $config;
	$url = $config['base_url'];
	
	if ( $url == '' ) :
		return TRUE;
	endif;
}


/**
 * Dá include de um arquivo do sistema
 * ------------------------------------------------------------------
 */
function include_core( $core_part ) {
	global $config;
	
	switch ( $core_part ) :
		case 'phpmailer':
			$core_part = $core_part . '/class.phpmailer';
			break;
	endswitch;
	
	$filename = $config['inc_dir'] . $core_part . '.php';
	
	if ( file_exists( $filename ) ) :
		include $filename;
	else :
		echo '<p class="alert">O arquivo solicitado não foi encontrado.</p>';
	endif;
}






?>