<?php

namespace Benlumia007\Alembic\Entry\Types;

use Benlumia007\Alembic\Controllers\Author as AuthorController;
use Benlumia007\Alembic\Routing\Routes;
use Benlumia007\Alembic\App;

class Author extends Type {

	public function name() {

		return 'author';
	}

	public function path() {

		return '_users';
	}

	public function routes() {
		$this->router->get( 'author/{name}', AuthorController::class );
	}

	public function uri( $path = '' ) {

		if ( $path ) {
			$parts = explode( '.', $path );

			if ( 2 === count( $parts ) ) {
				$path = $parts[1];
			}
		}

		$uri = App::resolve( 'uri/relative' ) . '/author';

		return $path ? "{$uri}/{$path}" : $uri;
	}




}
