<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SportPositionGroupRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sportPositionGroupUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportPositionGroupUids) {
				$constraints[] = $query->in('uid', explode(",", $sportPositionGroupUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}