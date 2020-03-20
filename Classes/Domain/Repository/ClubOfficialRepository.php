<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubOfficialRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
	
		public function findAll(string $clubs = null, string $clubOfficialJobs = null, bool $currentOfficialsOnly = false) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubs) {
				$constraints[] = $query->in('club', explode(",", $clubs));
			}
			if($clubOfficialJobs) {
				$constraints[] = $query->in('club_official_job', explode(",", $clubOfficialJobs));
			}
			if($currentOfficialsOnly) {
				$constraints[] = $query->equals('untilToday', true);
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>