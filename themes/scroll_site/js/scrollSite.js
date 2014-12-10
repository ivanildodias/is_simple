/**
 * scrollSite v1.0
 * 
 * Plugin para um site responsivo com base em mousewheel scroll para
 * passar as seções do site.
 * ------------------------------------------------------------------
 */

( function( $ ) {
	$.fn.scrollSite = function( options ) {
		// Opções padrão para o funcionamento do scrollSite
		options = $.extend({
			'menu': false,
			'show_menu': false,
			'hide_menu': false
		}, options );
		
		// Ajustes para um menu responsivo
		$( '#main-menu' ).before( '<button id="pull" class="hidden">&#9664; Menu</button>' );
		$( '#main-menu > ul > li:first-child' ).before( '<li><a id="hide" class="hidden">&#9658;</a></li>' );
		$( '#pull' ).click( function() {
			$( '#main-menu' ).show( '600ms' );
			$( this ).addClass( 'hidden' ).removeAttr( 'style' );
			$( '#hide' ).removeClass( 'hidden' ).show( '600ms' );
		});
		$( '#hide' ).click( function() {
			$( '#main-menu' ).hide( '600ms' );
			$( this ).addClass( 'hidden' ).removeAttr( 'style' );
			$( '#pull' ).removeClass( 'hidden' ).show( '600ms' );
		});
		
		// Ajustes para sub-menus
		$( 'a.haschildren' ).before( '<div class="nav-link-group"></div>' );
		$( '.nav-link-group' ).append($( '.nav-link-group' ).parent().find( 'a.haschildren' ));
		$( '.nav-link-group' ).append( '<a href="#" class="more-item transition radius5">&#9660;</a>' );
		$( '.sub-nav' ).hide();
		$( 'a.more-item' ).click( function(){
			$( this ).closest( 'li' ).find( '.sub-nav' ).slideToggle( '600ms' ).show();
			
			if ( $.trim( $( 'a.more-item' ).text() ) === '&#9660;' ) {
				$( 'a.more-item' ).text( '&#9650;' );
			} else {
				$( 'a.more-item' ).text( '&#9660;' );
			}
		});
		
		$( 'li.childselected_li' ).find( 'a.more-item' ).addClass( 'childselected' );
		
		// Ajuste click scroll to id no #main-menu
		$(options.menu).find( 'a[href^="#"]' ).click( function() {
	        
	        $( '#main-menu a' ).removeClass( 'selected' );
	        $( this ).addClass( 'selected' );
	        
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
			var cnav = $( '#main-menu' );							// Conteiner do menu e formulário de pesquisa
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
	};
})( jQuery );