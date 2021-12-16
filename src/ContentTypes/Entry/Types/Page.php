<?php

namespace Benlumia007\Alembic\Entry\Types;

use Benlumia007\Alembic\Controllers\Page as Controller;
use Benlumia007\Alembic\Routing\Routes;
use Benlumia007\Alembic\App;

class Page extends Type {

	public function name() {

		return 'page';
	}

	public function path() {

		return '';
	}

	public function routes() {

		$this->router->get( '{name}', Controller::class );
	}

	public function uri( $path = '' ) {

		$uri = App::resolve( 'uri/relative' );

		return $path ? "{$uri}/{$path}" : $uri;
	}




}
