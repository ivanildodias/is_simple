<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

class Pages {
    public $pages = array();
    
    public function __construct () {
        global $config;
        $page_dir = $config['page_dir'];
        
        if ( is_dir( $page_dir ) ) :
            if ( $pages_dir = opendir( $page_dir ) ) :
                $this->pages = array();
                
                while ( ( $pages_file = readdir( $pages_dir ) ) !== false ) :
                    if ( stristr( $pages_file, '.php' ) !== false ) :
                        
                        $name = explode( '.', $pages_file );
                        $name = str_replace( '.' . end( $name ), '', $pages_file );
                        
                        $this->pages[$name] = array(
                            'path' => $page_dir . $pages_file
                        );
                        
                    endif;
                endwhile;
                
            endif;
        endif;
    }
    
    public function add_page( $page = NULL, $filename = NULL ) {
        global $config;
        
        if( $page != NULL ) :
            $this->pages[$page] = $config['page_dir'] . $filename . '.php';
        endif;
    }
}
