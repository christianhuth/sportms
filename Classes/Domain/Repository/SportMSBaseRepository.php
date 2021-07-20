<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	use TYPO3\CMS\Extbase\Persistence\QueryInterface;
	
	class SportMSBaseRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		protected function addOrderingsToQuery(QueryInterface $query, array $orderings = NULL) {
			if($orderings) {
				$query->setOrderings($orderings);
			}
		}
		
	}