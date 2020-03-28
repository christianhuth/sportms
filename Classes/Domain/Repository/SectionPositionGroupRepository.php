<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SectionPositionGroupRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sectionPositionGroupUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionPositionGroupUids) {
				$constraints[] = $query->in('uid', explode(",", $sectionPositionGroupUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}