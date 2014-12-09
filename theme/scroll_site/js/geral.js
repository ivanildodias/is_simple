$( document ).ready( function() {
	
	// Ajustes gerais
	$( 'a' ).addClass( 'transition' );
	
	// Ajustes para um menu responsivo
	$( '#pull' ).click( function() {
		$( '#main-menu' ).toggle( '600ms' );
	});
	
	// Ajustes para sub-menus
	$( 'a.haschildren' ).before( '<div class="nav-link-group"></div>' );
	$( '.nav-link-group' ).append($( '.nav-link-group' ).parent().find( 'a.haschildren' ));
	$( '.nav-link-group' ).append( '<a href="#" class="more-item transition radius5">▼</a>' );
	$( '.sub-nav' ).hide();
	$( 'a.more-item' ).click(function(){
		$(this).parent().parent().find( '.sub-nav' ).slideToggle( '600ms' ).show();
		
		if ( $.trim( $( 'a.more-item' ).text() ) === '▼' ) {
			$( 'a.more-item' ).text( '▲' );
		} else {
			$( 'a.more-item' ).text( '▼' );
		}
	});
	
	$( 'li.childselected_li' ).find( 'a.more-item' ).addClass( 'childselected' );
	
	// Ajuste click scroll to id no #main-menu
	$( '#main-menu a[href^="#"]' ).click( function() {
		$( 'html, body' ).animate({
			scrollTop : $( this.hash ).offset().top
		}, 500 );

		return false;
		e.preventDefault();
	});
	
	/**
	 * responsiveMenu
	 * 
	 * Função para Menu de navegação responsivo e fluido
	 * ----------------------------------------------------------------------------
	 */
	function responsiveMenu(){
		var pull = $( '#pull' );									// Botão Exibir/Ocultar menu e formulário de pesquisa
		var cnav = $( '#nav-content' );							// Conteiner do menu e formulário de pesquisa
		var wWidth = $( window ).innerWidth();					// Largura da janela de exibição do site
		
		if ( wWidth <= 650 ) {		// Se a largura for menor ou igual a 650px...
			cnav.addClass( 'hidden' ).removeAttr( 'style' );	// Oculta o conteiner do menu
			pull.removeClass( 'hidden' );						// Exibe o botão
		} else {				// Caso contrário...
			cnav.removeClass( 'hidden' );		// Exibe o conteiner do menu
			pull.addClass( 'hidden' );		// Oculta o botão
		}
	}
	
	function scroll_site(){
	    var wHeight = $( window ).innerHeight();
        
        $( '.section' ).css( 'height', wHeight );
	}
	
	// Executa a função para o menu responsivo assim que a página é carregada
	responsiveMenu();
	scroll_site();
	
	// Executa a função para o menu responsivo assim que a largura da janela é alterada
	$( window ).resize( responsiveMenu );
	$( window ).resize( scroll_site );
	
});
