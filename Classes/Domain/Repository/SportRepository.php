<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SportRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
		public function findAll(string $sportUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('uid', explode(",", $sportUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>