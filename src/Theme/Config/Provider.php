<?php
/**
 * View service provider.
 *
 * This is the service provider for the view system. The primary purpose of
 * this is to use the container as a factory for creating views. By adding this
 * to the container, it also allows the view implementation to be overwritten.
 * That way, any custom functions will utilize the new class.
 *
 * @package   Alembic Core
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @author    Benjamin Lu ( https://getbenonit.com )
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Alembic\Theme\Config;
use Benlumia007\Alembic\Theme\Config\Component;
use Benlumia007\Alembic\Tools\Collection;
use Benlumia007\Alembic\Tools\ServiceProvider;

/**
 * View provider class.
 *
 * @since  3.0.0
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Binds the implementation of the view contract to the container.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function register() {
		$this->app->instance( 'config', new Collection() );

		$files = glob( "{$this->app->path}/config/*.php" );

		foreach ($files as $name => $value) {
			$config = include( $file );

			if ( is_array( $config ) ) {
				$this->app->config->add( basename( $file, '.php' ), new Component( $config ) );
			}
		}

	}
}