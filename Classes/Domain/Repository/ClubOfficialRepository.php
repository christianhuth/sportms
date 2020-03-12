<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	use TYPO3\CMS\Core\Utility\GeneralUtility;
	use TYPO3\CMS\Core\Database\ConnectionPool;
	use TYPO3\CMS\Extbase\Persistence\Repository;
	
	class ClubOfficialRepository extends Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'clubOfficialJob.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
	
		public function findAll($clubs = null, $clubOfficialJobs = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubs) {
				$constraints[] = $query->equals('club', $clubs);
			}
			if($clubOfficialJobs) {
				$constraints[] = $query->equals('club_official_job', $clubOfficialJobs);
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>