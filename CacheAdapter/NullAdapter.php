<?php

namespace Craue\ConfigBundle\CacheAdapter;

class NullAdapter implements CacheAdapterInterface {

	public function clear() {
		return true;
	}

	public function has($key) {
		return false;
	}

	public function get($key) {
		return null;
	}

	public function set($key, $value) {
		return false;
	}

	public function setMultiple(array $keysAndValues) {
		return false;
	}

}
