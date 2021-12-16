<?php
/**
 * Application class.
 *
 * This class is essentially a wrapper around the `Container` class that's
 * specific to the framework. This class is meant to be used as the single,
 * one-true instance of the framework. It's used to load up service providers
 * that interact with the container.
 *
 * @package   Benlumia007\Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright 2021. Benjamin Lu
 * @link      https://github.com/benlumia007/benjlu
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
namespace Benlumia007\Alembic\Entry\Types;

use Benlumia007\Alembic\Controllers\Post as PostController;
use Benlumia007\Alembic\Controllers\PostDayArchive;
use Benlumia007\Alembic\Controllers\PostMonthArchive;
use Benlumia007\Alembic\Controllers\PostYearArchive;
use Benlumia007\Alembic\Routing\Routes;
use Benlumia007\Alembic\App;

class Post extends Type {
	public function name() {
		return 'post';
	}

	public function path() {
		return '_posts';
	}

	public function routes() {
		$this->router->get( 'archives/{year}/{month}/{day}/{name}', PostController::class );
		$this->router->get( 'archives/{year}/{month}/{day}', PostDayArchive::class );
		$this->router->get( 'archives/{year}/{month}', PostMonthArchive::class );
		$this->router->get( 'archives/{year}', PostYearArchive::class );
	}

	public function uri( $path = '' ) {

		$uri = App::resolve( 'uri' ) . '/archives';

		return $path ? "{$uri}/{$path}" : $uri;
	}
}
