<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class VenueRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll($venueUids = null, $clubUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($venueUids) {
				$constraints[] = $query->in('uid', explode(',', $venueUids));
			}
			if($clubUids) {
				$constraints[] = $query->in('club', explode(',', $clubUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}