<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubSectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		protected $defaultOrderings = [
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		// repository wide settings
		public function initializeObject() {
			
			/** @var $defaultQuerySettings Tx_Extbase_Persistence_Typo3QuerySettings */
			$defaultQuerySettings = $this->objectManager->get('Tx_Extbase_Persistence_Typo3QuerySettings');
			// go for $defaultQuerySettings = $this->createQuery()->getQuerySettings(); if you want to make use of the TS persistence.storagePid with defaultQuerySettings(), see #51529 for details
			
			// don't add the pid constraint
			$defaultQuerySettings->setRespectStoragePage(FALSE);
			
			// don't add fields from enablecolumns constraint
			$defaultQuerySettings->setRespectEnableFields(FALSE);
			
			// don't add sys_language_uid constraint
			$defaultQuerySettings->setRespectSysLanguage(FALSE);
			
			$this->setDefaultQuerySettings($defaultQuerySettings);
		}
		
	}
	
?>