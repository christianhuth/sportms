<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\UserFunc;
    
    use TYPO3\CMS\Core\Database\Connection;
    use TYPO3\CMS\Core\Database\ConnectionPool;
    use TYPO3\CMS\Core\Utility\GeneralUtility;

    class ItemsProcFunc
    {
        
        /**
         * @param array $config
         * @return void
         */
        public function team_season_squad_member_GameLineup(&$config)
        {
            $game = $config['row']['game'][0];
            if ($game != null) {
                $whichTeam = $config['row']['team'];
                $teamSeasonColumn = "team_season_home";
                if ($whichTeam == "guest") {
                    $teamSeasonColumn = "team_season_guest";
                }
                #$json_encoded_config = json_encode($config);
                #file_put_contents("/homepages/17/d76951472/htdocs/www/team_season_squad_member_GameLineup.log", $json_encoded_config);
                
                #$uid = $config['row']['uid'];
                #file_put_contents("/homepages/17/d76951472/htdocs/www/team_season_squad_member_GameLineup.log", $uid);
                
                $gameTable = "tx_sportms_domain_model_game";
                $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($gameTable);
                $queryBuilder->select($gameTable . '.' . $teamSeasonColumn)
                    ->from($gameTable)
                    ->where($queryBuilder->expr()->eq($gameTable . '.uid', $game));
                $result = $queryBuilder->execute()->fetchAll();
                $teamSeasonId = $result[0][$teamSeasonColumn];
                
                $teamseasonsquadmemberTable = "tx_sportms_domain_model_teamseasonsquadmember";
                $personTable = "tx_sportms_domain_model_person";
                
                $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($teamseasonsquadmemberTable);
                $queryBuilder->select($personTable . '.uid', $personTable . '.firstname', $personTable . '.lastname')
                    ->from($teamseasonsquadmemberTable)
                    ->innerJoin(
                        $teamseasonsquadmemberTable,
                        $personTable,
                        $personTable,
                        $queryBuilder->expr()->eq($personTable . '.uid',
                            $queryBuilder->quoteIdentifier($teamseasonsquadmemberTable . '.person'))
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
        
        /**
         * @param array $config
         * @return void
         */
        public function tx_sportms_domain_model_personprofile(&$config)
        {
            $personProfileDatabaseTable = "tx_sportms_domain_model_personprofile";
            $personDatabaseTable = "tx_sportms_domain_model_person";
            $profileType = $config['config']['itemsProcConfig']['profile_type'];
            if (empty($profileType)) {
                throw new \UnexpectedValueException('No profile type given.', 1381823570);
            }
            # ClubSectionOfficialProfile
            if ($profileType == 2) {
                $clubSection = $config['row']['club_section'];
                if (!empty($clubSection)) {
                    $this->determineSportUidsForClubSectionProfile((int) $clubSection);
                } else {
                    throw new \UnexpectedValueException('No club section given to determine sports.', 1381823570);
                }
            }
            # PlayerProfile
            if ($profileType == 3) {
                $teamSeason = $config['row']['team_season'];
                if (!empty($teamSeason)) {
                    $sportUids = $this->determineSportUidsForPlayerProfile((int) $teamSeason);
                } else {
                    throw new \UnexpectedValueException('No teamSeason given to determine sport.', 1381823570);
                }
            }
            # RefereeProfile
            if ($profileType == 4) {
                $game = $config['row']['game'];
                if (!empty($game)) {
                    $sportUids = $this->determineSportUidsForRefereeProfile((int) $game);
                } else {
                    throw new \UnexpectedValueException('No game given to determine sport.', 1381823570);
                }
            }
            # TeamSeasonOfficialProfile
            if ($profileType == 5) {
                $teamSeason = $config['row']['team_season'];
                if (!empty($teamSeason)) {
                    $sportUids = $this->determineSportUidsForTeamSeasonOfficialProfile((int) $teamSeason);
                } else {
                    throw new \UnexpectedValueException('No teamSeason given to determine sport.', 1381823570);
                }
            }
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($personProfileDatabaseTable);
            $queryBuilder->select(
                $personProfileDatabaseTable . '.uid',
                $personDatabaseTable . '.lastname',
                $personDatabaseTable . '.firstname'
            )
                ->from($personProfileDatabaseTable)
                ->innerJoin(
                    $personProfileDatabaseTable,
                    $personDatabaseTable,
                    $personDatabaseTable,
                    $queryBuilder->expr()->eq($personDatabaseTable . '.uid',
                        $queryBuilder->quoteIdentifier($personProfileDatabaseTable . '.person'))
                )
                ->where($queryBuilder->expr()->eq($personProfileDatabaseTable . '.profile_type', $profileType))
                ->orderBy('lastname', 'ASC')
                ->addOrderBy('firstname', 'ASC');
            if (!empty($sportUids)) {
                $queryBuilder->andWhere(
                    $queryBuilder->expr()->in($personProfileDatabaseTable . '.sport',
                        $queryBuilder->createNamedParameter($sportUids, Connection::PARAM_INT_ARRAY))
                );
            }
            $result = $queryBuilder->execute()->fetchAll();
            
            // DEBUG
            #array_push($config['items'], [json_encode($config), null]);
            #array_push($config['items'], [$queryBuilder->getSQL(), '0']);
            
            foreach ($result as $row) {
                // push it into the config array
                array_push($config['items'], [$row['lastname'] . ", " . $row['firstname'], $row['uid']]);
            }
        }
        
        /**
         * @param int $clubSection
         * @return array
         */
        private function determineSportUidsForClubSectionProfile(int $clubSection): array
        {
            $clubSectionSportDatabaseTable = "tx_sportms_clubsection_sport_mm";
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($clubSectionSportDatabaseTable);
            $queryBuilder->select($clubSectionSportDatabaseTable . '.uid_foreign')
                ->from($clubSectionSportDatabaseTable)
                ->where($queryBuilder->expr()->eq($clubSectionSportDatabaseTable . '.uid_local', $clubSection));
            $result = $queryBuilder->execute()->fetchAll();
            $sportUids = [];
            foreach ($result as $row) {
                $sportUids[] = $row['uid_foreign'];
            }
            return $sportUids;
        }
        
        /**
         * @param int $teamSeason
         * @return array
         */
        private function determineSportUidsForPlayerProfile(int $teamSeason): array
        {
            $teamTable = 'tx_sportms_domain_model_team';
            $teamSeasonTable = 'tx_sportms_domain_model_teamseason';
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($teamTable);
            $queryBuilder->select($teamTable . '.sport')
                ->from($teamTable)
                ->innerJoin(
                    $teamTable,
                    $teamSeasonTable,
                    $teamSeasonTable,
                    $queryBuilder->expr()->eq($teamTable . '.uid',
                        $queryBuilder->quoteIdentifier($teamSeasonTable . '.team'))
                )
                ->where($queryBuilder->expr()->eq($teamSeasonTable . '.uid', $teamSeason));
            $result = $queryBuilder->execute()->fetchAll();
            $sportUids = [];
            foreach ($result as $row) {
                $sportUids[] = $row['sport'];
            }
            return $sportUids;
        }
        
        /**
         * @param int $game
         * @return array
         */
        private function determineSportUidsForRefereeProfile(int $game): array
        {
            $gameTable = 'tx_sportms_domain_model_game';
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($gameTable);
            $queryBuilder->select($gameTable . '.sport')
                ->from($gameTable)
                ->where($queryBuilder->expr()->eq($gameTable . '.uid', $game));
            $result = $queryBuilder->execute()->fetchAll();
            $sportUids = [];
            foreach ($result as $row) {
                $sportUids[] = $row['sport'];
            }
            return $sportUids;
        }
        
        /**
         * @param int $teamSeason
         * @return array
         */
        private function determineSportUidsForTeamSeasonOfficialProfile(int $teamSeason): array
        {
            $teamTable = 'tx_sportms_domain_model_team';
            $teamSeasonTable = 'tx_sportms_domain_model_teamseason';
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($teamTable);
            $queryBuilder->select($teamTable . '.sport')
                ->from($teamTable)
                ->innerJoin(
                    $teamTable,
                    $teamSeasonTable,
                    $teamSeasonTable,
                    $queryBuilder->expr()->eq($teamTable . '.uid',
                        $queryBuilder->quoteIdentifier($teamSeasonTable . '.team'))
                )
                ->where($queryBuilder->expr()->eq($teamSeasonTable . '.uid', $teamSeason));
            $result = $queryBuilder->execute()->fetchAll();
            $sportUids = [];
            foreach ($result as $row) {
                $sportUids[] = $row['sport'];
            }
            return $sportUids;
        }
        
    }
    
    ?>