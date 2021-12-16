<?php

namespace Benlumia007\Alembic\ContentTypes\Entry;

use Benlumia007\Alembic\Entry\Types\Type;
use Benlumia007\Alembic\Tools\Collection;

class Types extends Collection {

	public function add( $name, $type ) {

		if ( ! $type instanceof Type ) {
			return;
		}

		parent::add( $name, $type );
	}

	public function registerRoutes() {

		foreach ( $this->all() as $type ) {
			$type->routes();
		}
	}
}
