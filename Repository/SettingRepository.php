<?php

use Craue\ConfigBundle\Entity\SettingInterface;
use Doctrine\ORM\EntityRepository;

class SettingRepository extends EntityRepository {

	/**
	 * @param string[] $names
	 * @return SettingInterface[] Array of settings, indexed by name.
	 */
	public function findByNames(array $names) {
		return $this->getEntityManager()->createQueryBuilder()
			->select('s')
			->from($this->getEntityName(), 's', 's.name')
			->where('s.name IN (:names)')
			->getQuery()
			->execute(array('names' => $names))
		;
	}

}
