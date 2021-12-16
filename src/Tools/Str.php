<?php
/**
 * Str
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Benlumia007\Alembic\Tools;

class Str {

	public static function slashBefore( $str ) {
		return '/' . ltrim( $str, '/ ');
	}

	public static function slashAfter( $str ) {
		return rtrim( $str, '/' ) . '/';
	} 

	public static function slashTrim( $str ) {
		return trim( $str, '/' );
	}

	public static function startsWith( $str, $starts ) {
		return substr( $str, 0, strlen( $starts ) ) === $starts;
	}
}