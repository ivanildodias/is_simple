<?php

// MENUS

$menu_pages = array(
	'main-menu' => array(
		'home' => array( 'link' => get_page_url( 'home', FALSE ) ),
		'empresa' => array(
			'link' => get_page_url( 'empresa', FALSE ),
			'sub_pages' => array(
				'sub_page_2' => array( 'link' => get_page_url( 'sub_page_2', FALSE ) ),
				'sub_page' => array( 'link' => get_page_url( 'sub_page', FALSE ) )
			)
		),
		'portfolio' => array( 'link' => get_page_url( 'portfolio', FALSE ) ),
		'contato' => array( 'link' => get_page_url( 'contato', FALSE ) )
		)
	);
