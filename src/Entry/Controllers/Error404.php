<?php

namespace Benlumia007\Alembic\Entry\Controllers;
use Benlumia007\Alembic\App;
use Benlumia007\Alembic\Engine;
use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;

class Error404 {

	protected $slug;
	protected $path = '_posts';

	protected $type;

	public function __invoke() {

		http_response_code( 404 );

		$entries = $this->entries();

		$all = $entries->all();
		$entry = array_shift( $all );

		Engine::display( '404', [], [
			'title'   => $entry ? $entry->title() : 'Not Found',
			'page'    => 1,
			'entries' => $entries
		] );
	}

	protected function entries() {

		$locator = new Locator( '_error' );

		return new Entries( $locator, [ 'slug' => '404' ] );
	}
}
