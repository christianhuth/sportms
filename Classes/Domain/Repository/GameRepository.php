<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeason;
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeasonGameday;
    use ChristianKnell\Sportms\Domain\Model\TeamSeason;
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;

    class GameRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'season.label' => QueryInterface::ORDER_DESCENDING,
            'competitionSeason.competition.label' => QueryInterface::ORDER_ASCENDING,
            'date' => QueryInterface::ORDER_ASCENDING,
            'time' => QueryInterface::ORDER_ASCENDING,
            'teamSeasonHome.team.label' => QueryInterface::ORDER_ASCENDING,
        ];
        
        public function findAll(
            string $sportUids = null,
            string $sportAgeGroupUids = null,
            string $sportAgeLevelUids = null,
            string $competitionTypeUids = null,
            string $competitionUids = null,
            string $clubUids = null,
            string $teamUids = null,
            string $seasonUids = null,
            string $competitionSeasonGamedayUids = null,
            $onlyGamesBetweenTeams = false,
            array $orderings = null
        ) {
            $query = $this->createQuery();
            $this->addOrderingsToQuery($query, $orderings);
            $constraints = [];
            if ($sportUids) {
                $constraints[] = $this->constraintForSportUids($query, $sportUids);
            }
            if ($sportAgeGroupUids) {
                $constraints[] = $this->constraintForSportAgeGroupUids($query, $sportAgeGroupUids);
            }
            if ($sportAgeLevelUids) {
                $constraints[] = $this->constraintForSportAgeLevelUids($query, $sportAgeLevelUids);
            }
            if ($competitionTypeUids) {
                $constraints[] = $this->constraintForCompetitionTypeUids($query, $competitionTypeUids);
            }
            if ($competitionUids) {
                $constraints[] = $this->constraintForCompetitionUids($query, $competitionUids);
            }
            if ($clubUids) {
                $constraints[] = $this->constraintForClubUids($query, $clubUids);
            }
            if ($teamUids) {
                $constraints[] = $this->constraintForTeamUids($query, $teamUids, $onlyGamesBetweenTeams);
            }
            if ($seasonUids) {
                $constraints[] = $this->constraintForSeasonUids($query, $seasonUids);
            }
            if ($competitionSeasonGamedayUids) {
                $constraints[] = $this->constraintForCompetitionSeasonGamedayUids($query,
                    $competitionSeasonGamedayUids);
            }
            if ($constraints) {
                $query->matching($query->logicalAnd(...$constraints));
            }
            return $query->execute();
        }
        
        private function constraintForSportUids(QueryInterface $query, string $sportUids)
        {
            return $query->in('competitionSeason.competition.sport', explode(',', $sportUids));
        }
        
        private function constraintForSportAgeGroupUids(QueryInterface $query, string $sportAgeGroupUids)
        {
            return $query->in('competitionSeason.competition.sportAgeGroup', explode(',', $sportAgeGroupUids));
        }
        
        private function constraintForSportAgeLevelUids(QueryInterface $query, string $sportAgeLevelUids)
        {
            return $query->in('competitionSeason.competition.sportAgeLevel', explode(',', $sportAgeLevelUids));
        }
        
        private function constraintForCompetitionTypeUids(QueryInterface $query, string $competitionTypeUids)
        {
            return $query->in('competitionSeason.competition.competitionType', explode(',', $competitionTypeUids));
        }
        
        private function constraintForCompetitionUids(QueryInterface $query, string $competitionUids)
        {
            return $query->in('competitionSeason.competition', explode(',', $competitionUids));
        }
        
        private function constraintForClubUids(QueryInterface $query, string $clubUids)
        {
            return $query->logicalOr($query->in('teamSeasonHome.team.club', explode(',', $clubUids)),
                $query->in('teamSeasonGuest.team.club', explode(',', $clubUids)));
        }
        
        private function constraintForTeamUids(
            QueryInterface $query,
            string $teamUids,
            bool $onlyGamesBetweenTeams = false
        ) {
            if ($onlyGamesBetweenTeams === true) {
                return $query->logicalAnd($query->in('teamSeasonHome.team', explode(',', $teamUids)),
                    $query->in('teamSeasonGuest.team', explode(',', $teamUids)));
            } else {
                return $query->logicalOr($query->in('teamSeasonHome.team', explode(',', $teamUids)),
                    $query->in('teamSeasonGuest.team', explode(',', $teamUids)));
            }
        }
        
        private function constraintForSeasonUids(QueryInterface $query, string $seasonUids)
        {
            return $query->in('season', explode(',', $seasonUids));
        }
        
        private function constraintForCompetitionSeasonGamedayUids(
            QueryInterface $query,
            string $competitionSeasonGamedayUids
        ) {
            return $query->in('gameday', explode(',', $competitionSeasonGamedayUids));
        }
        
        /**
         * @param CompetitionSeason $competitionSeason
         * @param CompetitionSeasonGameday|null $competitionSeasonGameday
         */
        public function findGamesbyCompetitionSeason(
            CompetitionSeason $competitionSeason,
            CompetitionSeasonGameday $competitionSeasonGameday = null
        ) {
            $query = $this->createQuery();
            $constraints = [];
            $constraints[] = $this->constraintForCompetitionSeasonUids($query, (string)$competitionSeason->getUid());
            if ($competitionSeasonGameday) {
                $constraints[] = $this->constraintForCompetitionSeasonGamedayUids($query,
                    (string)$competitionSeasonGameday->getUid());
            }
            $query->matching($query->logicalAnd(...$constraints));
            return $query->execute();
        }
        
        private function constraintForCompetitionSeasonUids(QueryInterface $query, string $competitionSeasonUids)
        {
            return $query->in('competitionSeason', explode(',', $competitionSeasonUids));
        }
        
        /**
         * @param TeamSeason $teamSeason
         */
        public function findGamesByTeamSeason(TeamSeason $teamSeason, array $orderings = null)
        {
            $query = $this->createQuery();
            $this->addOrderingsToQuery($query, $orderings);
            $constraints = [];
            $constraints[] = $this->constraintForTeamSeasonUids($query, (string)$teamSeason->getUid());
            $query->matching($query->logicalAnd(...$constraints));
            return $query->execute();
        }
        
        private function constraintForTeamSeasonUids(
            QueryInterface $query,
            string $teamSeasonUids,
            bool $onlyGamesBetweenTeams = false
        ) {
            if ($onlyGamesBetweenTeams === true) {
                return $query->logicalAnd($query->in('teamSeasonHome', explode(',', $teamSeasonUids)),
                    $query->in('teamSeasonGuest', explode(',', $teamSeasonUids)));
            } else {
                return $query->logicalOr($query->in('teamSeasonHome', explode(',', $teamSeasonUids)),
                    $query->in('teamSeasonGuest', explode(',', $teamSeasonUids)));
            }
        }
        
        public function findGamesWithHighestWinsForTeam(
            int $teamUid,
            int $limit = 5,
            string $competitionUids = null,
            string $seasonUids = null
        ) {
            $tableGame = 'tx_sportms_domain_model_game';
            $tableGameAlias = 'game';
            $tableCompetitionSeason = 'tx_sportms_domain_model_competitionseason';
            $tableCompetitionSeasonAlias = 'competitionseason';
            $tableTeamSeason = 'tx_sportms_domain_model_teamseason';
            $tableTeamSeasonAliasHome = 'teamseasonhome';
            $tableTeamSeasonAliasGuest = 'teamseasonguest';
            $queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGame);
            $queryBuilder->SELECT($tableGameAlias . '.*')
                ->addSelectLiteral('ABS(' . $queryBuilder->quoteIdentifier('result_end_regular_home') . '-' . $queryBuilder->quoteIdentifier('result_end_regular_guest') . ') AS ' . $queryBuilder->quoteIdentifier('difference'))
                ->FROM($tableGame, $tableGameAlias)
                ->INNERJOIN($tableGameAlias, $tableTeamSeason, $tableTeamSeasonAliasHome,
                    $queryBuilder->expr()->eq($tableGameAlias . '.team_season_home',
                        $queryBuilder->quoteIdentifier($tableTeamSeasonAliasHome . '.uid')))
                ->INNERJOIN($tableGameAlias, $tableTeamSeason, $tableTeamSeasonAliasGuest,
                    $queryBuilder->expr()->eq($tableGameAlias . '.team_season_guest',
                        $queryBuilder->quoteIdentifier($tableTeamSeasonAliasGuest . '.uid')));
            if ($competitionUids) {
                $queryBuilder->INNERJOIN($tableGameAlias, $tableCompetitionSeason, $tableCompetitionSeasonAlias,
                    $queryBuilder->expr()->eq($tableGameAlias . '.competition_season',
                        $queryBuilder->quoteIdentifier($tableCompetitionSeasonAlias . '.uid')));
            }
            $queryBuilder->WHERE(
                $queryBuilder->expr()->eq('game_appointment', 6),               # Spiel ist beendet
                $queryBuilder->expr()->eq('game_rating', 1),                    # Normale Wertung
                $queryBuilder->expr()->andX(
                    $queryBuilder->expr()->isNotNull('result_end_regular_home'),
                    $queryBuilder->expr()->isNotNull('result_end_regular_guest')
                ),
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->andX(
                        $queryBuilder->expr()->eq($tableTeamSeasonAliasHome . '.team', $teamUid),
                        $queryBuilder->expr()->gt('result_end_regular_home', 'result_end_regular_guest')
                    ),
                    $queryBuilder->expr()->andX(
                        $queryBuilder->expr()->eq($tableTeamSeasonAliasGuest . '.team', $teamUid),
                        $queryBuilder->expr()->gt('result_end_regular_guest', 'result_end_regular_home')
                    )
                )
            );
            if ($competitionUids) {
                $queryBuilder->andWhere($queryBuilder->expr()->in($tableCompetitionSeasonAlias . '.competition',
                    explode(',', $competitionUids)));
            }
            if ($seasonUids) {
                $queryBuilder->andWhere($queryBuilder->expr()->in($tableGameAlias . '.season',
                    explode(',', $seasonUids)));
            }
            $queryBuilder->GROUPBY($tableGameAlias . '.uid')
                ->ORDERBY('difference', QueryInterface::ORDER_DESCENDING)
                ->add('orderBy', 'GREATEST(result_end_regular_home, result_end_regular_guest) DESC', true)
                ->ADDORDERBY('result_end_regular_home',
                    QueryInterface::ORDER_ASCENDING)    # a high win away is more powerful than at home
                ->setMaxResults($limit);
            $dataMapper = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper::class);
            return $dataMapper->map($this->objectType, $queryBuilder->execute()->fetchAll());
        }
        
        public function findGamesWithHighestLostsForTeam(
            int $teamUid,
            int $limit = 5,
            string $competitionUids = null,
            string $seasonUids = null
        ) {
            $tableGame = 'tx_sportms_domain_model_game';
            $tableGameAlias = 'game';
            $tableCompetitionSeason = 'tx_sportms_domain_model_competitionseason';
            $tableCompetitionSeasonAlias = 'competitionseason';
            $tableTeamSeason = 'tx_sportms_domain_model_teamseason';
            $tableTeamSeasonAliasHome = 'teamseasonhome';
            $tableTeamSeasonAliasGuest = 'teamseasonguest';
            $queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGame);
            $queryBuilder->SELECT($tableGameAlias . '.*')
                ->addSelectLiteral('ABS(' . $queryBuilder->quoteIdentifier('result_end_regular_home') . '-' . $queryBuilder->quoteIdentifier('result_end_regular_guest') . ') AS ' . $queryBuilder->quoteIdentifier('difference'))
                ->FROM($tableGame, $tableGameAlias)
                ->INNERJOIN($tableGameAlias, $tableTeamSeason, $tableTeamSeasonAliasHome,
                    $queryBuilder->expr()->eq($tableGameAlias . '.team_season_home',
                        $queryBuilder->quoteIdentifier($tableTeamSeasonAliasHome . '.uid')))
                ->INNERJOIN($tableGameAlias, $tableTeamSeason, $tableTeamSeasonAliasGuest,
                    $queryBuilder->expr()->eq($tableGameAlias . '.team_season_guest',
                        $queryBuilder->quoteIdentifier($tableTeamSeasonAliasGuest . '.uid')));
            if ($competitionUids) {
                $queryBuilder->INNERJOIN($tableGameAlias, $tableCompetitionSeason, $tableCompetitionSeasonAlias,
                    $queryBuilder->expr()->eq($tableGameAlias . '.competition_season',
                        $queryBuilder->quoteIdentifier($tableCompetitionSeasonAlias . '.uid')));
            }
            $queryBuilder->WHERE(
                $queryBuilder->expr()->eq($tableGameAlias . '.game_appointment', 6),               # Spiel ist beendet
                $queryBuilder->expr()->eq($tableGameAlias . '.game_rating', 1),                    # Normale Wertung
                $queryBuilder->expr()->andX(
                    $queryBuilder->expr()->isNotNull($tableGameAlias . '.result_end_regular_home'),
                    $queryBuilder->expr()->isNotNull($tableGameAlias . '.result_end_regular_guest')
                ),
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->andX(
                        $queryBuilder->expr()->eq($tableTeamSeasonAliasHome . '.team', $teamUid),
                        $queryBuilder->expr()->gt($tableGameAlias . '.result_end_regular_guest',
                            $tableGameAlias . '.result_end_regular_home')
                    ),
                    $queryBuilder->expr()->andX(
                        $queryBuilder->expr()->eq($tableTeamSeasonAliasGuest . '.team', $teamUid),
                        $queryBuilder->expr()->gt($tableGameAlias . '.result_end_regular_home',
                            $tableGameAlias . '.result_end_regular_guest')
                    )
                )
            );
            if ($competitionUids) {
                $queryBuilder->andWhere($queryBuilder->expr()->in($tableCompetitionSeasonAlias . '.competition',
                    explode(',', $competitionUids)));
            }
            if ($seasonUids) {
                $queryBuilder->andWhere($queryBuilder->expr()->in($tableGameAlias . '.season',
                    explode(',', $seasonUids)));
            }
            $queryBuilder->GROUPBY($tableGameAlias . '.uid')
                ->ORDERBY('difference', QueryInterface::ORDER_DESCENDING)
                ->add('orderBy', 'GREATEST(result_end_regular_home, result_end_regular_guest) DESC', true)
                ->ADDORDERBY('result_end_regular_home',
                    QueryInterface::ORDER_ASCENDING)    # a high lost at home is more crucial than away
                ->setMaxResults($limit);
            $dataMapper = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper::class);
            return $dataMapper->map($this->objectType, $queryBuilder->execute()->fetchAll());
        }
        
        public function findGamesWithMostGoalsForTeam(
            int $teamUid,
            int $limit = 5,
            string $competitionUids = null,
            string $seasonUids = null
        ) {
            $tableGame = 'tx_sportms_domain_model_game';
            $tableGameAlias = 'game';
            $tableCompetitionSeason = 'tx_sportms_domain_model_competitionseason';
            $tableCompetitionSeasonAlias = 'competitionseason';
            $tableTeamSeason = 'tx_sportms_domain_model_teamseason';
            $tableTeamSeasonAliasHome = 'teamseasonhome';
            $tableTeamSeasonAliasGuest = 'teamseasonguest';
            $queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable($tableGame);
            $queryBuilder->SELECT($tableGameAlias . '.*')
                ->addSelectLiteral($queryBuilder->quoteIdentifier('result_end_regular_home') . '+' . $queryBuilder->quoteIdentifier('result_end_regular_guest') . ' AS ' . $queryBuilder->quoteIdentifier('goals'))
                ->FROM($tableGame, $tableGameAlias)
                ->INNERJOIN($tableGameAlias, $tableTeamSeason, $tableTeamSeasonAliasHome,
                    $queryBuilder->expr()->eq($tableGameAlias . '.team_season_home',
                        $queryBuilder->quoteIdentifier($tableTeamSeasonAliasHome . '.uid')))
                ->INNERJOIN($tableGameAlias, $tableTeamSeason, $tableTeamSeasonAliasGuest,
                    $queryBuilder->expr()->eq($tableGameAlias . '.team_season_guest',
                        $queryBuilder->quoteIdentifier($tableTeamSeasonAliasGuest . '.uid')));
            if ($competitionUids) {
                $queryBuilder->INNERJOIN($tableGameAlias, $tableCompetitionSeason, $tableCompetitionSeasonAlias,
                    $queryBuilder->expr()->eq($tableGameAlias . '.competition_season',
                        $queryBuilder->quoteIdentifier($tableCompetitionSeasonAlias . '.uid')));
            }
            $queryBuilder->WHERE(
                $queryBuilder->expr()->eq('game_appointment', 6),               # Spiel ist beendet
                $queryBuilder->expr()->eq('game_rating', 1),                    # Normale Wertung
                $queryBuilder->expr()->andX(
                    $queryBuilder->expr()->isNotNull($tableGameAlias . '.result_end_regular_home'),
                    $queryBuilder->expr()->isNotNull($tableGameAlias . '.result_end_regular_guest')
                ),
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->eq($tableTeamSeasonAliasHome . '.team', $teamUid),
                    $queryBuilder->expr()->eq($tableTeamSeasonAliasGuest . '.team', $teamUid)
                )
            );
            if ($competitionUids) {
                $queryBuilder->andWhere($queryBuilder->expr()->in($tableCompetitionSeasonAlias . '.competition',
                    explode(',', $competitionUids)));
            }
            if ($seasonUids) {
                $queryBuilder->andWhere($queryBuilder->expr()->in($tableGameAlias . '.season',
                    explode(',', $seasonUids)));
            }
            $queryBuilder->ORDERBY('goals', QueryInterface::ORDER_DESCENDING)
                ->setMaxResults($limit);
            $dataMapper = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper::class);
            return $dataMapper->map($this->objectType, $queryBuilder->execute()->fetchAll());
        }
        
        public function findGamesWithMostSpectatorsForTeam(
            int $teamUid,
            int $limit = 5,
            string $competitionUids = null,
            string $seasonUids = null
        ) {
            return $this->findRecordGamesBySpectatorsForTeam($teamUid, QueryInterface::ORDER_DESCENDING, $limit,
                $competitionUids, $seasonUids);
        }
        
        public function findRecordGamesBySpectatorsForTeam(
            int $teamUid,
            string $ordering,
            int $limit = 5,
            string $competitionUids = null,
            string $seasonUids = null
        ) {
            $query = $this->createQuery();
            $constraints = [];
            $constraints[] = $this->constraintForTeamUids($query, (string)$teamUid);
            $constraints[] = $query->greaterThanOrEqual('spectators', 0);
            if ($competitionUids) {
                $constraints[] = $this->constraintForCompetitionUids($query, $competitionUids);
            }
            if ($seasonUids) {
                $constraints[] = $this->constraintForSeasonUids($query, $seasonUids);
            }
            $query->matching($query->logicalAnd(...$constraints));
            $query->setLimit($limit);
            $query->setOrderings(['spectators' => $ordering]);
            return $query->execute();
        }
        
        public function findGamesWithFewestSpectatorsForTeam(
            int $teamUid,
            int $limit = 5,
            string $competitionUids = null,
            string $seasonUids = null
        ) {
            return $this->findRecordGamesBySpectatorsForTeam($teamUid, QueryInterface::ORDER_ASCENDING, $limit,
                $competitionUids, $seasonUids);
        }
        
    }