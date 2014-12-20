<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );


function filename( $filename ) {
	$file = explode( '\\', $filename );
	$file = end( $file );
	$name = explode( '.', $file );
	$name = str_replace( '.' . end( $name ), '', $file );
	
	return $name;
}


/**
 * Retorna as informações solicitadas do site
 * 
 * @param	string	$info		Palavra-chave da informação que deseja que seja retornada
 * @param	string	$display	Deixe em branco para exibir diretamente a informação ou digite "display" para retornar a informação sem exibí-la
 * @return	string	Retorna a informação solicitada
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
 * 
 * @param	string	$url		Palavra-chave da url que deseja que seja retornada
 * @param	string	$display	Deixe em branco para exibir diretamente a url ou digite "display" para retornar a url sem exibí-la
 * @return	string	Retorna a url solicitada
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

function get_page_url( $url = 'home', $display = '' ) {
	$home_url = get_url( 'home', 'display' );
	
	$output_url = ( $url == 'home' ) ? $home_url : $home_url . $url;
	
	if ( $display == 'display' ) :
		return $output_url;
	else :
		echo $output_url;
	endif;
}

/**
 * Verifica se está na página inicial do site
 * 
 * @return	bool	Retorna TRUE se estiver na página inicial do site
 * ------------------------------------------------------------------
 */
function is_home(){
	global $config;
	
	$url = $config['base_url'];
	
	if ( $url == '' ) :
		return TRUE;
	else:
		return FALSE;
	endif;
}


/**
 * Insere um recurso encontrado no diretório "inc" do sistema
 * 
 * @param	string	$core_part	Nome do recurso que deseja inserir
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






