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

		$entries = [];

		// Because this is a page, let's assume the slug is a folder
		// name and check for `index.php` first.
		//
		// @todo - strip everything to first dot for ordered pages.
		$index_path = $this->path ? "{$this->path}/{$this->slug}" : $this->slug;

		$locator = new Locator( $index_path );

		$entries = new Entries( $locator, [ 'slug' => '_index' ] );

		if ( ! $entries->all() ) {

			$locator = new Locator( $this->path );

			$entries = new Entries( $locator, [ 'slug' => $this->slug ] );
		}

		return $entries;
	}
}
