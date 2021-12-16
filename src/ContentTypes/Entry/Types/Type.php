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

use Benlumia007\Alembic\Routing\Routes;

abstract class Type {

	protected $router;

	public function __construct( Routes $router ) {

		$this->router = $router;
	}

	abstract public function name();

	abstract public function routes();

	public function meta() {}

}
