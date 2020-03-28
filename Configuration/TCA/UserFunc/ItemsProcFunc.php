<?php
	
	namespace Balumedien\Sportms\Configuration\TCA\UserFunc;
	
	class ItemsProcFunc {
		
		/**
		 * @param array $config
		 * @return void
		 */
		public function team_season_squad_member_GameLineup(&$config) {
			
			$game = $config['row']['game'][0];
			if($game != null) {
				$whichTeam = $config['row']['team'];
				$teamSeasonColumn = "team_season_home";
				if($whichTeam == "guest") {
					$teamSeasonColumn = "team_season_guest";
				}
				
				
				#$json_encoded_config = json_encode($config);
				#file_put_contents("/homepages/17/d76951472/htdocs/www/team_season_squad_member_GameLineup.log", $json_encoded_config);
				
				#$uid = $config['row']['uid'];
				#file_put_contents("/homepages/17/d76951472/htdocs/www/team_season_squad_member_GameLineup.log", $uid);
				
				$gameTable = "tx_sportms_domain_model_game";
				$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($gameTable);
				$queryBuilder	->select($gameTable . '.' . $teamSeasonColumn)
								->from($gameTable)
								->where($queryBuilder->expr()->eq($gameTable . '.uid', $game));
				$result = $queryBuilder->execute()->fetchAll();
				$teamSeasonId = $result[0][$teamSeasonColumn];
				
				$teamseasonsquadmemberTable = "tx_sportms_domain_model_teamseasonsquadmember";
				$personTable = "tx_sportms_domain_model_person";
				
				$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($teamseasonsquadmemberTable);
				$queryBuilder	->select($teamseasonsquadmemberTable . '.uid', $personTable . '.firstname', $personTable . '.lastname')
								->from($teamseasonsquadmemberTable)
								->innerJoin(
									$teamseasonsquadmemberTable,
									$personTable,
									$personTable,
									$queryBuilder->expr()->eq($personTable . '.uid', $queryBuilder->quoteIdentifier($teamseasonsquadmemberTable . '.person'))
								)
								->where($queryBuilder->expr()->eq($teamseasonsquadmemberTable . '.team_season', $teamSeasonId))
								->orderBy('lastname', 'ASC')
								->addOrderBy('firstname', 'ASC');
				
				// DEBUG GENERATED SQL
				#array_push($config['items'], [$queryBuilder->getSQL(), '0']);
				
				$result = $queryBuilder->execute()->fetchAll();
				
				foreach ($result as $row) {
					// push it into the config array
					array_push($config['items'], [$row['lastname'] . ", " . $row['firstname'], $row['uid']]);
				}
			}
		
		}
	
	}

?>