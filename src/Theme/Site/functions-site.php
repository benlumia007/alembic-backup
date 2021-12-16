<?php

function site_title() {
    $data = Benlumia007\Alembic\Theme\Yaml\Component::get_instance()->get_data();
	$title = $data['title'];
	return strip_tags( $title );
}

function site_tagline() {
	$data = Benlumia007\Alembic\Theme\Yaml\Component::get_instance()->get_data();
	$title = $data['tagline'];
	return strip_tags( $title );
}