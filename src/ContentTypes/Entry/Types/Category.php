<?php

/**
 * Define namespace
 */
namespace Benlumia007\Alembic\Entry\Types;
use Benlumia007\Alembic\Controllers\Taxonomy as TaxonomyController;
use Benlumia007\Alembic\Routing\Routes;
use Benlumia007\Alembic\App;

/**
 * Category
 * 
 * @since  1.0.0
 * @access public
 */
class Category extends Type {
	/**
	 * Return Category
	 * 
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function name() {
		/**
		 * Return Category
		 */
		return 'category';
	}

	public function path() {
		/**
		 * Default path for categories
		 * 
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		return '_categories';
	}

	public function routes() {
		$this->router->get( '/category/{name}', TaxonomyController::class );
	}

	public function uri( $path = '' ) {
		$uri = App::resolve( 'uri/relative' ) . '/category';
		return $path ? "{$uri}/{$path}" : $uri;
	}




}
