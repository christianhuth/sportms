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

			array_push($config['items'], ['Fussball','1']);

			$databaseTable = "tx_clubms_domain_model_teamseasonsquadmember";

			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($databaseTable);
			$data = $queryBuilder
					->select('uid, person')
					->from($databaseTable)
					->execute()
					->fetchAll();

			array_push($config['items'], ['Fussball','1']);

			#array_push($config['items'], ['byTeamSeasonUid: ' . sizeof($byTeamSeasonUid), sizeof($byTeamSeasonUid)]);

			if(is_null($data)) {
				array_push($config['items'], ['null','2']);
			}

			if($data) {
				array_push($config['items'], [count($data), '2']);
				foreach ($data as $ydata) {
					// push it into the config array
					array_push($config['items'], ['Test', '5']);
				}
			} else {
				array_push($config['items'], ['empty','2']);
			}

			array_push($config['items'], ['Fussball','3']);


		}

	}

?>