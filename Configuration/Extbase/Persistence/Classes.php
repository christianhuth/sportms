<?php
    
    declare(strict_types=1);
    
    return [
        \ChristianKnell\Sportms\Domain\Model\PersonProfile::class => [
            'subclasses' => [
                \ChristianKnell\Sportms\Domain\Model\ClubOfficialProfile::class,
                \ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficialProfile::class,
                \ChristianKnell\Sportms\Domain\Model\PlayerProfile::class,
                \ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficialProfile::class,
                \ChristianKnell\Sportms\Domain\Model\RefereeProfile::class,
            ],
        ],
        \ChristianKnell\Sportms\Domain\Model\ClubOfficialProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 1,
        ],
        \ChristianKnell\Sportms\Domain\Model\ClubSectionOfficialProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 2,
        ],
        \ChristianKnell\Sportms\Domain\Model\PlayerProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 3,
        ],
        \ChristianKnell\Sportms\Domain\Model\RefereeProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 4,
        ],
        \ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficialProfile::class => [
            'tableName' => 'tx_sportms_domain_model_personprofile',
            'recordType' => 5,
        ],
    ];
