<?php

namespace Benlumia007\Alembic\ContentTypes\Entry\Types;

use Benlumia007\Alembic\ContentTypes\Controllers\Portfolio as PortfolioController;
use Benlumia007\Alembic\ContentTypes\Controllers\PortfolioArchives;
use Benlumia007\Alembic\App;

class Portfolio extends Type {

	public function name() {

		return 'portfolio';
	}

	public function path() {

		return '_portfolio';
	}

	public function routes() {

		$this->router->get( 'portfolio/{name}', PortfolioController::class );
		$this->router->get( 'portfolio', PortfolioArchives::class );
		$this->router->get( 'portfolio/page/{number}', PortfolioArchives::class, 'top' );
	}

	public function uri( $path = '' ) {

		$uri = App::resolve( 'uri/relative' ) . '/portfolio';

		return $path ? "{$uri}/{$path}" : $uri;
	}




}