<?php

function primary_menu() {
	$data = Benlumia007\Alembic\Theme\Yaml\Component::get_instance()->get_data();
	foreach ($data['primary'] as $name => $title ) { ?>
		<li class="menu-item"><a href="<?= e( uri( $title['url'] ) ) ?>"><?= e( $title['title'] ); ?></a></li>
	<?php }
}

function social_menu() {
	$data = Benlumia007\Alembic\Theme\Yaml\Component::get_instance()->get_data();
	foreach ($data['social'] as $name => $title ) { ?>
		<li class="menu-item"><a href="<?= e( $title['url'] ); ?>" target="_blank"><svg><?php include( public_path() . e( $title['svg'] ) ); ?></svg></a></li>
	<?php }
}