<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

/**
 * Gerencia páginas para exibição no site e retorna o valor solicitado
 * 
 * @param	string	$term		Palavra-chave da informação da página que deseja que seja retornada
 * @param	string	$display	Deixe em branco para exibir diretamente a informação ou digite "display" para retornar a informação sem exibí-la
 * @return	string	Retorna a informação solicitada
 * ------------------------------------------------------------------
 */
function content_site( $term, $display = '' ) {
	global $config, $pages;
	
	$url = $config['base_url'];
	$page_names = $pages->array_all_page_names();
	$current_page = '';
	
	if ( is_home() ) :
		$current_page = 'home';
	elseif ( in_array( $url, $page_names ) ) :
		$current_page = $url;
	else :
		$current_page = '404';
	endif;
	
	if ( $display == 'display' ) :
		return $pages->get_page_val( $current_page, $term );
	else :
		echo $pages->get_page_val( $current_page, $term );
	endif;
}


/**
 * Dá include de um arquivo do seu tema
 * 
 * @param	string	$theme_part_name	Nome do arquivo que deseja inserir
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

function get_menu( $args = array() ) {
	global $pages, $menu_pages;
	
	// Argumentos padrão
	$defaults = array( 'menu' => 'main-menu', 'container' => 'nav', 'container_id' => '', 'container_class' => '',
		'menu_id' => '', 'menu_class' => 'nav', 'menu_item_class' => 'menu-item', 'menu_link_class' => '',
		'sub_menu_class' => 'sub-nav', 'sub_menu_item_class' => 'sub-menu-item', 'sub_menu_link_class' => '', 'echo' => true );
	
	// Mescla arqumentos enviados com os padrão
	$args = array_merge( $defaults, $args );
	
	// Array com todas as páginas
	$all_pages = $pages->array_all_page_names();
	
	// Array de páginas do menu selecionado
	if ( null === $menu_pages[$args['menu']] )
		echo '<script>alert( "O menu solicitado não foi configurado!" );</script>';
	else
		$menu_pages = $menu_pages[$args['menu']];
	
	echo '<pre>';
	print_r( $menu_pages );
	echo '</pre>';
	
	// Construção da estrutura do menu
	$menu_output  = '<' . $args['container'];
	
	if ( $args['container_id'] != '' )
		$menu_output .= ' id="' . $args['container_id'] . '"';
	
	if ( $args['container_class'] != '' )
		$menu_output .= ' class="' . $args['container_class'] . '"';
	
	$menu_output .= '>';
	
	$menu_output .= '<ul';
	
	if ( $args['menu_id'] != '' )
		$menu_output .= ' id="' . $args['menu_id'] . '"';
	
	if ( $args['menu_class'] != '' )
		$menu_output .= ' class="' . $args['menu_class'] . '"';
	
	$menu_output .= '>';
	
	// Loop de páginas do menu
	for ( $i = 0; $i < count( $all_pages ); $i++ ) :
		if ( in_array( $menu_pages[$i], $all_pages ) ) :
			$page_name = $pages->get_page_val( $menu_pages[$i], 'head_title' );
			
			$menu_output .= '<li';
	
			if ( $args['menu_item_class'] != '' )
				$menu_output .= ' class="' . $args['menu_item_class'] . '"';
			
			$menu_output .= '>';
			
			$menu_output .= '<a';
	
			if ( $args['menu_link_class'] != '' )
				$menu_output .= ' class="' . $args['menu_link_class'] . '"';
			
			$menu_output .= ' href="#' . $menu_pages[$i] . '">' . $page_name . '</a>';
			
			if ( $pages->is_parent_page( $menu_pages[$i] ) ) :
				$sub_page = $pages->get_page_val( $menu_pages[$i], 'sub_page' );
				$sub_menu_pages = $menu_pages[$i];
				
				$menu_output .= '<ul';
				
				if ( $args['sub_menu_class'] != '' )
					$menu_output .= ' class="' . $args['sub_menu_class'] . '"';
				
				$menu_output .= '>';
				
				for ( $k = 0; $k < count( $sub_page ); $k++ ) :
					$sub_page_name = $pages->get_page_val( $sub_page[$k], 'head_title' );
					
					$menu_output .= '<li';
					
					if ( $args['sub_menu_item_class'] != '' )
						$menu_output .= ' class="' . $args['sub_menu_item_class'] . '"';
					
					$menu_output .= '>';
					
					$menu_output .= '<a';
					
					if ( $args['sub_menu_link_class'] != '' )
						$menu_output .= ' class="' . $args['sub_menu_link_class'] . '"';
					
					$menu_output .= ' href="' . get_url( 'home', 'display' ) . $sub_page[$k] . '">' . $sub_page_name . '</a>';
					
					$menu_output .= '</li>';
				endfor;
				
				$menu_output .= '</ul>';
			endif;
			
			$menu_output .= '</li>';
		endif;
	endfor;
	
	$menu_output .= '</ul>';
	
	$menu_output .= '</' . $args['container'] . '>';
	
	if ( $args['echo'] )
		echo $menu_output;
	else
		return $menu_output;
}







