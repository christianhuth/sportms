<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
		public function findAll(string $sectionUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionUids) {
				$constraints[] = $query->in('uid', explode(",", $sectionUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>