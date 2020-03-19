<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionAgeGroupRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
	
	}