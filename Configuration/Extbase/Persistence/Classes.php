<?php
    
    declare(strict_types=1);
    
    return [
        \Balumedien\Sportms\Domain\Model\PersonProfile::class => [
            'subclasses' => [
                \Balumedien\Sportms\Domain\Model\ClubOfficialProfile::class,
                \Balumedien\Sportms\Domain\Model\TeamSeasonOfficialProfile::class,
                \Balumedien\Sportms\Domain\Model\PlayerProfile::class,
                \Balumedien\Sportms\Domain\Model\TeamSeasonOfficialProfile::class,
                \Balumedien\Sportms\Domain\Model\RefereeProfile::class,
            ],
        ],
        \Balumedien\Sportms\Domain\Model\ClubOfficialProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 1,
        ],
        \Balumedien\Sportms\Domain\Model\ClubSectionOfficialProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 2,
        ],
        \Balumedien\Sportms\Domain\Model\PlayerProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 3,
        ],
        \Balumedien\Sportms\Domain\Model\RefereeProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 4,
        ],
        \Balumedien\Sportms\Domain\Model\TeamSeasonOfficialProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 5,
        ],
    ];
