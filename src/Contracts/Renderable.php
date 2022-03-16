<?php
/**
 * Renderable contract.
 *
 * Renderable classes should implement a `render()` method that returns an HTML
 * string ready for output to the screen. While there's no way to ensure this
 * via the contract, the intent here is for anything that's renderable to already
 * be escaped. For clarity in the code, when returning raw data, it is
 * recommended to use an alternate method name, such as `get()`, and not use
 * this contract.
 *
 * @package   Alembic
 * @author    Benjamin Lu <justintadlock@gmail.com>
 * @copyright Copyright (c) 2019 - 2022, Benjamin Lu
 * @link      https://github.com/benlumia007/alembic
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic\Contracts;

interface Renderable
{
	/**
	 * Returns an HTML string for output.
	 *
	 * @since 1.0.0
	 */
	public function render(): string;
}