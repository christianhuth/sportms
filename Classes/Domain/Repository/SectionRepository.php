<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionRepository extends ClubMSBaseRepository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
		public function findAll($sectionsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionsFilter) {
				$constraints[] = $query->in('uid', explode(',', $sectionsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findAllByClubSections($clubSections) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubSections) {
				foreach($clubSections AS $clubSection) {
					$constraints[] = $query->equals('uid', $clubSection->getSection());
				}
			}
			if($constraints) {
				$query->matching($query->logicalOr($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>