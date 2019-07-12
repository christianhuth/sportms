<?php

	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;

	class ItemsProcFunc {

		/**
		 * @param array $fConfig
		 * @return void
		 */
		public function section_Team(&$fConfig) {

			// Get repository
			$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
			$sectionRepository = $objectManager->get('Balumedien\Clubms\Domain\Repository\SectionRepository');

			\TYPO3\CMS\Core\Utility\DebugUtility::debug($fConfig, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);

			// Get data from repository
			$myData = $sectionRepository->findAll();
			foreach ($myData as $data) {
				// push it into the config array
				array_push($fConfig['items'], array(
					$data['label'],
					$data['uid']
				));
			}

			array_push($fConfig['items'], array(
				'Fussball',
				'1'
			));

		}

	}

?>