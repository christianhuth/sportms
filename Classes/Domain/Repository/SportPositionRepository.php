<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SportPositionRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sportUids = null, string $sportPositionGroupUids = null, string $sportPositionUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('sportPositionGroup.sport', explode(',', $sportUids));
			}
			if($sportPositionGroupUids) {
				$constraints[] = $query->in('sportPositionGroup', explode(',', $sportPositionGroupUids));
			}
			if($sportPositionUids) {
				$constraints[] = $query->in('uid', explode(',', $sportPositionUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}