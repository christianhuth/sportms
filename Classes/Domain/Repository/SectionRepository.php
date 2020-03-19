<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
	}
	
?>