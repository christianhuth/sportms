<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
    class PersonRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'lastname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'firstname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
        public function findAll(string $personUids = null)
        {
            $query = $this->createQuery();
            $constraints = [];
            if ($personUids) {
                $constraints[] = $query->in('uid', explode(",", $personUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd(...$constraints));
            }
            return $query->execute();
        }
        
    }
    
    ?>