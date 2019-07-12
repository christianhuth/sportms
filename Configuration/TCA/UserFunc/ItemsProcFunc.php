<?php

	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;

	class ItemsProcFunc {

		/**
		 * @param array $config
		 * @return void
		 */
		public function team_season_squad_member_GameLineup(&$config) {

			$databaseTable = "tx_clubms_domain_model_teamseasonsquadmember";
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($databaseTable);
			$data = $queryBuilder
					->select('*')
					->from($databaseTable)
					->execute()
					->fetchAll();

			foreach ($data as $ydata) {
				// push it into the config array
				array_push($config['items'], [$ydata['person'], $ydata['uid']]);
			}

		}

	}

?>