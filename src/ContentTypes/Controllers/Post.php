<?php

namespace Benlumia007\Alembic\Controllers;

use Benlumia007\Alembic\Entry\Entries;
use Benlumia007\Alembic\Entry\Locator;
//use Benlumia007\Alembic\Entry\Types\Post;
use Benlumia007\Alembic\Engine;

use Benlumia007\Alembic\App;

class Post {

	protected $slug;
	protected $path = '_posts';

	protected $type;

	protected $params = [];

	public function __invoke( array $params = [] ) {

		$this->params = (array) $params;

		$this->slug = $this->params['name'];

		$this->type = App::resolve( 'content/types' )->get( 'post' );

		$entries = $this->entries();

		$all = $entries->all();
		$entry = array_shift( $all );

		Engine::display( 'single', [], [
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
