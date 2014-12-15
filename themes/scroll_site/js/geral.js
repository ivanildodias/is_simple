$( document ).ready( function() {
	
    // Ajustes gerais
	$( 'a' ).addClass( 'transition' );
	
	$( '#scroll-site' ).scroll_site({
		menu: '#main-menu',
		show_menu: true
	});
});
