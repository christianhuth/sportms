<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		protected $defaultOrderings = [
			'section.label' => QueryInterface::ORDER_ASCENDING,
		];
	}
	
?>