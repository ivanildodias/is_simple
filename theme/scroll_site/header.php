<?php
/**
 * Cabeçalho do site
 * ------------------------------------------------------------------
 */
?>

<!DOCTYPE html>
<html lang="pt-BR">
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
		<script type="text/javascript" src="<?php get_url( 'theme' ); ?>js/geral.js"></script>
	
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="<?php get_url( 'theme' ); ?>img/icons/favicon.ico">
		<link rel="apple-touch-icon" href="<?php get_url( 'theme' ); ?>img/icons/apple-touch-icon.png">
	</head>

	<body>
		<div id="grid"></div>
		<?php include_once 'analyticstracking.php'; ?>
	
		<header id="header">
			<section id="header-conteiner" class="conteiner">
				<div class="linha">
					
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
			</section> <!-- #header-conteiner -->
		</header> <!-- #header -->