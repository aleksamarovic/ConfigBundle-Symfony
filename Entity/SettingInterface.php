<?php

interface SettingInterface {

	function setName($name);
	function getName();

	function setValue($value);
	function getValue();

	function setSection($section);
	function getSection();

}
