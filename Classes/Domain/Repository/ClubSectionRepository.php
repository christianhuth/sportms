<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		protected $defaultOrderings = [
			'sorting' => QueryInterface::ORDER_ASCENDING,
		];
	}
	
?>