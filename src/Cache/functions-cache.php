<?php

function cache_get( $name, $path = '' ) {

	return cache( $name, $path )->get()->all();
}