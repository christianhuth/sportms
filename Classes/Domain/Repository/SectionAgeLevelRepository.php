<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionAgeLevelRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
	
	}