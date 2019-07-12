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
			$queryBuilder
				->select('teamseasonsquadmember.uid', 'firstname', 'lastname')
				->from($databaseTable, "teamseasonsquadmember")
				->innerJoin(
					$databaseTable,
					"tx_clubms_domain_model_person",
					"person",
					$queryBuilder->expr()->eq('person.uid', $queryBuilder->quoteIdentifier($databaseTable . '.person'))
				);

			array_push($config['items'], [$queryBuilder->getSQL(), '0']);

			$result = $queryBuilder->execute()->fetchAll();

			foreach ($result as $row) {
				// push it into the config array
				array_push($config['items'], [$row['lastname'] . ", " . $row['firstname'], $row['uid']]);
			}

		}

	}

?>