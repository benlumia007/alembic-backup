<?php
/**
 * Framework contract.
 * 
 * The Framework class should be the primary class for working with
 * and launching the app. It also extends the `Container` contract
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Alembic\Contracts\Foundation;
use Benlumia007\Alembic\Contracts\Container\Container;

/**
 * Application interface
 * 
 * @since  1.0.0
 * @access public
 */
interface Application extends Container {
	/**
	 * Adds a service provider.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  mixed  $provider
	 * @return void
	 */
	public function provider( $provider );

	/**
	 * Adds a static proxy alias.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $class_name
	 * @param  string  $alias
	 * @return void
	 */
	public function proxy( $class_name, $alias );
}