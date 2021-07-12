<?php
	
	use Balumedien\Sportms\SlugGenerators\GameSlug;
	
	$GLOBALS['TCA']['tx_sportms_domain_model_game']['columns']['slug']['config']['generatorOptions']['postModifiers'][] = GameSlug::class . '->generateSlug';