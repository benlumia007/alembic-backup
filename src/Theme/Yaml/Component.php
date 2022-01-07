<?php
/**
 * Config
 *
 * @package   Alembic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright 2021. Benjamin Lu
 * @link      https://github.com/benlumia007/benjlu
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Define namespace
 */
namespace Benlumia007\Alembic\Theme\Yaml;
use Benlumia007\Alembic\Yaml;

class Component {
    private static $instance;
    private $data = [];
    public static function get_instance() {
        /**
         * Class Variable
         * 
         * @since  1.0.0
         * @access public
         */
        $class = __CLASS__;

        /**
         * Instance
         * 
         * @since  1.0.0
         * @access public
         */
        if ( ! self::$instance instanceof $class) {
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function get_data() {

        if ( empty($this->data) ) {

            $this->data = Yaml::parseFile( '_data/config.yml' );

        }
        return $this->data;
    }
}