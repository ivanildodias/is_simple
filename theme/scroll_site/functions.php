<?php
// FUNÇÕES

function print_page( $page_name ) {
    global $pages;
	
	?>
    <article id="<?php echo $page_name; ?>" class="section">
        <div class="content-site conteiner">
            <div class="inner">
                <header class="header">
                    <h3><?php echo $pages->get_page_val( $page_name, 'title' ); ?></h3>
                </header>
                <div class="content">
                    <?php echo $pages->get_page_val( $page_name, 'content' ); ?>
                </div> <!-- /content -->
            </div>
        </div>
    </article>
    <?php
}


