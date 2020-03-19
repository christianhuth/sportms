<?php

    namespace Balumedien\Clubms\Domain\Repository;

    class SeasonRepository extends ClubMSBaseRepository {
	   
	    protected $defaultOrderings = array(
		    'season_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	    );
	
    }

?>