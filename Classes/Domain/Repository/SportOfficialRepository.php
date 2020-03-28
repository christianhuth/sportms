<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SportOfficialRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
	}
	
?>