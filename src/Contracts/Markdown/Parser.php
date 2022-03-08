<?php

namespace Benlumia007\Alembic\Contracts\Markdown;

interface Parser {

        public function convert( string $content );

        public function content();

        public function frontMatter();
}