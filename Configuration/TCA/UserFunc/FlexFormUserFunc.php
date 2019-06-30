<?php

	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;

	class FlexFormUserFunc {

		/**
		 * @param array $fConfig
		 * @return void
		 */
		public function section_Team(&$fConfig) {

			// Get repository
			$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
			$sectionRepository = $objectManager->get('Balumedien\Clubms\Domain\Repository\SectionRepository');

			// Get data from repository
			$myData = $sectionRepository->findAll();
			var_dump($myData);
			foreach ($myData as $data) {
				// push it into the config array
				array_push($fConfig['items'], array(
					$data['label'],
					$data['uid']
				));
			}

		}

	}

?>