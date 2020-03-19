<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends ClubMSBaseRepository {
		
		public function findAllByClubSections($clubSections) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubSections) {
				foreach($clubSections AS $clubSection) {
					$constraints[] = $query->equals('uid', $clubSection->getClub());
				}
			}
			if($constraints) {
				$query->matching($query->logicalOr($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>