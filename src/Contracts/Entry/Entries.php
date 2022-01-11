<?php 

namespace Benlumia007\Alembic\Contracts\Entry;

interface Entries {
	public function all();

	public function count();

	public function total();

	public function number();

	public function offset();
}