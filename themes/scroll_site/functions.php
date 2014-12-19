<?php
// FUNÇÕES

function print_page( $page_name ) {
    global $pages;
	
	?>
    <article id="<?php echo $page_name; ?>" class="section">
        <div class="content-site conteiner">
            <div class="inner">
                <header class="header">
                    <h3><?php echo $pages->get_page_val( $page_name, 'title' ); ?></h3>
                </header>
                <div class="content">
                    <?php echo $pages->get_page_val( $page_name, 'content' ); ?>
                </div> <!-- /content -->
            </div>
        </div>
    </article>
    <?php
}


function print_all_pages() {
	global $config, $pages;
	
	$url = $config['base_url'];
	$all_pages = $pages->array_all_page_names();
	$scroll_pages = array( 'home', 'empresa', 'portfolio', 'contato' );
	$current_page = ( is_home() ) ? 'home' : $url;
	
	if ( in_array( $current_page, $all_pages ) ) :
		if ( in_array( $current_page, $scroll_pages ) ) :
			foreach ( $scroll_pages as $key => $print_page ) :
				if ( in_array( $print_page, $all_pages ) )
					print_page( $print_page );
				else
					print_page( '404' );
			endforeach;
		else :
			print_page( $current_page );
		endif;
	else :
		print_page( '404' );
	endif;
}
