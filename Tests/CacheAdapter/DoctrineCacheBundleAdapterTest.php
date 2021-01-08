<?php

use Craue\ConfigBundle\CacheAdapter\DoctrineCacheBundleAdapter;
use Doctrine\Common\Cache\ArrayCache;

class DoctrineCacheBundleAdapterTest extends BaseCacheAdapterTest {

	protected function getAdapter() {
		return new DoctrineCacheBundleAdapter(new ArrayCache());
	}

	public function testSetMultiple_fails() {
		if (method_exists('\Doctrine\Common\Cache\ArrayCache', 'saveMultiple')) {
			$this->markTestSkipped('DoctrineCacheBundle already supports `saveMultiple`.');
		}

		$providerMock = $this->getMockBuilder('\Doctrine\Common\Cache\ArrayCache')->getMock();

		$providerMock->expects($this->once())
			->method('save')
			->will($this->returnValue(false))
		;

		$adapter = new DoctrineCacheBundleAdapter($providerMock);

		$this->assertFalse($adapter->setMultiple(array('key' => 'value')));
	}

}
