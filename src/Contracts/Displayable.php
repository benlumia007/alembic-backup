<?php
/**
 * Displayable contract.
 *
 * Displayable classes should implement a `display()` method. The intent of this
 * method is to output an HTML string to the screen. This data should already be
 * escaped prior to being output.
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (c) 2019 - 2022, Benjamin Lu
 * @link      https://github.com/benlumia007/alembic
 * @license   https://opensource.org/licenses/MIT
 */

namespace Blush\Contracts;

interface Displayable
{
	/**
	 * Prints the HTML string.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function display();
}