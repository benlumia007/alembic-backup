<?php
/**
 * 404 controller.
 *
 * @package   Blush
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018 - 2022, Justin Tadlock
 * @link      https://github.com/blush-dev/framework
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic\Controllers;

use Benlumia007\Alembic\Proxies\App;
use Benlumia007\Alembic\Content\Query;

class Error404 extends Controller {

	public function __invoke( array $params = [] ) {
		$this->params = $params;

		http_response_code( 404 );

		$entries = new Query( '_error', [ 'slug' => '404' ] );

		$all   = $entries->all();
		$entry = array_shift( $all );

		return $this->response(
			$this->view( ['404' ], [
				'title'   => $entry ? $entry->title() : 'Not Found',
				'query'   => $entry ? $entry : false,
				'page'    => 1,
				'entries' => $entries
			] )
		);
	}
}