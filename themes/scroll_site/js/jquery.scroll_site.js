/**
 * scrollSite v1.0
 * 
 * Plugin para um site responsivo com base em mousewheel scroll para
 * passar as seções do site.
 * ------------------------------------------------------------------
 */

( function( $ ) {
	$.fn.scroll_site = function( options ) {
		// Opções padrão para o funcionamento do scrollSite
		var options = $.extend({
			'menu': false,
			'show_menu': false,
			'show_menu_text': '&#9664; Menu',
			'hide_menu_text': '&#9658;'
		}, options );
		
		// Ajustes para um menu responsivo
		if ( options.menu ) {
			
			if ( options.show_menu ) {
				
				// Botão para exibir o menu
				$( options.menu ).before( '<button id="show-menu" class="hidden">' + options.show_menu_text + '</button>' );
				$( '#show-menu' ).click( function() {
					$( options.menu ).show( '600ms' );
					$( this ).addClass( 'hidden' ).removeAttr( 'style' );
					$( '#hide' ).removeClass( 'hidden' ).show( '600ms' );
				});
				
				// Botão para ocultar o menu
				$( options.menu ).children( 'ul' ).children( 'li:first-child' ).before( '<li><a id="hide" class="hidden">' + options.hide_menu_text + '</a></li>' );
				$( '#hide' ).click( function() {
					$( options.menu ).hide( '600ms' );
					$( this ).addClass( 'hidden' ).removeAttr( 'style' );
					$( '#show-menu' ).removeClass( 'hidden' ).show( '600ms' );
				});
			}
			
			// Ajustes para sub-menus
			/*var list_item = $( options.menu + ' li' );
			var link_item = list_item.children( 'a' );
			
			if ( list_item.children( 'ul' ) ) {
				link_item.addClass( 'haschildren' );
			}*/
			
			$( 'a.haschildren' ).before( '<div class="nav-link-group"></div>' );
			$( '.nav-link-group' ).append( $( '.nav-link-group' ).parent().find( 'a.haschildren' ) );
			$( '.nav-link-group' ).append( '<a class="more-item transition radius5">&#9660;</a>' );
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
			$( options.menu ).find( 'a[href^="#"]' ).click( function() {
		        
		        $( options.menu ).find( 'a' ).removeClass( 'selected' );
		        $( this ).addClass( 'selected' );
		        
				$( 'html, body' ).animate({
					scrollTop : $( this.hash ).offset().top
				}, 500 );
		
				return false;
				e.preventDefault();
			});
		
		}
		
		/**
		 * responsiveMenu
		 * 
		 * Função para Menu de navegação responsivo e fluido
		 * ----------------------------------------------------------------------------
		 */
		function responsive_menu(){
			var show_menu = $( '#show-menu' );									// Botão Exibir/Ocultar menu e formulário de pesquisa
			var cnav = $( options.menu );							// Conteiner do menu e formulário de pesquisa
			var w_width = $( window ).innerWidth();					// Largura da janela de exibição do site
			
			if ( w_width <= 650 ) {		// Se a largura for menor ou igual a 650px...
				cnav.addClass( 'hidden' ).removeAttr( 'style' );	// Oculta o conteiner do menu
				show_menu.removeClass( 'hidden' );						// Exibe o botão
			} else {				// Caso contrário...
				cnav.removeClass( 'hidden' );		// Exibe o conteiner do menu
				show_menu.addClass( 'hidden' );		// Oculta o botão
			}
		}
		
		function scroll_site(){
		    var w_height = $( window ).innerHeight();
	        
	        $( '.section' ).css( 'height', w_height );
		}
		
		// Executa a função para o menu responsivo assim que a página é carregada
		responsive_menu();
		scroll_site();
		
		// Executa a função para o menu responsivo assim que a largura da janela é alterada
		$( window ).resize( responsive_menu );
		$( window ).resize( scroll_site );
	};
})( jQuery );