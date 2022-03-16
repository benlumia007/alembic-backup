<?php
/**
 * Makeable interface.
 *
 * Defines the contract that makeable classes should utilize. Makeable classes
 * should have a `make()` method for creating or building all or part of the
 * object and should always return the object itself for chaining methods.
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (c) 2019 - 2022, Benjamin Lu
 * @link      https://github.com/benlumia007/alembic
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic\Contracts;

interface Makeable
{
	/**
	 * Makes an object.
	 *
	 * @since 1.0.0
	 */
	public function make() : self;
}