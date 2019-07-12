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

			// Get data from repository
			$byUid = $teamSeasonSquadMemberRepository->findByUid(3);

			if($byUid) {
				// push it into the config array
				array_push($config['items'], [$byUid->getPerson()->getLastname(), $byUid->getUid()]);
			}

			array_push($config['items'], ['Fussball','1']);
			$byTeamSeasonUid = $teamSeasonSquadMemberRepository->findByTeamSeasonUid(1);
			array_push($config['items'], ['Fussball','1']);

			array_push($config['items'], ['byTeamSeasonUid: ' . sizeof($byTeamSeasonUid), sizeof($byTeamSeasonUid)]);

			if(is_null($byTeamSeasonUid)) {
				array_push($config['items'], ['null','2']);
			}

			if($byTeamSeasonUid) {
				foreach ($byTeamSeasonUid as $data) {
					// push it into the config array
					array_push($config['items'], [$data->getName(), $data->getUid()]);
				}
			} else {
				array_push($config['items'], ['empty','2']);
			}

			array_push($config['items'], ['Fussball','3']);


		}

	}

?>