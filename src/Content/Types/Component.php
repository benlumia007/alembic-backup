<?php
/**
 * Content types component.
 *
 * @package   Blush
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018 - 2022, Justin Tadlock
 * @link      https://github.com/blush-dev/framework
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic\Content\Types;

use Benlumia007\Alembic\Contracts\Bootable;
use Benlumia007\Alembic\Tools\Collection;

class Component implements Bootable {

        protected $types;
        protected $config;

        public function __construct( Types $types, Collection $config ) {
                $this->types  = $types;
                $this->config = $config;
        }

        public function boot() {
                foreach ( $this->config as $type => $options ) {
                        $this->types->add( $type, $options );
                }
        }
}