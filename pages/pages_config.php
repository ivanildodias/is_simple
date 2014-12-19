<?php

// MENUS

$menu_pages = array(
	'main-menu' => array(
		'home' => array( 'link' => '#home' ),
		'empresa' => array(
			'link' => '#empresa',
			'sub_pages' => array(
				'sub_page_2' => array( 'link' => get_url( 'home', 'display' ) . 'sub_page_2' ),
				'sub_page' => array( 'link' => get_url( 'home', 'display' ) . 'sub_page' )
			)
		),
		'portfolio' => array( 'link' => '#portfolio' ),
		'contato' => array( 'link' => '#contato' )
		)
	);
