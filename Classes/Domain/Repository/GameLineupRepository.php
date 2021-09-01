<?php
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
    use TYPO3\CMS\Core\Database\ConnectionPool;
    use TYPO3\CMS\Core\Utility\GeneralUtility;

    class GameLineupRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'team' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'type' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sportPosition.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
        public function findAll(string $gameUids = null, string $gameLineupUids = null)
        {
            $query = $this->createQuery();
            $constraints = [];
            if ($gameUids) {
                $constraints[] = $query->in('game', explode(',', $gameUids));
            }
            if ($gameLineupUids) {
                $constraints[] = $query->in('uid', explode(',', $gameLineupUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd($constraints));
            }
            return $query->execute();
        }
        
        public function findPlayersWithMostGames(
            string $sportUids = null,
            string $sportAgeGroupUids = null,
            string $sportAgeLevelUids = null,
            string $sportPositionGroupUids = null,
            string $sportPositionUids = null,
            string $competitionTypeUids = null,
            string $competitionUids = null,
            string $clubUids = null,
            array $teamUids = null,
            string $seasonUids = null,
            int $limit = 10
        ) {
            $tableGameLineup = 'tx_sportms_domain_model_gamelineup';
            $tableGameLineupAlias = 'gamelineup';
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($tableGameLineup);
            $queryBuilder->SELECT($tableGameLineupAlias . '.*')
                ->addSelectLiteral('COUNT(' . $tableGameLineupAlias . '.' . $queryBuilder->quoteIdentifier('game') . ') AS ' . $queryBuilder->quoteIdentifier('numberOfGames'))
                ->addSelectLiteral('SUM(' . $tableGameLineupAlias . '.' . $queryBuilder->quoteIdentifier('type') . ') AS ' . $queryBuilder->quoteIdentifier('numberOfStartingFormation'))
                ->FROM($tableGameLineup, $tableGameLineupAlias)
                ->WHERE(
                    $queryBuilder->expr()->eq('type', $queryBuilder->createNamedParameter('start'))
                )
                ->GROUPBY($tableGameLineupAlias . '.person_profile')
                ->ORDERBY('numberOfGames', \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
                ->setMaxResults($limit);
            if($teamUids) {
                /*$gameDatabaseTable = 'tx_sportms_domain_model_game';
                $gameDatabaseTableAlias = 'game';
                $queryBuilder->join(
                    $tableGameLineupAlias,
                    $gameDatabaseTable,
                    $gameDatabaseTableAlias,
                    $queryBuilder->expr()->eq($tableGameLineupAlias . '.game', $queryBuilder->quoteIdentifier($gameDatabaseTableAlias . '.uid'))
                );
                $teamSeasonHomeDatabaseTable = 'tx_sportms_domain_model_teamseason';
                $teamSeasonHomeDatabaseTableAlias = 'team_season_home';
                $queryBuilder->join(
                    $gameDatabaseTableAlias,
                    $teamSeasonHomeDatabaseTable,
                    $teamSeasonHomeDatabaseTableAlias,
                    $queryBuilder->expr()->eq($gameDatabaseTableAlias . '.team_season_home', $queryBuilder->quoteIdentifier($teamSeasonHomeDatabaseTableAlias . '.uid'))
                );
                $teamHomeDatabaseTable = 'tx_sportms_domain_model_team';
                $teamHomeDatabaseTableAlias = 'team_home';
                $queryBuilder->join(
                    $teamSeasonHomeDatabaseTableAlias,
                    $teamHomeDatabaseTable,
                    $teamHomeDatabaseTableAlias,
                    $queryBuilder->expr()->eq($teamSeasonHomeDatabaseTableAlias . '.team', $queryBuilder->quoteIdentifier($teamHomeDatabaseTableAlias . '.uid'))
                );
                $teamSeasonGuestDatabaseTable = 'tx_sportms_domain_model_teamseason';
                $teamSeasonGuestDatabaseTableAlias = 'team_season_guest';
                $queryBuilder->join(
                    $gameDatabaseTableAlias,
                    $teamSeasonGuestDatabaseTable,
                    $teamSeasonGuestDatabaseTableAlias,
                    $queryBuilder->expr()->eq($gameDatabaseTableAlias . '.team_season_guest', $queryBuilder->quoteIdentifier($teamSeasonGuestDatabaseTableAlias . '.uid'))
                );
                $teamGuestDatabaseTable = 'tx_sportms_domain_model_team';
                $teamGuestDatabaseTableAlias = 'team_guest';
                $queryBuilder->join(
                    $teamSeasonGuestDatabaseTableAlias,
                    $teamGuestDatabaseTable,
                    $teamGuestDatabaseTableAlias,
                    $queryBuilder->expr()->eq($teamSeasonGuestDatabaseTableAlias . '.team', $queryBuilder->quoteIdentifier($teamGuestDatabaseTableAlias . '.uid'))
                );
                */
            }
            #debug($queryBuilder->getSQL());
            return $queryBuilder->execute()->fetchAll();
        }
        
    }