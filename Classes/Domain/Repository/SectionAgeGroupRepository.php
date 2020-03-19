<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionAgeGroupRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		/**
		 * @param string $uids
		 * @param int|null $section
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAllByUidsAndSection(string $uids, int $section) {
			$query = $this->createQuery();
			$query->matching($query->logicalAnd($query->in('uid', explode(',', $uids)), $query->equals('section', $section)));
			# Folgender Schnippel debugged eine Query, die in der Variable $query gespeichert ist
			$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
			return $query->execute();
		}
		
	}