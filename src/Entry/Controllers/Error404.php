<?php

namespace Benlumia007\Alembic\Entry\Controllers;
use Benlumia007\Alembic\App;
use Benlumia007\Alembic\Engine;
use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;

class Error404 {
	public function __invoke() {
		Engine::display( '404', [], [
			'page'    => 1,
			'entries' => $this->entries(),
		] );
	}

	protected function entries() {
		return new Entries( new Locator( '_error' ), [ 'slug' => '404' ] );
	}
}
