<?php

    namespace Balumedien\Clubms\Domain\Repository;

    class PersonRepository extends ClubMSBaseRepository {
	
	    public function findAll($personsFilter = null) {
		    $query = $this->createQuery();
		    $constraints = [];
		    if($personsFilter) {
			    $constraints[] = $query->in('uid', explode(',', $personsFilter));
		    }
		    if($constraints) {
			    $query->matching($query->logicalAnd($constraints));
		    }
		    return $query->execute();
	    }

    }

?>