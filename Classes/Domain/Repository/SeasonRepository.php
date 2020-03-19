<?php

    namespace Balumedien\Clubms\Domain\Repository;

    class SeasonRepository extends ClubMSBaseRepository {
	   
	    // Order by BE sorting
	    protected $defaultOrderings = array(
		    'season_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	    );
	
	    public function findAll($seasonsFilter = null) {
		    $query = $this->createQuery();
		    $constraints = [];
		    if($seasonsFilter) {
			    $constraints[] = $query->in('uid', explode(',', $seasonsFilter));
		    }
		    if($constraints) {
			    $query->matching($query->logicalAnd($constraints));
		    }
		    return $query->execute();
	    }
	
    }

?>