<?php

function cache_get_add( string $name, string $type = 'collection' ) {
	$cache = cache();

	if ( $cache->has( $name ) ) {
		return $cache->get( $name )->get();
	}

	cache_add( $name, $type );

	$_cache = $cache->get( $name );

	return $_cache->get();
}

function cache( $name, $path = '' ) {

	$cache = Benlumia007\Alembic\App::resolve( 'cache' );

	if ( $cache->has( $name ) ) {
		return $cache->get( $name );
	}

	$cache->add( $name, new Benlumia007\Alembic\Cache\Component( $name, $path ) );

	return $cache->get( $name );
}

function cache_get( $name, $path = '' ) {

	return cache( $name, $path )->get()->all();
}

function cache_set( $name, $path = '', $data = [] ) {

	cache( $name, $path )->set( $data );
}

function cache_delete( $name, $path = '' ) {

	cache( $name, $path )->delete();
}