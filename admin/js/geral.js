$( document ).ready( function() {
	
    // Ajustes gerais
    
    // Botão para exibir o menu
	$( '#main-menu' ).before( '<button id="show-menu" class="hidden">◀ Menu</button>' );
	$( '#show-menu' ).click( function() {
		$( '#main-menu' ).show( '600ms' );
		$( this ).addClass( 'hidden' ).removeAttr( 'style' );
		$( '#hide' ).removeClass( 'hidden' ).show( '600ms' );
	});
	
	// Botão para ocultar o menu
	$('#main-menu').children( 'ul' ).children( 'li:first-child' ).before( '<li><a id="hide" class="hidden">▶</a></li>' );
	$( '#hide' ).click( function() {
		$('#main-menu').hide( '600ms' );
		$( this ).addClass( 'hidden' ).removeAttr( 'style' );
		$( '#show-menu' ).removeClass( 'hidden' ).show( '600ms' );
	});

	// Ajustes para sub-menus
	$( 'a.haschildren' ).before( '<div class="nav-link-group"></div>' );
	$( '.nav-link-group' ).append( $( '.nav-link-group' ).parent().find( 'a.haschildren' ) );
	$( '.nav-link-group' ).append( '<a class="more-item">▼</a>' );
	$( '.sub-nav' ).hide();
	$( 'a.more-item' ).click( function(){
		$( this ).closest( 'li' ).find( '.sub-nav' ).slideToggle( '600ms' ).show();
		
		if ( $.trim( $( 'a.more-item' ).text() ) === '▼' ) {
			$( 'a.more-item' ).text( '▲' );
		} else {
			$( 'a.more-item' ).text( '▼' );
		}
	});
	
	$( 'li.childselected_li' ).find( 'a.more-item' ).addClass( 'childselected' );
    
	$( 'a' ).addClass( 'transition' );
	
	/**
	 * responsiveMenu
	 * 
	 * Função para Menu de navegação responsivo e fluido
	 * ----------------------------------------------------------------------------
	 */
	function responsive_menu(){
		var show_menu = $( '#show-menu' );									// Botão Exibir/Ocultar menu e formulário de pesquisa
		var cnav = $('#main-menu');							// Conteiner do menu e formulário de pesquisa
		var w_width = $( window ).innerWidth();					// Largura da janela de exibição do site
		
		if ( w_width <= 650 ) {		// Se a largura for menor ou igual a 650px...
			cnav.addClass( 'hidden' ).removeAttr( 'style' );	// Oculta o conteiner do menu
			show_menu.removeClass( 'hidden' );						// Exibe o botão
		} else {				// Caso contrário...
			cnav.removeClass( 'hidden' );		// Exibe o conteiner do menu
			show_menu.addClass( 'hidden' );		// Oculta o botão
		}
	}
	
	// Executa a função para o menu responsivo assim que a página é carregada
	responsive_menu();
	
	// Executa a função para o menu responsivo assim que a largura da janela é alterada
	$( window ).resize( responsive_menu );
});