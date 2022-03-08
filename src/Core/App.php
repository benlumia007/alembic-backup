<?php 

namespace Benlumia007\Alembic\Core;
use Benlumia007\Alembic\Tools\ServiceProvider;

class App extends ServiceProvider {
    public function register() {
        $app = $this->app->config->get( 'app' );
    }
}