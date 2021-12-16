<?php

namespace Benlumia007\Alembic\Routing\Http;

use Benlumia007\Alembic\Proxies\App;

class Component {

	public function uri() {
		$script_name = $_SERVER['SCRIPT_NAME'];
		$request_uri = $_SERVER['REQUEST_URI'];

		$basepath = implode( '/', array_slice( explode( '/', $script_name ), 0, -1 ) ) . '/';

		$uri = substr( $request_uri, strlen( $basepath ) );

		if ( strstr( $uri, '?' ) ) {
			$uri = substr( $uri, 0, strpos( $uri, '?' ) );
		}

		$uri = \Benlumia007\Alembic\Tools\Str::slashBefore( $uri );

		$uri = preg_replace( '/[^A-Za-z0-9\/_-]/i', '', $uri );

		return $uri;
	}
}