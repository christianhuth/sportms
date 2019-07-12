<?php

	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;

	class ItemsProcFunc {

		/**
		 * @param array $fConfig
		 * @return void
		 */
		public function team_season_squad_member_GameLineup(&$fConfig) {

			// Get repository
			$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
			$teamSeasonSquadMemberRepository = $objectManager->get('Balumedien\Clubms\Domain\Repository\TeamSeasonSquadMemberRepository');

			\TYPO3\CMS\Core\Utility\DebugUtility::debug($fConfig, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($teamSeasonSquadMemberRepository, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);

			// Get data from repository
			$myData = $teamSeasonSquadMemberRepository->findAll();
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