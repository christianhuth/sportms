<?php
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
    class TeamRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sport.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sportAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sportAgeLevel.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
        public function findAll(
            string $sportUids = null,
            string $sportAgeGroupUids = null,
            string $sportAgeLevelUids = null,
            string $clubUids = null,
            string $teamUids = null
        ) {
            $query = $this->createQuery();
            $constraints = [];
            if ($teamUids) {
                $constraints[] = $query->in('uid', explode(',', $teamUids));
            }
            if ($sportUids) {
                $constraints[] = $query->in('sport', explode(',', $sportUids));
            }
            if ($sportAgeGroupUids) {
                $constraints[] = $query->in('sport_age_group', explode(',', $sportAgeGroupUids));
            }
            if ($sportAgeLevelUids) {
                $constraints[] = $query->in('sport_age_level', explode(',', $sportAgeLevelUids));
            }
            if ($clubUids) {
                $constraints[] = $query->in('club', explode(',', $clubUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd($constraints));
            }
            return $query->execute();
        }
        
    }