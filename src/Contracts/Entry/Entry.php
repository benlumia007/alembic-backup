<?php

namespace Benlumia007\Alembic\Contracts\Entry;

interface Entry {
	public function filename();

	public function type();

	public function meta();

	public function metaEntries();

	public function title();

	public function subtitle();

	public function date();

	public function author();

	public function authors();

	public function terms();

	public function content();

	public function uri();

	public function excerpt();
}