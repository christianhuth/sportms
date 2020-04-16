<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class GameRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sport.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.sportAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.sportAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'season.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'gameday' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'teamSeasonHome.team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'teamSeasonGuest.team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sportUids = NULL, string $sportAgeGroupUids = NULL, string $sportAgeLevelUids = NULL, string $competitionTypeUids = NULL, string $competitionUids = NULL, string $clubUids = NULL, string $teamUids = NULL, string $seasonUids = NULL, string $competitionSeasonGamedayUids = NULL) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $this->constraintForSportUids($query, $sportUids);
			}
			if($sportAgeGroupUids) {
				$constraints[] = $this->constraintForSportAgeGroupUids($query, $sportAgeGroupUids);
			}
			if($sportAgeLevelUids) {
				$constraints[] = $this->constraintForSportAgeLevelUids($query, $sportAgeLevelUids);
			}
			if($competitionTypeUids) {
				$constraints[] = $this->constraintForCompetitionTypeUids($query, $competitionTypeUids);
			}
			if($competitionUids) {
				$constraints[] = $this->constraintForCompetitionUids($query, $competitionUids);
			}
			if($clubUids) {
				$constraints[] = $this->constraintForClubUids($query, $clubUids);
			}
			if($teamUids) {
				$constraints[] = $this->constraintForTeamUids($query, $teamUids);
			}
			if($seasonUids) {
				$constraints[] = $this->constraintForSeasonUids($query, $seasonUids);
			}
			if($competitionSeasonGamedayUids) {
				$constraints[] = $this->constraintForCompetitionSeasonGamedayUids($query, $competitionSeasonGamedayUids);
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findGamesWithHighestWinsForTeam(int $teamUid) {
			$query = $this->createQuery();
			$constraints = [];
			$constraints[] = $this->constraintForTeamUids($query, (string) $teamUid);
			$query->matching($query->logicalAnd($constraints));
			$query->setLimit(10);
			$query->setOrderings(['spectators' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);
			return $query->execute();
		}
		
		public function findGamesWithHighestLostsForTeam(int $teamUid) {
			$query = $this->createQuery();
			$constraints = [];
			$constraints[] = $this->constraintForTeamUids($query, (string) $teamUid);
			$query->matching($query->logicalAnd($constraints));
			$query->setLimit(10);
			return $query->execute();
		}
		
		public function findGamesWithMostGoalsForTeam(int $teamUid) {
			$tableGame = 'tx_sportms_domain_model_game';
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGame);
			$queryBuilder->SELECT('uid')
							->addSelectLiteral($queryBuilder->quoteIdentifier('result_end_regular_home') . '+' . $queryBuilder->quoteIdentifier('result_end_regular_guest') .' AS ' . $queryBuilder->quoteIdentifier('goals'))
							->FROM($tableGame)
							->ORDERBY('goals')
							->setMaxResults(10);
			debug($queryBuilder->getSQL());
			$gameUids = implode(',', array_column($queryBuilder->execute()->fetchAll(), 'uid'));
			debug($gameUids);
			return $this->findByUidList($gameUids);
		}
		
		// The use statements for the fileheader
		use Balumedien\Sportms\Domain\Model\Game;
		use TYPO3\CMS\Core\Database\ConnectionPool;
		use TYPO3\CMS\Core\Database\Query\QueryBuilder;
		use TYPO3\CMS\Core\Utility\GeneralUtility;
		use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
		
		/**
		 * Returns all matching records for the given list of uids and applies the uidList sorting for the result
		 *
		 * @param string $uidList
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 */
		public function findByUidList($uidList) {
			$uids = GeneralUtility::intExplode(',', $uidList, true);
			if ($uidList === '' || count($uids) === 0) {
				return [];
			}
			
			$dataMapper = GeneralUtility::makeInstance(DataMapper::class);
			
			/** @var QueryBuilder $queryBuilder */
			$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_sportms_domain_model_game');
			
			$rows = $queryBuilder
				->select('*')
				->from('tx_sportms_domain_model_game')
				->where($queryBuilder->expr()->in('uid', $uids))
				->add('orderBy', 'FIELD(tx_sportms_domain_model_game.uid,' . implode(',', $uids) . ')')
				->execute()
				->fetchAll();
			
			return $dataMapper->map(Mymodel::class, $rows);
		}
		
		public function findGamesWithMostSpectatorsForTeam(int $teamUid) {
			return $this->findRecordGamesBySpectatorsForTeam($teamUid, \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING);
		}
		
		public function findGamesWithFewestSpectatorsForTeam(int $teamUid) {
			return $this->findRecordGamesBySpectatorsForTeam($teamUid, \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
		}
		
		public function findRecordGamesBySpectatorsForTeam(int $teamUid, string $ordering) {
			$query = $this->createQuery();
			$constraints = [];
			$constraints[] = $this->constraintForTeamUids($query, (string) $teamUid);
			$constraints[] = $query->greaterThanOrEqual('spectators', 0);
			$query->matching($query->logicalAnd($constraints));
			$query->setLimit(10);
			$query->setOrderings(['spectators' => $ordering]);
			return $query->execute();
		}
		
		private function constraintForClubUids($query, string $clubUids) {
			return $query->logicalOr($query->in('teamSeasonHome.team.club', explode(',', $clubUids)), $query->in('teamSeasonGuest.team.club', explode(',', $clubUids)));
		}
		
		private function constraintForCompetitionUids($query, string $competitionUids) {
			return $query->in('competitionSeason.competition', explode(',', $competitionUids));
		}
		
		private function constraintForCompetitionSeasonGamedayUids($query, string $competitionSeasonGamedayUids) {
			return $query->in('gameday', explode(',', $competitionSeasonGamedayUids));
		}
		
		private function constraintForCompetitionTypeUids($query, string $competitionTypeUids) {
			return $query->in('competitionSeason.competition.competitionType', explode(',', $competitionTypeUids));
		}
		
		private function constraintForSeasonUids($query, string $seasonUids) {
			return $query->in('season', explode(',', $seasonUids));
		}
		
		private function constraintForSportUids($query, string $sportUids) {
			return $query->in('competitionSeason.competition.sport', explode(',', $sportUids));
		}
		
		private function constraintForSportAgeGroupUids($query, string $sportAgeGroupUids) {
			return $query->in('competitionSeason.competition.sportAgeGroup', explode(',', $sportAgeGroupUids));
		}
		
		private function constraintForSportAgeLevelUids($query, string $sportAgeLevelUids) {
			return $query->in('competitionSeason.competition.sportAgeLevel', explode(',', $sportAgeLevelUids));
		}
		
		private function constraintForTeamUids($query, string $teamUids) {
			return $query->logicalOr($query->in('teamSeasonHome.team', explode(',', $teamUids)), $query->in('teamSeasonGuest.team', explode(',', $teamUids)));
		}
		
	}