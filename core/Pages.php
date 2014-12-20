<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

class Pages {
    public $pages = array();
    public $total_pages = '';
    
    public function __construct () {
        $this->load_all_pages();
    }

	private function load_all_pages() {
		global $config;
		
        $page_dir = $config['page_dir'];
        
        if ( is_dir( $page_dir ) ) :
            if ( $pages_dir = opendir( $page_dir ) ) :
                $this->pages = array();
                
                while ( ( $pages_file = readdir( $pages_dir ) ) !== false ) :
                    if ( stristr( $pages_file, '.php' ) !== false ) :
                        
                        $name = explode( '.', $pages_file );
                        $name = str_replace( '.' . end( $name ), '', $pages_file );
                        
						if ( $name != 'pages_config' ) :
	                        $this->add_page( $name, $pages_file );
						endif;
                        
                    endif;
                endwhile;
                
            endif;
        endif;
        
		$this->del_page( 'blank' );
		
        $this->total_pages = count( $this->pages );
	}
	
	public function array_all_page_names( $total = FALSE ) {
		if ( ! $total ) $this->del_page( '404' );
		
		return array_keys( $this->pages );
	}
    
	public function is_page( $page = NULL ) {
		if ( $page != NULL ) :
			if ( array_key_exists( $page, $this->pages ) ) :
				return true;
			else :
				return false;
			endif;
		endif;
	}
	
    public function add_page( $page = NULL, $filename = NULL ) {
        global $config;
        
        if ( $page != NULL ) $this->pages[$page]['path'] = $config['page_dir'] . $filename;
		
		include $this->pages[$page]['path'];
    }
    
    public function del_page( $page ) {
        if ( $this->is_page( $page ) ) unset( $this->pages[$page] );
		
		$this->total_pages = count( $this->pages );
    }
    
	public function is_parent_page( $page ) {
		if ( empty ( $this->pages[$page]['sub_page'] ) ) :
			return false;
		else :
			return true;
		endif;
	}
    
	public function is_child_page( $page ) {
		if ( empty ( $this->pages[$page]['parent_page'] ) ) :
			return false;
		else :
			return true;
		endif;
	}
	
    public function set_page_val( $page = NULL, $term = NULL, $val = NULL ) {
        if ( $page != NULL && $term != NULL && $val != NULL ) :
			if ( $term == 'parent_page' && NULL != $val ) :
				if ( $this->is_page( $val ) ) :
					$this->pages[$val]['sub_page'][] = $page;
				endif;
			endif;
			
			$this->pages[$page][$term] = $val;
		endif;
    }
	
	public function set_all_page_values( $page_id = NULL, $content = NULL ){
		if ( $page_id != NULL && $content != NULL ) :
			foreach ( $content as $key => $val ) :
				$this->set_page_val( $page_id, $key, $val );
			endforeach;
		endif;
	}
    
    public function get_page_val( $page = NULL, $term = NULL ) {
        if ( $page != NULL && $term != NULL && array_key_exists( $page, $this->pages ) ) :
            return $this->pages[$page][$term];
        else :
            return FALSE;
        endif;
    }
}

$pages = new Pages();
