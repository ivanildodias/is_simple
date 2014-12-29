<?php defined( 'is_running' ) or die( 'Não é um ponto de entrada...' );

// Se a timezone não estiver definida...
defined( 'TIMEZONE' ) or define( 'TIMEZONE', 'America/Fortaleza' );

// Configura a timezone padrão no PHP 5
if ( function_exists( 'date_default_timezone_set' ) )
	date_default_timezone_set( TIMEZONE );


/**
 * CLASSE FILES
 * ------------------------------------------------------------------
 * 
 * Classe para manipulação de arquivos
 */
class Files {
	static function read_dir( $dir, $type = 'php' ) {
		$files = array();
		$ds = DIRECTORY_SEPARATOR;
		
		// Se não existir o diretório...
		if ( ! is_dir( $dir ) ) return false;
		
		// Abrindo diretório...
		$odir = @opendir( $dir );
		
		// Se falhar ao abrir o diretório...
		if ( ! $odir ) return false;
		
		// Construindo o array de arquivos...
		while ( ( $file = readdir( $odir ) ) !== false ) :
			// Ignora os resultados "." e ".." ...
			if ( $file == '.' || $file == '..' ) continue;
			
			$slug = explode( '.', $file );
			$ext = ( count( $slug ) == 1 ) ? 'dir' : end( $slug );					// Extensão do arquivo
			$path = ( count( $slug ) == 1 ) ? $dir . $file . $ds : $dir . $file;	// Caminho do arquivo
			$slug = str_replace( '.' . $ext, '', $file );							// Nome do arquivo
			
			// Pegar todos os arquivos
			if ( $type === false ) :
				$files[$slug] = array(
					'type' => $ext,
					'name' => $slug,
					'path' => $path
				);
				continue;
			endif;
			
			// Pegar apenas os diretórios
			if ( $type === 1 ) :
				if ( is_dir( $path ) ) :
					$files[$slug] = array(
						'type' => $ext,
						'name' => $slug,
						'path' => $path
					);
				endif;
				continue;
			endif;
			
			// Se $type for um array
			if ( is_array( $type ) ) :
				if ( in_array( $ext, $type ) ) :
					$files[$slug] = array(
						'type' => $ext,
						'name' => $slug,
						'path' => $path
					);
				endif;
				continue;
			endif;
			
			// Se $type for uma string
			if ( $ext == $type ) :
				$files[$slug] = array(
					'type' => $ext,
					'name' => $slug,
					'path' => $path
				);
				continue;
			endif;
		endwhile;
		
		// Fechando diretório...
		closedir( $odir );
		
		return $files;
	}
}

$s = DS;

$dir = dirname( dirname( __FILE__ ) ) . $s . 'admin' . $s . 'img' . $s;
echo $dir;

$type = array( 'png', 'php' );
$type2 = 'jpg';

$f = Files::read_dir( $dir, $type2 );

echo '<pre>';
print_r( $f );
echo '</pre>';