<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubOfficialRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'club_official_job' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
	
	}
	
?>