<?php 

function app_title() {
	$route = Benlumia007\Alembic\App::resolve( 'routes' )->currentRoute();
	$paged = '';
	$title_tag = 'p';

	if ( false !== strpos( $route, 'page/{number}' ) ) {
		$p = explode( '/', Benlumia007\Alembic\App::resolve( 'request' )->uri() );
		$paged = ': Page ' . e( array_pop( $p ) );
	}

	if ( '/' === $route || 'page/{number}' === $route ) {
		echo ! empty( $title ) ? e( $title ) . $paged : e( site_title() );
		$title_tag = 'h1';
	} else {
		echo ! empty( $title ) ? e( $title ) . $paged . ' &mdash; ' . e( site_title() ) : e( site_title() );
	}
}