<?php

namespace Benlumia007\Alembic\Entry\Controllers;

use Benlumia007\Alembic\Entry\Controllers\Error404;
use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;
use Benlumia007\Alembic\Engine;
use Benlumia007\Alembic\App;

class Portfolio {

	protected $slug;
	protected $path = '_portfolios';

	protected $type;
	protected $params = [];

	public function __invoke( array $params = [] ) {

		$this->params = (array) $params;

		$this->slug = $this->params['name'];

		$this->type = App::resolve( 'content/types' )->get( 'portfolio' );

		$entries = $this->entries();

		$all = $entries->all();
		$entry = array_shift( $all );

		if ( is_null( $entry ) ) {
			$controller = new Error404();
			$controller();
			die();
		}

		Engine::display( 'portfolio', [ $this->slug ], [
			'title'   => $entry ? $entry->title() : 'Not Found',
			'query'   => $entry ? $entry : false,
			'page'    => 1,
			'entries' => $entries
		] );
	}

	protected function entries() {

		$locator = new Locator( $this->type->path() );

		return new Entries( $locator, [ 'slug' => $this->slug ] );
	}
}