<?php
/**
 * Bootable interface.
 * 
 * The bootable classes should have a `boot()` method for 
 * booting actions and filters which should be kept out of the
 * constructor.
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Alembic\Contracts;

/**
 * Bootable interface.
 * 
 * @since  1.0.0
 * @access public
 */
interface Bootable {
    /**
	 * Boots the class by running `add_action()` and `add_filter()` calls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot();
}