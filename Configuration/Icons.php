<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    // Icon identifier
    'sportms-domain-model-clubofficialprofile-icon' => [
        // Icon provider class
        'provider' => SvgIconProvider::class,
        // The source SVG for the SvgIconProvider
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_club.svg',
    ],
    'sportms-domain-model-clubsectionofficialprofile-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_clubsection.svg',
    ],
    'sportms-domain-model-playerprofile-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_sport.svg',
    ],
    'sportms-domain-model-teamseasonofficialprofile-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_teamseason.svg',
    ],
    'sportms-domain-model-refereeprofile-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_refereejob.svg',
    ],
    'sportms-ce-plugin-sportms-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/Extension.svg',
    ],
    'sportms-ce-plugin-club-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_club.svg',
    ],
    'sportms-ce-plugin-competition-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_competition.svg',
    ],
    'sportms-ce-plugin-game-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_game.svg',
    ],
    'sportms-ce-plugin-person-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_person.svg',
    ],
    'sportms-ce-plugin-season-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_season.svg',
    ],
    'sportms-ce-plugin-team-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_team.svg',
    ],
];
