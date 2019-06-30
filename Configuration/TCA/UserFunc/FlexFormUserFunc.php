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
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($sectionRepository, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);

			$queryParser = $objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($sectionRepository->findAll())->getSQL());
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($sectionRepository->findAll())->getParameters());

			// Get data from repository
			$myData = $sectionRepository->findAll();
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($myData, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			foreach ($myData as $data) {
				// push it into the config array
				array_push($fConfig['section'], array(
					$data['label'],
					$data['uid']
				));
			}

		}

	}

?>