<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
    class TeamSeasonOfficialJobRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
    }