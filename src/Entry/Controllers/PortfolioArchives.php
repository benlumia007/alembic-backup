<?php

namespace Benlumia007\Alembic\Entry\Controllers;

use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;
use Benlumia007\Alembic\Engine;
use Benlumia007\Alembic\ContentTypes;

class PortfolioArchives {

	protected $params;

	public function __invoke( array $params = [] ) {

		$this->params = $params;

		$path    = ContentTypes::get( 'portfolio' )->path();
		$locator = new Locator( $path );
		$terms = ( new Entries( $locator, [ 'slug' => '_index' ] ) )->all();

		Engine::display( 'archive-portfolio', [], [
			'title'   => 'Portfolio',
			'query'   => array_shift( $terms ),
			'page'    => isset( $this->params['number'] ) ? intval( $this->params['number'] ) : 1,
			'entries' => $this->entries()
		] );
	}

	protected function entries() {

		$path = '_portfolios';

		$locator = new Locator( $path );

		$per_page = 9;
		$current  = isset( $this->params['number'] ) ? intval( $this->params['number'] ) : 1;

		$args = [
			'number' => $per_page,
			'offset' => $per_page * ( $current - 1 ),
			'order'  => 'desc',
		];

		return new Entries( $locator, $args );
	}
}