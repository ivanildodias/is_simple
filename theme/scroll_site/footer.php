<?php
/**
 * Rodapé do site
 * ------------------------------------------------------------------
 */
?>
		<footer id="footer">
			<div id="footer_inner" class="conteiner">
				<div class="inner">
					<div id="footer_text">
						<p>&copy; 2013-<?php echo date( 'Y' ); ?> | <a href="<?php get_url(); ?>" ><?php site_info(); ?></a>. Todos os direitos reservados.</p>
					</div>
					<a id="footer_logo" href="<?php get_url(); ?>"><img src="<?php get_url( 'theme' ); ?>img/footer_logo.png" alt="<?php site_info(); ?>" /></a>
					<div class="clear"></div>
				</div>
		</footer> <!-- #footer -->
	</body>
</html>