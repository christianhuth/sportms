<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class VenueRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($venuesFilter = null, $clubsFilter = null, $withClubOnly = false) {
			$query = $this->createQuery();
			$constraints = [];
			if($venuesFilter) {
				$constraints[] = $query->in('uid', explode(',', $venuesFilter));
			}
			if($clubsFilter) {
				$constraints[] = $query->in('club', explode(',', $clubsFilter));
				$withClubOnly = true;
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