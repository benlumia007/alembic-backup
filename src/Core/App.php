<?php 

namespace Benlumia007\Alembic\Core;
use Benlumia007\Alembic\Tools\Collection;
use Benlumia007\Alembic\Tools\ServiceProvider;

use Benlumia007\Alembic\Template\Engine;
use Benlumia007\Alembic\Template\View;

class App extends ServiceProvider {
    public function register() {
        $app = $this->app->config->get( 'app' );

        $this->app->instance( 'uri', $app[ 'uri' ] );
        $this->app->instance( 'uri/relative', $app[ 'uri' ], PHP_URL_PATH );

        $this->app->instance( 'cache', new Collection() );

        $this->app->singleton( 'mix', function( $app ) {

            $file = "{$app->path}/public/mix-manifest.json";
        
            return file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : null;
        } );

		// Add template engine.
        $this->app->bind( View::class );
		$this->app->singleton( Engine::class );
    }
}