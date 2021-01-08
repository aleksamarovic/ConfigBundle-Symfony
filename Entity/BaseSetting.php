<?php

use Symfony\Component\Validator\Constraints as Assert;

abstract class BaseSetting implements SettingInterface {

	/**
	 * @var string
	 * @Assert\NotBlank
	 */
	protected $name;

	/**
	 * @var string|null
	 */
	protected $value;

	/**
	 * @var string|null
	 */
	protected $section;

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setValue($value) {
		$this->value = $value;
	}

	public function getValue() {
		return $this->value;
	}

	public function setSection($section) {
		$this->section = $section;
	}

	public function getSection() {
		return $this->section;
	}

	/**
	 * Creates a {@code SettingInterface}.
	 * @param string $name
	 * @param string|null $value
	 * @param string|null $section
	 * @return SettingInterface
	 */
	public static function create($name, $value = null, $section = null) {
		$setting = new static();
		$setting->setName($name);
		$setting->setValue($value);
		$setting->setSection($section);

		return $setting;
	}

}
