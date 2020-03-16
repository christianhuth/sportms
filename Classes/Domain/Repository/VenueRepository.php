<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class VenueRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		public function findAll($venuesFilter = null, $clubsFilter = null, $withClubOnly = false) {
			$query = $this->createQuery();
			$constraints = [];
			if($venuesFilter) {
				$constraints[] = $query->in('uid', explode(',', $venuesFilter));
			}
			if($clubsFilter) {
				$constraints[] = $query->in('club', explode(',', $clubsFilter));
				$withClubOnly = true;
			}
			if($withClubOnly) {
				$constraints[] = $query->logicalNot($query->equals('club', 0));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			
			# Folgender Schnippel debugged eine Query, die in der Variable $query gespeichert ist
			$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
			
			return $query->execute();
		}
	
	}