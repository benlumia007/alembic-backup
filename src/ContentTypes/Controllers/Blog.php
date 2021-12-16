<?php

namespace Benlumia007\Alembic\Controllers;

use Benlumia007\Alembic\Entry\Entries;
use Benlumia007\Alembic\Entry\Locator;
use Benlumia007\Alembic\Engine;

class Blog {

	protected $params;

	public function __invoke( array $params = [] ) {

		$this->params = $params;

		Engine::display( 'blog', [], [
			'page'    => isset( $this->params['number'] ) ? intval( $this->params['number'] ) : 1,
			'entries' => $this->entries(),
			'title'   => e( site_title() ),
		] );
	}

	protected function entries() {

		$path = '_posts';

		$locator = new Locator( $path );

		$per_page = posts_per_page();
		$current  = isset( $this->params['number'] ) ? intval( $this->params['number'] ) : 1;

		$args = [
			'number' => $per_page,
			'offset' => $per_page * ( $current - 1 ),
			'order'  => 'desc',
		//	'orderby' => 'date'
		];

		return new Entries( $locator, $args );
	}
}
