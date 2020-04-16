<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class GameLineupRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'team' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'type' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sportPosition.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $gameUids = null, string $gameLineupUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($gameUids) {
				$constraints[] = $query->in('game', explode(',', $gameUids));
			}
			if($gameLineupUids) {
				$constraints[] = $query->in('uid', explode(',', $gameLineupUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findPlayersWithMostGames(string $sportUids = NULL, string $sportAgeGroupUids = NULL, string $sportAgeLevelUids = NULL, string $sportPositionGroupUids = NULL, string $sportPositionUids = NULL, string $competitionTypeUids = NULL, string $competitionUids = NULL, string $clubUids = NULL, string $teamUids = NULL, string $seasonUids = NULL, int $limit = 10) {
			$tableGameLineup = 'tx_sportms_domain_model_gamelineup';
			$tableGameLineupAlias = 'gamelineup';
			$tablePerson = 'tx_sportms_domain_model_person';
			$tablePersonAlias = 'person';
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGameLineup);
			$queryBuilder->SELECT('*')
							->addSelectLiteral('COUNT(' . $tableGameLineupAlias . '.' . $queryBuilder->quoteIdentifier('game') . ') AS ' . $queryBuilder->quoteIdentifier('numberOfGames'))
							->FROM($tableGameLineup, $tableGameLineupAlias)
							->INNERJOIN($tableGameLineupAlias, $tablePerson, $tablePersonAlias, $queryBuilder->expr()->eq($tableGameLineupAlias . '.person', $queryBuilder->quoteIdentifier($tablePersonAlias . '.uid')))
							->GROUPBY($tableGameLineupAlias . '.person')
							->ORDERBY('numberOfGames', \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
							->setMaxResults($limit);
			debug($queryBuilder->getSQL());
			return $queryBuilder->execute()->fetchAll();
		}
	
	}