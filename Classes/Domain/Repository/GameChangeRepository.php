<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	use TYPO3\CMS\Extbase\Persistence\QueryInterface;
	
	class GameChangeRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'period' => QueryInterface::ORDER_ASCENDING,
			'minute' => QueryInterface::ORDER_ASCENDING,
			'minute_additional' => QueryInterface::ORDER_ASCENDING,
		];
		
	}