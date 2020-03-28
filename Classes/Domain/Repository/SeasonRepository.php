<?php

    namespace Balumedien\Sportms\Domain\Repository;

    class SeasonRepository extends SportMSBaseRepository {
	   
	    protected $defaultOrderings = array(
		    'season_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	    );
	
	    public function findAll(string $seasonUids = null) {
		    $query = $this->createQuery();
		    $constraints = [];
		    if($seasonUids) {
			    $constraints[] = $query->in('uid', explode(",", $seasonUids));
		    }
		    if($constraints) {
			    $query->matching($query->logicalAnd($constraints));
		    }
		    return $query->execute();
	    }
	
    }

?>