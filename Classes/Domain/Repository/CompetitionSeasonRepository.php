<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
    use Balumedien\Sportms\Domain\Model\Competition;
    use Balumedien\Sportms\Domain\Model\CompetitionSeason;
    use Balumedien\Sportms\Domain\Model\Season;
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;

    class CompetitionSeasonRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'competition.sport.label' => QueryInterface::ORDER_ASCENDING,
            'competition.label' => QueryInterface::ORDER_ASCENDING,
            'competition.competitionType.label' => QueryInterface::ORDER_ASCENDING,
            'competition.sportAgeGroup.label' => QueryInterface::ORDER_ASCENDING,
            'competition.sportAgeLevel.label' => QueryInterface::ORDER_ASCENDING,
            'season.label' => QueryInterface::ORDER_DESCENDING,
        ];
        
        /**
         * @param string|null $sportUids
         * @param string|null $sportAgeGroupUids
         * @param string|null $sportAgeLevelUids
         * @param string|null $competitionTypeUids
         * @param string|null $competitionUids
         * @param string|null $seasonUids
         * @return mixed
         */
        public function findAll(
            string $sportUids = null,
            string $sportAgeGroupUids = null,
            string $sportAgeLevelUids = null,
            string $competitionTypeUids = null,
            string $competitionUids = null,
            string $seasonUids = null
        ) {
            $query = $this->createQuery();
            $constraints = [];
            if ($sportUids) {
                $constraints[] = $query->in('competition.sport', explode(',', $sportUids));
            }
            if ($sportAgeGroupUids) {
                $constraints[] = $query->in('competition.sportAgeGroup', explode(',', $sportAgeGroupUids));
            }
            if ($sportAgeLevelUids) {
                $constraints[] = $query->in('competition.sportAgeLevel', explode(',', $sportAgeLevelUids));
            }
            if ($competitionTypeUids) {
                $constraints[] = $query->in('competition.competitionType', explode(',', $competitionTypeUids));
            }
            if ($competitionUids) {
                $constraints[] = $query->in('competition', explode(',', $competitionUids));
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
         * @param Competition $competition
         * @return CompetitionSeason
         */
        public function findCurrentByCompetition(Competition $competition): CompetitionSeason
        {
            return $this->findCurrentByCompetitionUid($competition->getUid());
        }
        
        /**
         * @param int $competitionUid
         * @return CompetitionSeason
         */
        public function findCurrentByCompetitionUid(int $competitionUid): CompetitionSeason
        {
            $query = $this->createQuery();
            $constraints = [];
            $constraints[] = $query->equals('competition', $competitionUid);
            $query->matching($query->logicalAnd($constraints));
            $query->setOrderings([
                'season.label' => QueryInterface::ORDER_DESCENDING,
            ]);
            $query->setLimit(1);
            return $query->execute()[0];
        }
        
        /**
         * @param Competition $competition
         * @param Season $season
         * @return CompetitionSeason
         */
        public function findByCompetitionAndSeason(Competition $competition, Season $season): CompetitionSeason
        {
            return $this->findByCompetitionUidAndSeasonUid($competition->getUid(), $season->getUid());
        }
        
        /**
         * @param int $competitionUid
         * @param int $seasonUid
         * @return CompetitionSeason
         */
        public function findByCompetitionUidAndSeasonUid(int $competitionUid, int $seasonUid): CompetitionSeason
        {
            $query = $this->createQuery();
            $constraints = [];
            $constraints[] = $query->equals('competition', $competitionUid);
            $constraints[] = $query->equals('season', $seasonUid);
            $query->matching($query->logicalAnd($constraints));
            return $query->execute()[0];
        }
        
    }