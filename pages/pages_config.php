<?php

// MENUS

$menu_pages = array(
	'main-menu' => array(
		'home' => array( 'link' => get_page_url( 'home', 'display' ) ),
		'empresa' => array(
			'link' => get_page_url( 'empresa', 'display' ),
			'sub_pages' => array(
				'sub_page_2' => array( 'link' => get_page_url( 'sub_page_2', 'display' ) ),
				'sub_page' => array( 'link' => get_page_url( 'sub_page', 'display' ) )
			)
		),
		'portfolio' => array( 'link' => get_page_url( 'portfolio', 'display' ) ),
		'contato' => array( 'link' => get_page_url( 'contato', 'display' ) )
		)
	);
