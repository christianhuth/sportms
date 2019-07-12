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
			$teamSeasonSquadMemberRepository = $objectManager->get('Balumedien\\Clubms\\Domain\\Repository\\TeamSeasonSquadMemberRepository');

			#\TYPO3\CMS\Core\Utility\DebugUtility::debug($config, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			#\TYPO3\CMS\Core\Utility\DebugUtility::debug($teamSeasonSquadMemberRepository, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);

			#var_dump("TEST2");


			array_push($config['items'], ['Fussball','1']);

			// Get data from repository
			$myData = $teamSeasonSquadMemberRepository->findAll();

			array_push($config['items'], print_r($myData));
			foreach ($myData as $data) {
				// push it into the config array
				array_push($config['items'], [$data['label'], $data['uid']]);
			}

			array_push($config['items'], ['Fussball','1']);


		}

	}

?>