<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
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
            'officialJob.label' => QueryInterface::ORDER_ASCENDING,
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
         * @param \ChristianKnell\Sportms\Domain\Model\Team $team
         */
        public function findAllByTeam(\ChristianKnell\Sportms\Domain\Model\Team $team)
        {
            $orderings = [
                'personProfile' => QueryInterface::ORDER_ASCENDING,
                'officialJob.label' => QueryInterface::ORDER_ASCENDING,
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