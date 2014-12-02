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

		<!-- Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- Tag de Verificação do Google Webmaster Tools -->
		<meta name="google-site-verification" content="ZEseyYmdWk9ZgV5UfshjMEVBj8QxjC_teMEc8V2SR9A" />

		<meta name="description" content="<?php site_info( 'site_desc' ); ?>">
		<meta name="author" content="<?php site_info(); ?>">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title><?php head_title(); ?></title>
		
		<!-- Fontes -->
		<link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

		<!-- Stylesheets -->
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
			<hgroup id="masthead" class="limit">
				<div id="logo_header" class="inner">
					<a href="<?php get_url(); ?>">
						<img src="<?php get_url( 'theme' ); ?>img/logo_ignus_slogan.png" alt="<?php site_info(); ?>" />
					</a>
				</div> <!-- #logo_header -->
				<div class="clear"></div>
				<!-- <h1 id="site_title"><a href="<?php echo $home_link; ?>"><?php echo $site_name; ?></a></h1>
				<h2 id="site_description"><?php echo $site_description; ?></h2> -->
			</hgroup> <!-- #masthead -->
		</header> <!-- #header -->