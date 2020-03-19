<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class UrlRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'url' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
	
	}