<?php
	
	use Balumedien\Sportms\SlugGenerators\CompetitionSeasonSlug;
	
	$GLOBALS['TCA']['tx_sportms_domain_model_competitionseason']['columns']['slug']['config']['generatorOptions']['postModifiers'][] = CompetitionSeasonSlug::class . '->generateSlug';