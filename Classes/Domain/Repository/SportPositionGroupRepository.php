<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SportPositionGroupRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $sportUids = NULL, string $sportPositionGroupUids = NULL) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('sport', explode(',', $sportUids));
			}
			if($sportPositionGroupUids) {
				$constraints[] = $query->in('uid', explode(',', $sportPositionGroupUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}