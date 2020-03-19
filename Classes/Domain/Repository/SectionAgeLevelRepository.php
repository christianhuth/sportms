<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionAgeLevelRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sectionAgeGroup.section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		/**
		 * @param string|null $uids
		 * @param string|null $sections
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAll(string $uids = null, string $sections = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($uids) {
				$constraints[] = $query->in('uid', explode(',', $uids));
			}
			if($sections) {
				$constraints[] = $query->in('sectionAgeGroup.section', explode(',', $sections));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}