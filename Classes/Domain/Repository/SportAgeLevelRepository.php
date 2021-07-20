<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
    class SportAgeLevelRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'sportAgeGroup.sport.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sportAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
        /**
         * @param string|null $sportUids
         * @param string|null $sportAgeGroupUids
         * @param string|null $sportAgeLevelUids
         * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
         * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
         */
        public function findAll(
            string $sportUids = null,
            string $sportAgeGroupUids = null,
            string $sportAgeLevelUids = null
        ) {
            $query = $this->createQuery();
            $constraints = [];
            if ($sportUids) {
                $constraints[] = $query->in('sportAgeGroup.sport', explode(',', $sportUids));
            }
            if ($sportAgeGroupUids) {
                $constraints[] = $query->in('sportAgeGroup', explode(',', $sportAgeGroupUids));
            }
            if ($sportAgeLevelUids) {
                $constraints[] = $query->in('uid', explode(',', $sportAgeLevelUids));
            }
            if ($constraints) {
                $query->matching($query->logicalAnd($constraints));
            }
            return $query->execute();
        }
        
    }