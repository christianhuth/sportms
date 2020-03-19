<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll($clubUids = null, $sectionUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubUids) {
				$constraints[] = $query->in('club', explode(",", $clubUids));
			}
			if($sectionUids) {
				$constraints[] = $query->in('section', explode(",", $sectionUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findClubUidsByClubSections(array $clubSections) {
		
		}
		
	}
	
?>