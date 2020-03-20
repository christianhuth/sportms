<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $sectionUids = null, string $clubUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionUids) {
				$constraints[] = $query->in('section', explode(",", $sectionUids));
			}
			if($clubUids) {
				$constraints[] = $query->in('club', explode(",", $clubUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>