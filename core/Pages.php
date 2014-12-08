<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

class Pages {
    public $pages = array();
    public $total_pages = '';
    public $session_page = '';
    
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
        
        $this->total_pages = count( $this->pages );
        
        for ( $i = 0; $i < $total_pages; $i++ ) :
            include $this->pages[$i]['path'];
            $this->session_page = $_SESSION['page'];
        endfor;
    }
    
    public function add_page( $page = NULL, $filename = NULL ) {
        global $config;
        
        if ( $page != NULL ) $this->pages[$page] = $config['page_dir'] . $filename . '.php';
    }
    
    public function del_page( $page ) {
        if ( array_key_exists( $page, $this->pages ) ) unset( $this->pages[$page] );
    }
    
    public function set_val( $page = NULL, $term = NULL, $val = NULL ) {
        if ( $page != NULL && $term != NULL && $val != NULL ) $this->pages[$page][$term] = $val;
    }
    
    public function get_val( $page = NULL, $term = NULL ) {
        if ( $page != NULL && $term != NULL && array_key_exists( $page, $this->pages ) ) :
            return $this->pages[$page][$term];
        else :
            return FALSE;
        endif;
    }
}
