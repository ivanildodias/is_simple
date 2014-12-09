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


function print_all_pages(){
    global $config, $pages;
    
    $url = $config['base_url'];
    $page_names = $pages->array_all_page_names();
    $current_page = '';
    
    if ( is_home() || in_array( $url, $page_names ) ) :
        print_page( 'home' );
        print_page( 'empresa' );
        print_page( 'portfolio' );
        print_page( 'contato' );
    else :
        print_page( '404' );
    endif;
}
