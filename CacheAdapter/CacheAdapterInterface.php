<?php

namespace Craue\ConfigBundle\CacheAdapter;

interface CacheAdapterInterface {

	/**
	 * Deletes all cache entries.
	 * @return bool Whether the operation was successful.
	 */
	function clear();

	/**
	 * @param string $key
	 * @return bool
	 */
	function has($key);

	/**
	 * @param string $key
	 * @return mixed
	 */
	function get($key);

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return bool Whether the entry was successfully stored in the cache.
	 */
	function set($key, $value);

	/**
	 * @param array $keysAndValues
	 * @return bool Whether the entries were successfully stored in the cache.
	 */
	function setMultiple(array $keysAndValues);

}
