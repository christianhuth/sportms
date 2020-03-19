<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class VenueRepository extends ClubMSBaseRepository {
		
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
				$constraints[] = $query->logicalNot($query->equals('club', 0));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}