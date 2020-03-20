<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $clubUids = null, string $sectionUids = null) {
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
		
	}
	
?>