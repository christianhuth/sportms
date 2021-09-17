<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
    use ChristianKnell\Sportms\Domain\Model\Team;
    use ChristianKnell\Sportms\Domain\Model\TeamSeason;
    use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

    class TeamSeasonRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'team.club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'team.sport.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'team.sportAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'team.sportAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'team.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'season.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        ];
        
        // Repository wide settings
        public function initializeObject()
        {
            $querySettings = new Typo3QuerySettings();
            
            // don't add the pid constraint
            $querySettings->setRespectStoragePage(false);
            
            // define the enablecolumn fields to be ignored, true ignores all of them
            $querySettings->setIgnoreEnableFields(false);
            
            // define single fields to be ignored
            // $querySettings->setEnableFieldsToBeIgnored(['disabled', 'starttime']);
            
            // add deleted rows to the result
            $querySettings->setIncludeDeleted(false);
            
            // don't add sys_language_uid constraint
            $querySettings->setRespectSysLanguage(false);
            
            $this->setDefaultQuerySettings($querySettings);
        }
        
        /**
         * @param string|null $sportUids
         * @param string|null $sportAgeGroupUids
         * @param string|null $sportAgeLevelUids
         * @param string|null $clubUids
         * @param string|null $teamUids
         * @param string|null $seasonUids
         * @return mixed
         */
        public function findAll(
            string $sportUids = null,
            string $sportAgeGroupUids = null,
            string $sportAgeLevelUids = null,
            string $clubUids = null,
            string $teamUids = null,
            string $seasonUids = null
        ) {
            $query = $this->createQuery();
            $constraints = [];
            if ($sportUids) {
                $constraints[] = $query->in('team.sport', explode(',', $sportUids));
            }
            if ($sportAgeGroupUids) {
                $constraints[] = $query->in('team.sportAgeGroup', explode(',', $sportAgeGroupUids));
            }
            if ($sportAgeLevelUids) {
                $constraints[] = $query->in('team.sportAgeLevel', explode(',', $sportAgeLevelUids));
            }
            if ($clubUids) {
                $constraints[] = $query->in('team.club', explode(',', $clubUids));
            }
            if ($teamUids) {
                $constraints[] = $query->in('team', explode(',', $teamUids));
            }
            if ($seasonUids) {
                $constraints[] = $query->in('season', explode(',', $seasonUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd($constraints));
            }
            return $query->execute();
        }
        
        /**
         * @param Team $team
         * @return TeamSeason
         */
        public function findCurrentByTeam(Team $team): TeamSeason
        {
            return $this->findCurrentByTeamUid($team->getUid());
        }
        
        /**
         * @param int $teamUid
         * @return TeamSeason
         */
        public function findCurrentByTeamUid(int $teamUid): TeamSeason
        {
            $query = $this->createQuery();
            $constraints = [];
            $constraints[] = $query->equals('team', $teamUid);
            $query->matching($query->logicalAnd($constraints));
            $query->setOrderings([
                'season.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
            ]);
            $query->setLimit(1);
            return $query->execute()[0];
        }
        
        /**
         * @param Team $team
         * @param \ChristianKnell\Sportms\Domain\Model\Season $season
         * @return TeamSeason
         */
        public function findByTeamAndSeason(Team $team, \ChristianKnell\Sportms\Domain\Model\Season $season): TeamSeason
        {
            return $this->findByTeamUidAndSeasonUid($team->getUid(), $season->getUid());
        }
        
        /**
         * @param int $teamUid
         * @param int $seasonUid
         * @return TeamSeason
         */
        public function findByTeamUidAndSeasonUid(int $teamUid, int $seasonUid): TeamSeason
        {
            $query = $this->createQuery();
            $constraints = [];
            $constraints[] = $query->equals('team', $teamUid);
            $constraints[] = $query->equals('season', $seasonUid);
            $query->matching($query->logicalAnd($constraints));
            return $query->execute()[0];
        }
        
        /**
         * @param Team $team
         */
        public function findByTeam(Team $team)
        {
            $query = $this->createQuery();
            # TODO: FIX THIS AND REMOVE LINE 150
            $query->getQuerySettings()->setIgnoreEnableFields(false);
            $constraints = [];
            $constraints[] = $query->equals('team', $team);
            $constraints[] = $query->equals('hidden', 0);
            $query->matching($query->logicalAnd($constraints));
            return $query->execute();
        }
        
    }