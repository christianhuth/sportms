<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	use TYPO3\CMS\Core\Utility\GeneralUtility;
	use TYPO3\CMS\Core\Database\ConnectionPool;
	use TYPO3\CMS\Extbase\Persistence\Repository;
	
	class ClubOfficialRepository extends Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'club_official_job' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
	
		public function findAll($clubs = null, $clubOfficialJobs = null) {
			$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_clubms_domain_model_clubofficial');
			$queryBuilder->select('*')->from('tx_clubms_domain_model_clubofficial');
			return $queryBuilder->execute();
		}
		
	}
	
?>