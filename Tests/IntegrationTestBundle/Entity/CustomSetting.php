<?php

use Craue\ConfigBundle\Entity\BaseSetting;

class CustomSetting extends BaseSetting {

	/**
	 * @var string|null
	 */
	protected $comment;

	public function setComment($comment) {
		$this->comment = $comment;
	}

	public function getComment() {
		return $this->comment;
	}

	/**
	 * Creates a {@code CustomSetting}.
	 * @param string $name
	 * @param string|null $value
	 * @param string|null $section
	 * @param string|null $comment
	 * @return CustomSetting
	 */
	public static function create($name, $value = null, $section = null, $comment = null) {
		$setting = parent::create($name, $value, $section);
		$setting->setComment($comment);

		return $setting;
	}

}
