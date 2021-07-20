<?php
    
    namespace Balumedien\Sportms\Domain\Repository;
    
    class ClubOfficialRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'club' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
    }
    
    ?>