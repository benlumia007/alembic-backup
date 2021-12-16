<?php

namespace Benlumia007\Alembic\Template\Engine;
use Benlumia007\Alembic\View\View\Component as View;

class Component {

	public function view( $name, array $slugs = [], $data = [] ) {

		return new View( $name, $slugs, $data );
	}

	public function display( $name, array $slugs = [], $data = [] ) {
		$this->view( $name, $slugs, $data)->display();
	}

	public function render( $name, array $slugs = [], $data = [] ) {
		return $this->view( $name, $slugs, $data)->render();
	}
}