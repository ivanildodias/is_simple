<?php
/**
 * Estrutura de conteúdo do site
 * ------------------------------------------------------------------
 */
?>
<article id="main">
	<div id="content_site" class="conteiner">
		<div class="inner">
			<header class="header">
				<h3><?php content_site( 'title' ); ?></h3>
			</header>
			<div class="content">
				<?php content_site( 'content' ); ?>
			</div> <!-- /content -->
		</div>
	</div>
</article>
