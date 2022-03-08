<?php
/**
 * Content service provider.
 *
 * @package   Blush
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018 - 2022, Justin Tadlock
 * @link      https://github.com/blush-dev/framework
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic\Core\Providers;

use Benlumia007\Alembic\Core\ServiceProvider;
use Benlumia007\Alembic\Content\Types\Component;
use Benlumia007\Alembic\Content\Types\Types;

class Content extends ServiceProvider {

	/**
	 * Register bindings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function register() {
                $this->app->singleton( 'content/types', Types::class );

                $this->app->singleton( Component::class, function() {
                        return new Component(
                                $this->app->resolve( 'content/types' ),
                                $this->app->config->get( 'content' )
                        );
                } );
        }

	/**
	 * Bootstrap bindings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function boot() {
                $this->app->resolve( Component::class )->boot();
        }
}