<?php

use Craue\ConfigBundle\CacheAdapter\CacheAdapterInterface;
use Craue\ConfigBundle\CacheAdapter\NullAdapter;
use PHPUnit\Framework\TestCase;

class NullAdapterTest extends TestCase {

	protected function getAdapter() {
		return new NullAdapter();
	}

	public function testClear() {
		$this->assertTrue($this->getAdapter()->clear());
	}

	public function testHas() {
		$this->assertFalse($this->getAdapter()->has('key'));
	}

	public function testGet() {
		$this->assertNull($this->getAdapter()->get('key'));
	}

	public function testSet() {
		$this->assertFalse($this->getAdapter()->set('key', 'value'));
	}

	public function testSetMultiple() {
		$this->assertFalse($this->getAdapter()->setMultiple(array()));
	}

}
