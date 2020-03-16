<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($clubsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubsFilter) {
				$constraints[] = $query->in('uid', explode(",", $clubsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>