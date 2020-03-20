<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class AddressRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = [
			'country' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'region' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'location' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'street' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
	}
	
?>