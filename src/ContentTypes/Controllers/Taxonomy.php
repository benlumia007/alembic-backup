<?php

namespace Benlumia007\Alembic\Controllers;

use Benlumia007\Alembic\App;
use Benlumia007\Alembic\Entry\Entries;
use Benlumia007\Alembic\Entry\Locator;
use Benlumia007\Alembic\Engine;
use Benlumia007\Alembic\ContentTypes;

class Taxonomy {

	protected $params = [];

	public function __invoke( array $params = [] ) {

		$this->params = (array) $params;

		$this->slug = $this->params['name'];

		$path    = ContentTypes::get( 'category' )->path();
		$locator = new Locator( $path );
		$terms = ( new Entries( $locator, [ 'slug' => $this->slug ] ) )->all();

		Engine::display( 'taxonomy', [], [
			'page'    => 1,
			'entries' => $this->entries(),
			'query'   => array_shift( $terms )
		] );
	}

	protected function entries() {

		$path = ContentTypes::get( 'post' )->path();

		$locator = new Locator( $path );

		$per_page = PHP_INT_MAX;//posts_per_page();
		$current  = intval( trim( preg_replace( '/.*?page\/([\d]).*?/i', '$1', App::resolve( 'request' )->uri() ), '/' ) );
		$current  = $current ?: 1;

		$args = [
			'number'     => $per_page,
			'offset'     => $per_page * ( $current - 1 ),
			'order'      => 'desc',
			'meta_key'   => 'category',
			'meta_value' => $this->slug
		];

		return new Entries( $locator, $args );
	}
}
