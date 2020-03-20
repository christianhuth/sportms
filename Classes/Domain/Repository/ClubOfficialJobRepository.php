<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubOfficialJobRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $clubOfficialJobUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubOfficialJobUids) {
				$constraints[] = $query->in('uid', explode(",", $clubOfficialJobUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>