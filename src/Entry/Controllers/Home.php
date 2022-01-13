<?php

namespace Benlumia007\Alembic\Entry\Controllers;

use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;
use Benlumia007\Alembic\Engine;

class Home {

	protected $params;

	public function __invoke( array $params = [] ) {

		$this->params = $params;

		Engine::display( 'home', [], [
			'page'    => isset( $this->params['number'] ) ? intval( $this->params['number'] ) : 1,
			'entries' => $this->entries(),
			'title'   => e( site_title() ),
		] );
	}

	protected function entries() {

		// regular page - _index.md
		$locator = new Locator();

		$entries = new Entries( $locator, [ 'slug' => '_index' ] );

		if ( $entries->all() ) {
			return $entries;
		}
	}
}
