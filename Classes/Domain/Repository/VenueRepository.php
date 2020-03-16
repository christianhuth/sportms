<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class VenueRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($clubsFilter = null, $withClubOnly = false) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubsFilter) {
				$constraints[] = $query->in('club', explode(",", $clubsFilter));
			}
			if($withClubOnly) {
				$constraints[] = $query->logicalNot($query->equals('club', NULL));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}