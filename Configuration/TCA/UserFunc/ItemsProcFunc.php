<?php

	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;

	class ItemsProcFunc {

		/**
		 * @param array $config
		 * @return void
		 */
		public function team_season_squad_member_GameLineup(&$config) {

			// Get repository
			$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
			$teamRepository = $objectManager->get('Balumedien\\Clubms\\Domain\\Repository\\TeamRepository');

			#\TYPO3\CMS\Core\Utility\DebugUtility::debug($config, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			#\TYPO3\CMS\Core\Utility\DebugUtility::debug($teamSeasonSquadMemberRepository, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);

			#var_dump("TEST2");

			array_push($config['items'], ['Fussball','1']);

			// Get data from repository
			$myData = $teamRepository->findByUid(3);

			array_push($config['items'], ['myData', $myData]);

			if(is_null($myData)) {
				array_push($config['items'], ['empty','2']);
			} else {
				foreach ($myData as $data) {
					// push it into the config array
					array_push($config['items'], [$data['name'], $data['uid']]);
				}
			}



			array_push($config['items'], ['Fussball','3']);


		}

	}

?>