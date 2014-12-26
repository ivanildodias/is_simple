<?php
// Se a timezone não estiver definida...
defined( 'DEFAULT_ZONE' ) or define( 'DEFAULT_ZONE', 'America/Fortaleza' );

// Configura a timezone padrão no PHP 5
if ( function_exists( 'date_default_timezone_set' ) )
	date_default_timezone_set( DEFAULT_ZONE );


/**
 * CLASSE FILES
 * ------------------------------------------------------------------
 * 
 * Classe para manipulação de arquivos
 */
class Files {
	
}