<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class CompetitionTypeRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
	
	}