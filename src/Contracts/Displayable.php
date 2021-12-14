<?php
/**
 * Displayable contract.
 * 
 * Displayable classes should be implemented by a `display()` method.
 * This method should output HTML strings to the screen.
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Alembic\Contracts;

/**
 * Displayable interface
 * 
 * @since  1.0.0
 * @access public
 */
interface Displayable {
    /**
	 * Prints the HTML string.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function display();
}