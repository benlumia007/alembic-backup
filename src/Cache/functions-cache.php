<?php

function cache_get( $name, $path = '' ) {

	return cache( $name, $path )->get()->all();
}

function cache( $name, $path = '' ) {

	$cache = Benlumia007\Alembic\App::resolve( 'cache' );

	if ( $cache->has( $name ) ) {
		return $cache->get( $name );
	}

	$cache->add( $name, new Benlumia007\Alembic\Cache\Component( $name, $path ) );

	return $cache->get( $name );
}