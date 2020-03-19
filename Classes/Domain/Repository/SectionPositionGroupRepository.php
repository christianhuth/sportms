<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionPositionGroupRepository extends ClubMSBaseRepository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
	
	}