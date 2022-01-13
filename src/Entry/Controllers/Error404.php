<?php

namespace Benlumia007\Alembic\Entry\Controllers;
use Benlumia007\Alembic\App;
use Benlumia007\Alembic\Engine;
use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;

class Error404 {
	public function __invoke() {

		// Loooks for 404.php under public/views
		Engine::display( '404', [], [ 'entries' => $this->entries() ] );
	}

	protected function entries() {

		// Looks for _index.md under user/content/_error/_index.md
		return new Entries( new Locator( '_error' ), [ 'slug' => '_index' ] );
	}
}
