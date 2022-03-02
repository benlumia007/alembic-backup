<?php

function primary_menu() {
	$data = Benlumia007\Alembic\App::resolve( 'primaryMenu' );

	// Append the requested resource location to the URL
	$path = $_SERVER['REQUEST_URI'];
	
	foreach ( $data as $menu ) { ?>
		<li class="menu-item"><a <?= $path === $menu['link'] ? 'class="active"' : ''?> href="<?= e( uri( $menu['link'] ) ) ?>"><?= e( $menu['title'] ); ?></a></li>
	<?php }
}

function social_menu() {
	$data = Benlumia007\Alembic\App::resolve( 'socialMenu' );
	foreach ($data as $social ) { ?>
		<li class="menu-item"><a href="<?= e( $social['url'] ); ?>" target="_blank"><svg><?php include( public_path() . e( $social['svg'] ) ); ?></svg></a></li>
	<?php }
}