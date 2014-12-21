<?php
/**
 * Estrutura de conteúdo do site
 * ------------------------------------------------------------------
 */
get_header(); ?>

<?php global $pages; ?>
<main id="scroll-site">
	<article id="<?php echo $page_name; ?>" class="section">
        <div class="content-site conteiner">
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
</main>

<? get_footer();