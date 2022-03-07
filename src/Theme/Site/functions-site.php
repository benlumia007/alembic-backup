<?php

function site_title() {
	$title = config( 'app', 'title' );
	return strip_tags( $title );
}

function site_tagline() {
	$title = config( 'app', 'tagline' );
	return strip_tags( $title );
}