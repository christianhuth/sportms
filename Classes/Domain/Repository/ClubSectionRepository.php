<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll($clubsFilter = null, $sectionsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubsFilter) {
				$constraints[] = $query->in('club', explode(",", $clubsFilter));
			}
			if($sectionsFilter) {
				$constraints[] = $query->in('section', explode(",", $sectionsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>