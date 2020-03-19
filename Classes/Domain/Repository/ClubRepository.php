<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends ClubMSBaseRepository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
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