<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
    class VenueRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'club.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
        public function findAll(string $clubUids = null, string $venueUids = null)
        {
            $query = $this->createQuery();
            $constraints = [];
            if ($clubUids) {
                $constraints[] = $query->in('club', explode(',', $clubUids));
            }
            if ($venueUids) {
                $constraints[] = $query->in('uid', explode(',', $venueUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd($constraints));
            }
            return $query->execute();
        }
        
    }