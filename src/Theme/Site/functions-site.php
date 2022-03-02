<?php

function site_title() {
	$title = Benlumia007\Alembic\App::resolve( 'siteTitle' );
	return strip_tags( $title );
}

function site_tagline() {
	$title = Benlumia007\Alembic\App::resolve( 'siteDescription' );
	return strip_tags( $title );
}