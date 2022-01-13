<?php
/**
 * Home controller.
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Alembic\Entry\Controllers;
use Benlumia007\Alembic\Routing\Entry\Entries;
use Benlumia007\Alembic\Routing\Entry\Locator;

class Home {
	public function __invoke() {
		Benlumia007\Alembic\Engine::display( 'home', [], [ 'entries' => $this->entries() ] ); 
	}

	protected function entries() {

		$locator = new Locator();

		$entries = new Entries( $locator, [ 'slug' => '_index' ] );

		return $entries;
	}
}
