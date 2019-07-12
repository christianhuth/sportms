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

			$query = 'SELECT uid, person FROM tx_clubms_domain_model_teamseasonsquadmember';
			$result = mysqli_query($query);
			if(mysqli_num_rows($result)) {
				while($row = mysqli_fetch_assoc($result)) {
					array_push($config['items'], [$row['person'], $row['uid']]);
				}
			}

			array_push($config['items'], ['Fussball','1']);

			// Get data from repository
			$myData = $teamSeasonSquadMemberRepository->findAll();
			foreach ($myData as $data) {
				// push it into the config array
				array_push($config['items'], [$data['label'], $data['uid']]);
			}

			array_push($config['items'], ['Fussball','1']);


		}

	}

?>