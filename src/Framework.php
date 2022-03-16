<?php
/**
 * Application class.
 *
 * This class is essentially a wrapper around the `Container` class that's
 * specific to the framework. This class is meant to be used as the single,
 * one-true instance of the framework. It's used to load up service providers
 * that interact with the container.
 *
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (c) 2019 - 2022, Benjamin Lu
 * @link      https://github.com/benlumia007/alembic
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic;

use Benlumia007\Alembic\Container\Container;
use Benlumia007\Alembic\Contracts\Core\Application as ApplicationContract;
use Benlumia007\Alembic\Contracts\Bootable;
use Benlumia007\Alembic\Proxies\App;
use Benlumia007\Alembic\Proxies\Proxy;
use Benlumia007\Alembic\Tools\Str;

/**
 * Application class.
 *
 * @since  1.0.0
 * @access public
 */
class Framework extends Container implements ApplicationContract, Bootable
{
	/**
	 * The current version of the framework.
	 *
	 * @since 1.0.0
	 */
	const VERSION = '1.0.0-alpha';

	/**
	 * Array of service provider objects.
	 *
	 * @since 1.0.0
	 */
	protected array $providers = [];

	/**
	 * Array of static proxy classes and aliases.
	 *
	 * @since 1.0.0
	 */
	protected array $proxies = [];

	/**
	 * Registers the default bindings, providers, and proxies for the
	 * framework.
	 *
	 * @since 1.0.0
	 */
	public function __construct( string $path ) {
		$this->instance( 'path', Str::normalizePath( $path ) );
		$this->registerDefaultBindings();
		$this->registerDefaultProviders();
		$this->registerDefaultProxies();
	}

	/**
	 * Calls the functions to register and boot providers and proxies.
	 *
	 * @since 1.0.0
	 */
	public function boot(): void {
		$this->registerProviders();
		$this->registerProxies();
		$this->bootProviders();
	}

	/**
	 * Registers the default bindings we need to run the framework.
	 *
	 * @since 1.0.0
	 */
	protected function registerDefaultBindings(): void {
		// Add the instance of this application.
		$this->instance( 'app', $this );

		// Add the version for the framework.
		$this->instance( 'version', static::VERSION );
	}

	/**
	 * Registers the default service providers.
	 *
	 * @since 1.0.0
	 */
	protected function registerDefaultProviders(): void {

	}

	/**
	 * Adds the default static proxy classes.
	 *
	 * @since 1.0.0
	 */
	protected function registerDefaultProxies(): void {
		Proxy::setContainer( $this );
		
		$this->proxy( App::class, 'Benlumia007\Alembic\App' );
	}

	/**
	 * Adds a service provider. All service providers must extend the
	 * `ServiceProvider` class. A string or an instance of the provider may
	 * be passed in.
	 *
	 * @since  1.0.0
	 * @param  string|object  $provider
	 */
	public function provider( $provider ): void {
		if ( is_string( $provider ) ) {
			$provider = $this->resolveProvider( $provider );
		}

		$this->providers[] = $provider;
	}

	/**
	 * Creates a new instance of a service provider class.
	 *
	 * @since 1.0.0
	 */
	protected function resolveProvider( string $provider ): ServiceProvider {
		return new $provider( $this );
	}

	/**
	 * Calls a service provider's `register()` method.
	 *
	 * @since 1.0.0
	 */
	protected function registerProvider( ServiceProvider $provider ): void {
		$provider->register();
	}

	/**
	 * Calls a service provider's `boot()` method.
	 *
	 * @since 1.0.0
	 */
	protected function bootProvider( ServiceProvider $provider ): void {
		$provider->boot();
	}

	/**
	 * Returns an array of service providers.
	 *
	 * @since 1.0.0
	 */
	protected function getProviders(): array {
		return $this->providers;
	}

	/**
	 * Calls the `register()` method of all the available service providers.
	 *
	 * @since 1.0.0
	 */
	protected function registerProviders(): void {
		foreach ( $this->getProviders() as $provider ) {
			$this->registerProvider( $provider );
		}
	}

	/**
	 * Calls the `boot()` method of all the registered service providers.
	 *
	 * @since 1.0.0
	 */
	protected function bootProviders(): void
	{
		foreach ( $this->getProviders() as $provider ) {
			$this->bootProvider( $provider );
		}
	}

	/**
	 * Adds a static proxy alias. Developers must pass in fully-qualified
	 * class name and alias class name.
	 *
	 * @since 1.0.0
	 */
	public function proxy( string $class_name, string $alias ): void {
		$this->proxies[ $class_name ] = $alias;
	}

	/**
	 * Registers the static proxy classes.
	 *
	 * @since 1.0.0
	 */
	protected function registerProxies(): void {
		foreach ( $this->proxies as $class => $alias ) {
			class_alias( $class, $alias );
		}
	}
}