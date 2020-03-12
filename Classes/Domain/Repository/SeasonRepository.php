<?php

    namespace Balumedien\Clubms\Domain\Repository;

    class SeasonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	   
	    // Order by BE sorting
	    protected $defaultOrderings = array(
		    'season_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	    );
	
    }

?>