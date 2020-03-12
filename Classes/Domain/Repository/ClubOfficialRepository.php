<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	use TYPO3\CMS\Core\Utility\GeneralUtility;
	use TYPO3\CMS\Core\Database\ConnectionPool;
	use TYPO3\CMS\Extbase\Persistence\Repository;
	
	class ClubOfficialRepository extends Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
	
		public function findAll($clubs = null, $clubOfficialJobs = null, $currentOfficialsOnly = false) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubs) {
				$constraints[] = $query->in('club', explode(",", $clubs));
			}
			if($clubOfficialJobs) {
				$constraints[] = $query->in('club_official_job', explode(",", $clubOfficialJobs));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>