<?php

    namespace Balumedien\Clubms\Domain\Repository;

    class SeasonRepository extends ClubMSBaseRepository {
	   
	    // Order by BE sorting
	    protected $defaultOrderings = array(
		    'season_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	    );
	
    }

?>