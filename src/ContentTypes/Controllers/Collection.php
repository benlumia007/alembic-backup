<?php

namespace Benlumia007\Alembic\Controllers;

use Benlumia007\Alembic\Entry\Entries;
use Benlumia007\Alembic\Entry\Locator;
use Benlumia007\Alembic\Engine;

class Collection {

	public function __invoke() {

		Engine::display( 'collection', [], [
			'page'    => 1,
			'entries' => $this->entries()
		] );
	}

	protected function entries() {

		$path = 'posts';

		$locator = new Locator( request() );

		$per_page = posts_per_page();
		$current  = intval( trim( preg_replace( '/.*?page\/([\d]).*?/i', '$1', request() ), '/' ) );
		$current  = $current ?: 1;

		$request = explode( '/', request() );

		$args = [
			'number'     => $per_page,
			'offset'     => $per_page * ( $current - 1 ),
			'order'      => 'desc'
		];

		return new Entries( $locator, $args );
	}
}
