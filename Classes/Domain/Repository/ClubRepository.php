<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
	}
	
?>