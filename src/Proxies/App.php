<?php
/**
 * App class.
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Alembic\Proxies;

/**
 * App static proxy class.
 *
 * @since  1.0.0
 * @access public
 */
class App extends Proxy {

	/**
	 * Returns the name of the accessor for object registered in the container.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return string
	 */
	protected static function accessor() {

		return 'app';
	}
}