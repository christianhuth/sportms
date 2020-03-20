<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class ClubRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
		public function findAll(string $clubUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubUids) {
				$constraints[] = $query->in('uid', explode(",", $clubUids));
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
	
?>