<?php
    
    declare(strict_types=1);
    
    return [
        \Balumedien\Sportms\Domain\Model\PersonProfile::class => [
            'subclasses' => [
                \Balumedien\Sportms\Domain\Model\OfficialProfile::class,
                \Balumedien\Sportms\Domain\Model\PlayerProfile::class,
                \Balumedien\Sportms\Domain\Model\RefereeProfile::class,
            ],
        ],
        \Balumedien\Sportms\Domain\Model\OfficialProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 1,
        ],
        \Balumedien\Sportms\Domain\Model\PlayerProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 2,
        ],
        \Balumedien\Sportms\Domain\Model\RefereeProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 3,
        ],
    ];
