<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubOfficialRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'club_official_job.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
	
	}
	
?>