<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
		public function findAll($sectionsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionsFilter) {
				$constraints[] = $query->in('uid', explode(',', $sectionsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>