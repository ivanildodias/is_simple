<?php
// FUNÇÕES

function loop_pages() {
    global $config;
    
    $page_dir = $config['page_dir'];
    $pages = array();
    
    if ( is_dir( $page_dir ) ) :
        if ( $pages_dir = opendir( $page_dir ) ) :
            $pages = array();
            
            while ( ( $pages_file = readdir( $pages_dir ) ) !== false ) :
                if ( stristr( $pages_file, '.php' ) !== false ) :
                    
                    $name = explode( '.', $pages_file );
                    $name = str_replace( '.' . end( $name ), '', $pages_file );
                    
                    $pages[] = array(
                        'nome' => $name,
                        'path' => $page_dir . $pages_file
                    );
                    
                endif;
            endwhile;
            
        endif;
    endif;
    
    $total_pages = count( $pages );
    
    for ( $i = 0; $i < $total_pages; $i++ ) :
    
        if ( $pages[$i]['nome'] == '404' || $pages[$i]['nome'] == 'blank' ) : echo '';
        else :
        
            include $pages[$i]['path'];
            $page = $_SESSION['page'];
            
            ?>
            <article id="<?php echo $page['id_section']; ?>" class="section">
                <div class="content-site conteiner">
                    <div class="inner">
                        <header class="header">
                            <h3><?php echo $page['title']; ?></h3>
                        </header>
                        <div class="content">
                            <?php echo $page['content']; ?>
                        </div> <!-- /content -->
                    </div>
                </div>
            </article>
            <?php
        
        endif;
        
    endfor;
}


