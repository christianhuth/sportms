<?php
	
	use Balumedien\Sportms\SlugGenerators\TeamSeasonSlug;
	
	$GLOBALS['TCA']['tx_sportms_domain_model_teamseason']['columns']['slug']['config']['generatorOptions']['postModifiers'][] = TeamSeasonSlug::class . '->generateSlug';