<?php

	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;

	class ItemsProcFunc {

		/**
		 * @param array $config
		 * @return void
		 */
		public function team_season_squad_member_GameLineup(&$config) {

			$teamSeason = &$config['config']['foreign_table_where'];

			$databaseTable = "tx_clubms_domain_model_teamseasonsquadmember";
			$joinTable = "tx_clubms_domain_model_person";
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($databaseTable);
			$queryBuilder
				->select($databaseTable . '.uid', $joinTable . '.firstname', $joinTable . '.lastname')
				->from($databaseTable)
				->innerJoin(
					$databaseTable,
					$joinTable,
					$joinTable,
					$queryBuilder->expr()->eq($joinTable . '.uid', $queryBuilder->quoteIdentifier($databaseTable . '.person'))
				)
				->where($queryBuilder->expr()->eq($databaseTable . '.team_season', $teamSeason))
                ->orderBy('lastname', 'ASC')
                ->addOrderBy('firstname', 'ASC');

			#array_push($config['items'], [$queryBuilder->getSQL(), '0']);

			$result = $queryBuilder
						->execute()
						->fetchAll();

			foreach ($result as $row) {
				// push it into the config array
				array_push($config['items'], [$row['lastname'] . ", " . $row['firstname'], $row['uid']]);
			}

		}

	}

?>