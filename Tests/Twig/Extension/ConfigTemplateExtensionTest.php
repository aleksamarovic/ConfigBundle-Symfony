<?php

use Craue\ConfigBundle\Twig\Extension\ConfigTemplateExtension;
use PHPUnit\Framework\TestCase;

class ConfigTemplateExtensionTest extends TestCase {

	public function testGetSetting() {
		$ext = new ConfigTemplateExtension();
		$config = $this->getMockBuilder('Craue\ConfigBundle\Util\Config')->getMock();

		$config->expects($this->once())
			->method('get')
			->with('name')
		;

		$ext->setConfig($config);

		$ext->getSetting('name');
	}

	public function testSortSections() {
		$ext = new ConfigTemplateExtension();
		$ext->setSectionOrder(array('section1', 'section2'));

		$this->assertEquals(array(null, 'section1', 'section2'), $ext->sortSections(array('section2', null, 'section1')));
	}

	/**
	 * Ensure that setting a section order is optional.
	 */
	public function testSortSections_sectionOrderNotSet() {
		$ext = new ConfigTemplateExtension();

		$this->assertEquals(array(null, 'section2', 'section1'), $ext->sortSections(array('section2', null, 'section1')));
	}

}
