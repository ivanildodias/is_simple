<?php

// MENUS

$menu_pages = array(
	'main-menu' => array(
		'home' => array( 'link' => get_url( 'home', 'display' ) ),
		'empresa' => array(
			'link' => get_url( 'home', 'display' ) . 'empresa',
			'sub_pages' => array(
				'sub_page_2' => array( 'link' => get_url( 'home', 'display' ) . 'sub_page_2' ),
				'sub_page' => array( 'link' => get_url( 'home', 'display' ) . 'sub_page' )
			)
		),
		'portfolio' => array( 'link' => get_url( 'home', 'display' ) . 'portfolio' ),
		'contato' => array( 'link' => get_url( 'home', 'display' ) . 'contato' )
		)
	);
