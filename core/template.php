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
	global $config, $menu_pages, $pages;
	
	// Argumentos padrão
	$defaults = array( 'menu' => 'main-menu',
		'container' => 'nav', 'container_id' => '', 'container_class' => '',
		'menu_id' => '', 'menu_class' => 'nav',
		'menu_item_class' => 'menu-item', 'menu_item_haschildren_class' => 'haschildren_li',
		'menu_item_selected_class' => 'selected_li', 'menu_item_haschildren_selected_class' => 'childselected_li',
		'menu_link_class' => '', 'menu_link_haschildren_class' => 'haschildren',
		'menu_link_selected_class' => 'selected', 'menu_link_haschildren_selected_class' => 'childselected',
		'sub_menu_class' => 'sub-nav',
		'sub_menu_item_class' => 'sub-menu-item',
		'sub_menu_link_class' => '', 'echo' => true );
	
	// Mescla arqumentos enviados com os padrão
	$args = array_merge( $defaults, $args );
	
	// Array com todas as páginas
	$all_pages = $pages->array_all_page_names();
	
	// Array de páginas do menu selecionado
	if ( null === $menu_pages[$args['menu']] )
		echo '<script>alert( "O menu solicitado não foi configurado!" );</script>';
	else
		$menu_pages = $menu_pages[$args['menu']];
	
	// Página que está sendo exibida na tela
	$url = ( is_home() ) ? 'home' : $config['base_url'];
	
	/**
	 * Construção da estrutura do menu
	 * ------------------------------------------------------------------
	 */
	// Início da tag de abertura do conteiner
	$menu_output  = '<' . $args['container'];
	
	// Id do conteiner
	if ( $args['container_id'] != '' )
		$menu_output .= ' id="' . $args['container_id'] . '"';
	
	// Classe do conteiner
	if ( $args['container_class'] != '' )
		$menu_output .= ' class="' . $args['container_class'] . '"';
	
	// Fechamento da tag de abertura do conteiner
	$menu_output .= '>';
	
	// Início da tag de abertura do menu
	$menu_output .= '<ul';
	
	// Id do menu
	if ( $args['menu_id'] != '' )
		$menu_output .= ' id="' . $args['menu_id'] . '"';
	
	// Classe do menu
	if ( $args['menu_class'] != '' )
		$menu_output .= ' class="' . $args['menu_class'] . '"';
	
	// Fechamento da tag de abertura do menu
	$menu_output .= '>';
	
	// Loop de páginas do menu
	foreach ( $menu_pages as $page_key => $page_term ) :
		// Ítem do menu selecionado
		$page_slug = $page_key;
		
		// Link do ítem do menu
		$page_link = $page_term['link'];
		
		// Se a página do menu existir...
		if ( in_array( $page_slug, $all_pages ) ) :
			// Nome da página
			$page_name = $pages->get_page_val( $page_slug, 'head_title' );
			
			// Início da tag de abertura do ítem do menu
			$menu_output .= '<li';
			
			// Classes do ítem do menu
			$menu_class = array();
			if ( $args['menu_item_class'] != '' )
				$menu_class[] = $args['menu_item_class'];
			if ( $pages->is_parent_page( $page_slug ) && $args['menu_item_haschildren_class'] != '' )
				$menu_class[] = $args['menu_item_haschildren_class'];
			if ( $url == $page_slug && $args['menu_item_selected_class'] != '' )
				$menu_class[] = $args['menu_item_selected_class'];
			if ( $pages->is_parent_page( $page_slug )  && $args['menu_item_haschildren_selected_class'] != '' ) :
				// Array de todas as sub-páginas da página do ítem do menu selecionado
				$sub_pages = $pages->get_page_val( $page_slug, 'sub_page' );
				if ( in_array( $url, $sub_pages ) ) $menu_class[] = $args['menu_item_haschildren_selected_class'];
			endif;
			$menu_class = ( count( $menu_class ) > 0 ) ? implode( ' ', $menu_class ) : '';
			if ( $menu_class != '' ) :
				$menu_output .= ' class="' . $menu_class . '"';
			endif;
			
			// Fechamento da tag de abertura do ítem do menu
			$menu_output .= '>';
			
			// Início da tag de abertura do link do ítem do menu
			$menu_output .= '<a';
			
			// Classe do link do ítem do menu
			$link_class = array();
			if ( $args['menu_link_class'] != '' )
				$link_class[] = $args['menu_link_class'];
			if ( $pages->is_parent_page( $page_slug ) && $args['menu_link_haschildren_class'] != '' )
				$link_class[] = $args['menu_link_haschildren_class'];
			if ( $url == $page_slug && $args['menu_link_selected_class'] != '' )
				$link_class[] = $args['menu_link_selected_class'];
			if ( $pages->is_parent_page( $page_slug )  && $args['menu_link_haschildren_selected_class'] != '' ) :
				// Array de todas as sub-páginas da página do ítem do menu selecionado
				$sub_pages = $pages->get_page_val( $page_slug, 'sub_page' );
				if ( in_array( $url, $sub_pages ) ) $link_class[] = $args['menu_link_haschildren_selected_class'];
			endif;
			$link_class = ( count( $link_class ) > 0 ) ? implode( ' ', $link_class ) : '';
			if ( $link_class != '' ) :
				$menu_output .= ' class="' . $link_class . '"';
			endif;
			
			// Endereço, rótulo e fechamento do link do ítem do menu
			$menu_output .= ' href="' . $page_link . '">' . $page_name . '</a>';
			
			// Se tiver sub-páginas...
			if ( $pages->is_parent_page( $page_slug ) ) :
				// Array de todas as sub-páginas da página do ítem do menu selecionado
				$sub_pages = $pages->get_page_val( $page_slug, 'sub_page' );
				
				// Array de sub-páginas do ítem do menu selecionado
				$sub_menu_pages = $page_term['sub_pages'];
				
				// Início da tag de abertura do sub-menu
				$menu_output .= '<ul';
				
				// Classe do sub-menu
				if ( $args['sub_menu_class'] != '' )
					$menu_output .= ' class="' . $args['sub_menu_class'] . '"';
				
				// Fechamento da tag de abertura do sub-menu
				$menu_output .= '>';
				
				// Loop de páginas do sub-menu 
				foreach ( $sub_menu_pages as $sub_page_key => $sub_page_term ) :
					// Ítem do sub-menu
					$sub_page_slug = $sub_page_key;
					
					// Link do ítem do sub-menu
					$sub_page_link = $sub_page_term['link'];
					
					// Se a sub-página do sub-menu existir...
					if ( in_array( $sub_page_slug, $sub_pages ) ) :
						// Nome da sub-página
						$sub_page_name = $pages->get_page_val( $sub_page_slug, 'head_title' );
						
						// Início da tag de abertura do ítem do sub-menu
						$menu_output .= '<li';
						
						// Classe do ítem do sub-menu
						$sub_menu_class = array();
						if ( $args['sub_menu_item_class'] != '' )
							$sub_menu_class[] = $args['sub_menu_item_class'];
						if ( $url == $sub_page_slug && $args['menu_item_selected_class'] != '' )
							$sub_menu_class[] = $args['menu_item_selected_class'];
						$sub_menu_class = ( count( $sub_menu_class ) > 0 ) ? implode( ' ', $sub_menu_class ) : '';
						if ( $sub_menu_class != '' ) :
							$menu_output .= ' class="' . $sub_menu_class . '"';
						endif;
						
						// Fechamento da tag de abertura do ítem do sub-menu
						$menu_output .= '>';
						
						// Início da tag de abertura do link do ítem do sub-menu
						$menu_output .= '<a';
						
						// Classe do link do ítem do sub-menu
						$link_class = array();
						if ( $args['sub_menu_link_class'] != '' )
							$link_class[] = $args['sub_menu_link_class'];
						if ( $url == $sub_page_slug && $args['menu_link_selected_class'] != '' )
							$link_class[] = $args['menu_link_selected_class'];
						$link_class = ( count( $link_class ) > 0 ) ? implode( ' ', $link_class ) : '';
						if ( $link_class != '' ) :
							$menu_output .= ' class="' . $link_class . '"';
						endif;
						
						// Endereço, rótulo e fechamento do link do ítem do sub-menu
						$menu_output .= ' href="' . $sub_page_link . '">' . $sub_page_name . '</a>';
						
						// Tag de fechamento do ítem do sub-menu
						$menu_output .= '</li>';
					endif;
				endforeach;
				
				// Tag de fechamento do sub-menu
				$menu_output .= '</ul>';
			endif;
			
			// Tag de fechamento do ítem do menu
			$menu_output .= '</li>';
		endif;
	endforeach;
	
	// Tag de fechamento do menu
	$menu_output .= '</ul>';
	
	// Tag de fechamento do conteiner
	$menu_output .= '</' . $args['container'] . '>';
	
	// Imprimir na página o menu?
	if ( $args['echo'] )
		echo $menu_output;
	else
		return $menu_output;
}







