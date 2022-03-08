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
namespace Benlumia007\Alembic\Tools;
use Benlumia007\Alembic\Tools\Collection;
use Symfony\Component\Yaml\Yaml;

class Config extends Collection {
    public function parseYamlFile( $filename ) {
        $config = Yaml::parseFile( $filename );

        if ( ! is_array( $config ) ) {
            return;
        }

        foreach ($config as $name => $value ) {
            $this->add( $name, $value );
        }
    }
}