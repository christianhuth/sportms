<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class ClubSectionRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $sportUids = null, string $clubUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('sports', explode(",", $sportUids));
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