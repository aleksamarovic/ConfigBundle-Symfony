<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ModifySettingsForm extends AbstractType {

	/**
	 * {@inheritDoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$useFqcn = method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix');

		$builder->add('settings', $useFqcn ? 'Symfony\Component\Form\Extension\Core\Type\CollectionType' : 'collection', array(
			$useFqcn ? 'entry_type' : 'type' => $useFqcn ? 'Craue\ConfigBundle\Form\Type\SettingType' : 'craue_config_setting',
		));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return $this->getBlockPrefix();
	}

	/**
	 * {@inheritDoc}
	 */
	public function getBlockPrefix() {
		return 'craue_config_modifySettings';
	}

}
