<?php

namespace Benlumia007\Alembic\Entry\Controllers;

use Benlumia007\Alembic\Engine;
use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;

class Page {

	protected $slug;
	protected $path;

	protected $params = [];

	public function __invoke( array $params = [] ) {

		$this->params = ( array ) $params;

		$_path = $this->params[ 'name' ];

		$page = explode( '/', $_path );

		$this->slug = urldecode( array_pop( $page ) );

		$all = $entries->all();
		$entry = array_shift( $all );

		if ( is_null( $entry ) ) {
			$controller = new Error404();
			$controller();
			die();
		}

		Engine::display( 'page', [ $this->slug ], [
			'title'   => $entry ? $entry->title() : 'Not Found',
			'query'   => $entry ? $entry : false,
			'page'    => 1,
			'entries' => $this->entries()
		] );
	}

	protected function entries() {

		// Looks for _index.md under user/content/{slug}/_index.md
		$entries = new Entries( new Locator( $this->slug ), [ 'slug' => '_index'] );

		// Return $entries
		return $entries;
	}
}
