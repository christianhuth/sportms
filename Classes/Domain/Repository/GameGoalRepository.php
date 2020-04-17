<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class GameGoalRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'period' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'minute' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'minute_additional' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'goal_home' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'goal_guest' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		];
		
		public function findAll(string $gameUids = null, string $gameGoalUids = null, string $scorerUids = null, string $assistUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($gameUids) {
				$constraints[] = $this->constraintForGameUids($query, $gameUids);
			}
			if($gameGoalUids) {
				$constraints[] = $this->constraintForGameGoalUids($query, $gameGoalUids);
			}
			if($scorerUids) {
				$constraints[] = $this->constraintForScorerUids($query, $scorerUids);
			}
			if($assistUids) {
				$constraints[] = $this->constraintForAssistUids($query, $assistUids);
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findPlayersWithMostGoals(string $sportUids = NULL, string $sportAgeGroupUids = NULL, string $sportAgeLevelUids = NULL, string $sportPositionGroupUids = NULL, string $sportPositionUids = NULL, string $competitionTypeUids = NULL, string $competitionUids = NULL, string $clubUids = NULL, string $teamUids = NULL, string $seasonUids = NULL, int $limit = 10) {
			$tableGameGoal = 'tx_sportms_domain_model_gamegoal';
			$tableGameGoalAlias = 'gamegoal';
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGameGoal);
			$queryBuilder->SELECT($tableGameGoalAlias . '.*')
				->addSelectLiteral('COUNT(' . $tableGameGoalAlias . '.' . $queryBuilder->quoteIdentifier('game') . ') AS ' . $queryBuilder->quoteIdentifier('numberOfGoals'))
				->FROM($tableGameGoal, $tableGameGoalAlias)
				->GROUPBY($tableGameGoalAlias . '.scorer')
				->WHERE($queryBuilder->expr()->neq($tableGameGoalAlias . '.own_goal', 1))
				->WHERE($queryBuilder->expr()->isNotNull($tableGameGoalAlias . '.scorer'))
				->ORDERBY('numberOfGoals', \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
				->setMaxResults($limit);
			debug($queryBuilder->getSQL());
			return $queryBuilder->execute()->fetchAll();
		}
		
		public function findPlayersWithMostAssists(string $sportUids = NULL, string $sportAgeGroupUids = NULL, string $sportAgeLevelUids = NULL, string $sportPositionGroupUids = NULL, string $sportPositionUids = NULL, string $competitionTypeUids = NULL, string $competitionUids = NULL, string $clubUids = NULL, string $teamUids = NULL, string $seasonUids = NULL, int $limit = 10) {
			$tableGameGoal = 'tx_sportms_domain_model_gamegoal';
			$tableGameGoalAlias = 'gamegoal';
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGameGoal);
			$queryBuilder->SELECT($tableGameGoalAlias . '.*')
				->addSelectLiteral('COUNT(' . $tableGameGoalAlias . '.' . $queryBuilder->quoteIdentifier('game') . ') AS ' . $queryBuilder->quoteIdentifier('numberOfAssists'))
				->FROM($tableGameGoal, $tableGameGoalAlias)
				->GROUPBY($tableGameGoalAlias . '.assist')
				->WHERE($queryBuilder->expr()->isNotNull($tableGameGoalAlias . '.assist'))
				->ORDERBY('numberOfAssists', \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
				->setMaxResults($limit);
			debug($queryBuilder->getSQL());
			return $queryBuilder->execute()->fetchAll();
		}
		
		private function constraintForGameUids(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, string $gameUids) {
			return $query->in('game', explode(',', $gameUids));
		}
		
		private function constraintForGameGoalUids(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, string $gameGoalUids) {
			return $query->in('uid', explode(',', $gameGoalUids));
		}
		
		private function constraintForScorerUids(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, string $scorerUids) {
			return $query->in('scorer', explode(',', $scorerUids));
		}
		
		private function constraintForAssistUids(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, string $assistUids) {
			return $query->in('assist', explode(',', $assistUids));
		}
	
	}