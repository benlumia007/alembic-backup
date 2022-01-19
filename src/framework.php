<?php
/**
 * Framework instance
 * 
 * This file is used to create a new framework instance and adds specific features to the theme.
 * 
 * @package   Luthemes
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2014-2022. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Create a new framework instance.
 */
$alembic = new Benlumia007\Alembic\Core\Framework();

$alembic->boot();

/**
 * Add default content types.
 */
Benlumia007\Alembic\ContentTypes::add( 'page', new Benlumia007\Alembic\Entry\Types\Page( $alembic->routes ) );
Benlumia007\Alembic\ContentTypes::registerRoutes();

// Launch the current controller.
$current = $alembic->routes->current();