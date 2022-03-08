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

function cache() {
	return Benlumia007\Alembic\Proxies\App::resolve( 'cache' );
}

function cache_add( string $name, string $type = 'collection' ) {
	$cache = cache();

	$map = [
		'collection' => Cache\Collection::class,
		'html'       => Cache\Html::class,
		'json'       => Cache\Json::class,
		'rapid'      => Cache\Rapid::class
	];

	if ( isset( $map[ $type ] ) ) {
		$callback = $map[ $type ];
		$cache->add( $name, new $callback( $name ) );
	}
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