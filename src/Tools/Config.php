<?php

namespace Benlumia007\Alembic\Tools;

use Benlumia007\Alembic\Tools\Collection;
use Symfony\Component\Yaml\Yaml;

class Config extends Collection {
    public function parseYamlFile( $filename ) {
        $config = Yaml::parseFile( $filename );

        if ( ! is_array( $config ) ) {
            return;
        }

        foreach ( $config as $key => $value ) {
            $this->add( $name, $value );
        }
    }
}