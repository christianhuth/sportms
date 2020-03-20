<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionOfficialJobRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
	}
	
?>