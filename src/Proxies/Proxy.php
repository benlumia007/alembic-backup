<?php
/**
 * Static proxy class.
 *
 * The base static proxy class. This allows us to create easy-to-use, static
 * classes around shared objects in the container.
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (c) 2019 - 2022, Justin Tadlock
 * @link      https://github.com/benlumia007/alembic
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic\Proxies;
use Benlumia007\Alembic\Contracts\Container\Container;

class Proxy
{
	/**
	 * The container object.
	 *
	 * @since 1.0.0
	 */
	protected static Container $container;

	/**
	 * Returns the name of the accessor for object registered in the container.
	 *
	 * @since  1.0.0
	 */
	protected static function accessor() : string
	{
		return '';
	}

	/**
	 * Sets the container object.
	 *
	 * @since 1.0.0
	 */
	public static function setContainer( Container $container ) : void
	{
		static::$container = $container;
	}

	/**
	 * Returns the instance from the container.
	 *
	 * @since 1.0.0
	 */
	protected static function instance() : object
	{
		return static::$container->resolve( static::accessor() );
	}

	/**
	 * Calls the requested method from the object registered with the
	 * container statically.
	 *
	 * @since  1.0.0
	 * @param  array   $args
	 * @return mixed
	 */
	public static function __callStatic( string $method, $args )
	{
		$instance = static::instance();
		return $instance ? $instance->$method( ...$args ) : null;
	}
}