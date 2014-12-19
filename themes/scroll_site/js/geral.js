$( document ).ready( function() {
	
    // Ajustes gerais
	$( '#scroll-site' ).scroll_site({
		home_url: 'http://localhost/is_simple_master/',
		menu: '#main-menu',
		show_menu: true
	});
	
	$( 'a' ).addClass( 'transition' );
});
