<?php
/**
 * Estrutura de conteúdo do site
 * ------------------------------------------------------------------
 */
get_header(); ?>

<main id="scroll-site">
	<?php print_all_pages();
	global $pages;
	echo '<pre>';
	print_r( $pages );
	echo '</pre>'; ?>
</main>

<? get_footer();