<?php

use Craue\ConfigBundle\Entity\Setting;
use Craue\ConfigBundle\Tests\IntegrationTestCase;

class ConfigTemplateExtensionIntegrationTest extends IntegrationTestCase {

	/**
	 * @dataProvider dataSettingFunction
	 */
	public function testSettingFunction($platform, $config, $requiredExtension, $name, $value) {
		$this->initClient($requiredExtension, array('environment' => $platform, 'config' => $config));
		$this->persistSetting(Setting::create($name, $value));

		$this->assertSame($value, $this->getTwig()->render('@IntegrationTest/Settings/setting.html.twig', array(
			'name' => $name,
		)));
	}

	public function dataSettingFunction() {
		return self::duplicateTestDataForEachPlatform(array(
			array('name', 'value'),
		));
	}

}
