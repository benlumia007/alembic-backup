<?php
function app( $abstract = '', $params = [] ) {
	return App::resolve( $abstract ?: 'app', $params );
}

function config( $name, $key = '' ) {
	$config = app( 'config' )->get( $name );

	if ( $key ) {
		return $config[ $key ] ?? null;
	}

	return $config;
}

function path( $path = '' ) {

	$path = trim( $path, '/' );

	return $path ? Benlumia007\Alembic\App::resolve( 'path' ) . "/{$path}" : Benlumia007\Alembic\App::resolve( 'path' );
}

function uri( $path = '' ) {

	$path = trim( $path, '/' );

	return $path ? Benlumia007\Alembic\App::resolve( 'uri' ) . "/{$path}" : Benlumia007\Alembic\App::resolve( 'uri' );
}

function public_path( $path = '' ) {

	$path = trim( $path, '/' );

	return $path ? path( "public/{$path}" ) : path( 'public' );
}

function public_uri( $path = '' ) {

	$path = trim( $path, '/' );

	return $path ? uri( "public/{$path}" ) : uri( 'public' );
}

function asset( $path ) {

	// Get the Laravel Mix manifest.
	$manifest = Benlumia007\Alembic\App::resolve( 'mix' );

	// Make sure to trim any slashes from the front of the path.
	$path = '/' . ltrim( $path, '/' );

	if ( $manifest && isset( $manifest[ $path ] ) ) {
		$path = $manifest[ $path ];
	}

	return public_uri( $path );
}

function e( $value, $double_encode = true ) {

	return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8', $double_encode );
}

function widow( $text ) {
	$words = explode( ' ', $text );

	if ( 3 >= count( $words ) ) {
		return $text;
	}

	$text  = trim( $text );
	$space = strrpos( $text, ' ' );

	if ( false !== $space ) {
		$text = substr( $text, 0, $space ) . '&nbsp;' . substr( $text, $space + 1 );
	}

	return $text;
}

function request() {
	$script_name = $_SERVER['SCRIPT_NAME'];
	$request_uri = $_SERVER['REQUEST_URI'];

	$basepath = implode( '/', array_slice( explode( '/', $script_name ), 0, -1 ) ) . '/';

	$uri = substr( $request_uri, strlen( $basepath ) );

	if ( strstr( $uri, '?' ) ) {
		$uri = substr( $uri, 0, strpos( $uri, '?' ) );
	}

	$uri = Benlumia007\Alembic\Tools\Str::slashBefore( $uri );

	return $uri;
}

function sanitize_slug( $slug ) {

	return sanitize_with_dashes( $slug );
}

function sanitize_with_dashes( $slug ) {

	//$slug = preg_replace( '/^[A-Za-z0-9]/i', '', $slug );
	$slug = strip_tags( $slug );
	$slug = strtolower( $slug );
	$slug = str_replace( [
		' ',
		'\s',
		'/',
		'\\'
	], '-', $slug );

	return $slug;
}

function posts_per_page() {
	return 10;
}