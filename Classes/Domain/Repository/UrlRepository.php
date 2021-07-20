<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class UrlRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'url' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
	}