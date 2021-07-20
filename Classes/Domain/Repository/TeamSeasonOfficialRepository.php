<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;

    class TeamSeasonOfficialRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'teamSeason.team.club.name' => QueryInterface::ORDER_ASCENDING,
            'teamSeason.team.sport.label' => QueryInterface::ORDER_ASCENDING,
            'teamSeason.team.sportAgeGroup.sorting' => QueryInterface::ORDER_ASCENDING,
            'teamSeason.team.sportAgeLevel.label' => QueryInterface::ORDER_ASCENDING,
            'teamSeason.team.label' => QueryInterface::ORDER_ASCENDING,
            'teamSeason.season.label' => QueryInterface::ORDER_DESCENDING,
            'enddate' => QueryInterface::ORDER_ASCENDING,
            'startdate' => QueryInterface::ORDER_DESCENDING,
            'teamSeasonOfficialJob.label' => QueryInterface::ORDER_ASCENDING,
        ];
        
        public function findAll(string $teamUids = null)
        {
            $query = $this->createQuery();
            $constraints = [];
            if ($teamUids) {
                $constraints[] = $query->in('teamSeason.team', explode(',', $teamUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd($constraints));
            }
            return $query->execute();
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Team $team
         */
        public function findAllByTeam(\Balumedien\Sportms\Domain\Model\Team $team)
        {
            $orderings = [
                'person' => QueryInterface::ORDER_ASCENDING,
                'teamSeasonOfficialJob.label' => QueryInterface::ORDER_ASCENDING,
                'teamSeason.season.startdate' => QueryInterface::ORDER_ASCENDING,
            ];
            $query = $this->createQuery();
            $query->setOrderings($orderings);
            $constraints = [];
            $constraints[] = $query->equals('teamSeason.team', $team->getUid());
            $query->matching($query->logicalAnd($constraints));
            return $query->execute();
        }
        
    }