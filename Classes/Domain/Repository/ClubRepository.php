<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
    class ClubRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
        public function findAll(string $clubUids = null)
        {
            $query = $this->createQuery();
            $constraints = [];
            if ($clubUids) {
                $constraints[] = $query->in('uid', explode(",", $clubUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd($constraints));
            }
            return $query->execute();
        }
        
    }
    
    ?>