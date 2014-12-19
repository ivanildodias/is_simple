<?php
/**
 * Cabeçalho do site
 * ------------------------------------------------------------------
 */
?>

<!DOCTYPE html>
<html lang="pt-BR" class="no-js">
	<head>
		<meta charset="utf-8">
		
		<!-- Tag de Verificação do Google Webmaster Tools -->
		<meta name="google-site-verification" content="ZEseyYmdWk9ZgV5UfshjMEVBj8QxjC_teMEc8V2SR9A" />

		<meta name="description" content="<?php site_info( 'site_desc' ); ?>">
		<meta name="author" content="<?php site_info(); ?>">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title><?php head_title(); ?></title>
		
		<!-- Fontes -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:700,400,400italic,700italic' rel='stylesheet' type='text/css'>

		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php get_url( 'theme' ); ?>css/reset.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php get_url( 'theme' ); ?>css/grid.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php get_url( 'theme' ); ?>css/style.css">

		<script type="text/javascript" src="<?php get_url( 'theme' ); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php get_url( 'theme' ); ?>js/modernizr.js"></script>
		<script type="text/javascript" src="<?php get_url( 'theme' ); ?>js/jquery.scroll_site.js"></script>
		<script type="text/javascript" src="<?php get_url( 'theme' ); ?>js/geral.js"></script>
	
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="<?php get_url( 'theme' ); ?>img/icons/favicon.ico">
		<link rel="apple-touch-icon" href="<?php get_url( 'theme' ); ?>img/icons/apple-touch-icon.png">
	</head>

	<body>
		<div id="grid" style="display: none;"><div class="conteiner"></div></div>
		<?php include_once 'analyticstracking.php'; ?>
	
		<header id="header" class="fixed">
            
			<section id="header-conteiner" class="conteiner">
				<div class="linha">
					
					<div class="col_7">
						<div id="logo-header" class="alignleft">
							<a href="<?php get_url(); ?>">
								<img src="<?php get_url( 'theme' ); ?>img/is_logo.png" alt="<?php site_info(); ?>" />
							</a>
						</div> <!-- #logo_header -->
						
						<hgroup id="masthead">
							<h1 id="site-title"><a href="<?php get_url(); ?>"><?php site_info(); ?></a></h1>
							<h2 id="site-description" class="sub-title"><?php site_info( 'site_desc' ); ?></h2>
						</hgroup> <!-- #masthead -->
					</div>
            		
            		
            		<?php // Main-menu
            		$menu = array(
            			'container' => 'nav',
            			'container_id' => 'main-menu',
            			'container_class' => 'col_5',
					);
            		
            		get_menu( $menu ); ?>
                    <!--<nav id="main-menu" class="col_5">
                        <ul class="nav">
                            <li><a class="selected" href="#home">Home</a></li>
                            <li><a href="#empresa">Empresa</a>
                            <li><a href="#portfolio">Portfólio</a></li>
                            <li><a href="#contato">Contato</a></li>
                        </ul>
                    </nav> <!-- #main-menu -->
					
				</div>
			</section> <!-- #header-conteiner -->
            
		</header> <!-- #header -->