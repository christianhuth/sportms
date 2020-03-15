<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
	}
	
?>