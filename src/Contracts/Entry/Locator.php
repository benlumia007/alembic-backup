<?php 

namespace Benlumia007\Alembic\Contracts\Entry;

interface Locator {
	public function path();

	public function contentType();

	public function all();
}