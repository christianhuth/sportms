<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
    class CompetitionRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'sport.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sportAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sportAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
        /**
         * @param string|null $sportUids
         * @param string|null $sportAgeGroupUids
         * @param string|null $sportAgeLevelUids
         * @param string|null $competitionTypeUids
         * @param string|null $competitionUids
         * @param string|null $teamUids
         * @return mixed
         */
        public function findAll(
            string $sportUids = null,
            string $sportAgeGroupUids = null,
            string $sportAgeLevelUids = null,
            string $competitionTypeUids = null,
            string $competitionUids = null,
            string $teamUids = null
        ) {
            $query = $this->createQuery();
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
            if ($teamUids) {
                $constraints[] = $this->constraintForTeamUids($query, $teamUids);
            }
            if ($constraints) {
                $query->matching($query->logicalAnd(...$constraints));
            }
            return $query->execute();
        }
        
        /**
         * @param $query
         * @param string|null $sportUids
         * @return mixed
         */
        private function constraintForSportUids($query, string $sportUids = null)
        {
            return $query->in('sport', explode(',', $sportUids));
        }
        
        private function constraintForSportAgeGroupUids($query, string $sportAgeGroupUids = null)
        {
            return $query->in('sport_age_group', explode(',', $sportAgeGroupUids));
        }
        
        private function constraintForSportAgeLevelUids($query, string $sportAgeLevelUids = null)
        {
            return $query->in('sport_age_level', explode(',', $sportAgeLevelUids));
        }
        
        private function constraintForCompetitionTypeUids($query, string $competitionTypeUids = null)
        {
            return $query->in('competition_type', explode(',', $competitionTypeUids));
        }
        
        private function constraintForCompetitionUids($query, string $competitionUids = null)
        {
            return $query->in('uid', explode(',', $competitionUids));
        }
        
        private function constraintForTeamUids($query, string $teamUids = null)
        {
            return $query->in('competitionSeasons.competitionSeasonTeams.team', explode(',', $teamUids));
        }
        
    }