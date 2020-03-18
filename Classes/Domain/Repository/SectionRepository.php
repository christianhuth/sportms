<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		);
		
		public function findAll($sectionsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionsFilter) {
				$constraints[] = $query->in('uid', explode(',', $sectionsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
		public function findAllByClubSections($clubSections) {
			$query = $this->createQuery();
			$constraints = [];
			if($clubSections) {
				foreach($clubSections AS $clubSection) {
					$constraints[] = $query->equals('uid', $clubSection->getSection());
				}
			}
			if($constraints) {
				$query->matching($query->logicalOr($constraints));
			}
			# Folgender Schnippel debugged eine Query, die in der Variable $query gespeichert ist
			$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
			return $query->execute();
		}
		
	}
	
?>