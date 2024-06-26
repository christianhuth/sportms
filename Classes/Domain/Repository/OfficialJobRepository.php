<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Repository;
    
    class OfficialJobRepository extends SportMSBaseRepository
    {
        
        protected $defaultOrderings = [
            'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        
    }