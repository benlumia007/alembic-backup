<?php

namespace Benlumia007\Alembic\Entry\Types;

use Benlumia007\Alembic\Controllers\Taxonomy as TaxonomyController;
use Benlumia007\Alembic\Routing\Routes;
use Benlumia007\Alembic\App;

class Tag extends Type {

	public function name() {

		return 'tag';
	}

	public function path() {

		return '_tags';
	}

	public function routes() {

		$this->router->get( 'tag/{name}', TaxonomyController::class );
	}

	public function uri( $path = '' ) {

		$uri = App::resolve( 'uri/relative' ) . '/tag';

		return $path ? "{$uri}/{$path}" : $uri;
	}




}
