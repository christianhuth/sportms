<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubOfficialRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
	}
	
?>