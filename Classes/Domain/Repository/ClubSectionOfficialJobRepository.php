<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class ClubSectionOfficialJobRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
	}
	
	?>