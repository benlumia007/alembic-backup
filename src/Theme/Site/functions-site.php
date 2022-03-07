<?php

function site_title() {
	$title = config( 'app', 'title' );
	return strip_tags( $title );
}

function site_tagline() {
	$title = Benlumia007\Alembic\App::resolve( 'siteDescription' );
	return strip_tags( $title );
}