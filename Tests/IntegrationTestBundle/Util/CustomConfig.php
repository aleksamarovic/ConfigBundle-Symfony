<?php

use Craue\ConfigBundle\Tests\IntegrationTestBundle\Entity\CustomSetting;
use Craue\ConfigBundle\Util\Config;

class CustomConfig extends Config {

	/**
	 * @param string $name Name of the setting.
	 * @return CustomSetting The setting object.
	 * @throws \RuntimeException If the setting is not defined.
	 */
	public function getRawSetting($name) {
		$setting = $this->getRepo()->findOneBy(array(
			'name' => $name,
		));

		if ($setting === null) {
			throw $this->createNotFoundException($name);
		}

		return $setting;
	}

}
