<?php

    namespace Balumedien\Clubms\Domain\Repository;

    class PersonRepository extends ClubMSBaseRepository {
	
	    protected $defaultOrderings = array(
		    'lastname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		    'firstname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
	    );

    }

?>