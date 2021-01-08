<?php

use Craue\ConfigBundle\Entity\Setting;
use Craue\ConfigBundle\Tests\IntegrationTestCase;

class SettingRepositoryTest extends IntegrationTestCase {

	/**
	 * @dataProvider getPlatformConfigs
	 */
	public function testFindByNames($platform, $config, $requiredExtension) {
		$this->initClient($requiredExtension, array('environment' => $platform, 'config' => $config));

		$setting1 = $this->persistSetting(Setting::create('name1'));
		$setting2 = $this->persistSetting(Setting::create('name2'));

		$repo = $this->getSettingsRepo();

		$expectedResult = array(
			'name1' => $setting1,
			'name2' => $setting2,
		);

		$this->assertEquals($expectedResult, $repo->findByNames(array_keys($expectedResult)));
	}

}
