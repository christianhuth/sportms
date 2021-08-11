<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
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
            string $teamUids = null,
            string $seasonUids = null,
            int $limit = 10
        ) {
            $tableGameLineup = 'tx_sportms_domain_model_gamelineup';
            $tableGameLineupAlias = 'gamelineup';
            $queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGameLineup);
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
            #debug($queryBuilder->getSQL());
            return $queryBuilder->execute()->fetchAll();
        }
        
    }