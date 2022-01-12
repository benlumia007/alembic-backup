<?php

namespace Benlumia007\Alembic\Controller;

abstract class Controller {
    protected $params = [];

    public function __invoke( array $params = [] ) {}

    public function entries() {}
}