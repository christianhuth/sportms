<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionAgeLevelRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		/**
		 * @param string $uids
		 * @param int $section
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAllByUidsAndSection(string $uids, int $section) {
			$query = $this->createQuery();
			$constraints = [];
			if($uids) {
				$constraints[] = $query->in('uid', explode(',', $uids));
			}
			if($section) {
				$constraints[] = $query->equals('sectionAgeGroup.section', $section);
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}