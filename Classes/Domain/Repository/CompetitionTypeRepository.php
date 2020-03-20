<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class CompetitionTypeRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $competitionTypeUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($competitionTypeUids) {
				$constraints[] = $query->in('uid', explode(',', $competitionTypeUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}