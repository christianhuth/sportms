<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SectionAgeLevelRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sectionAgeGroup.section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeGroup.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		/**
		 * @param string|null $sectionUids
		 * @param string|null $sectionAgeGroupUids
		 * @param string|null $sectionAgeLevelUids
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAll(string $sectionUids = null, string $sectionAgeGroupUids = null, string $sectionAgeLevelUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionUids) {
				$constraints[] = $query->in('sectionAgeGroup.section', explode(',', $sectionUids));
			}
			if($sectionAgeGroupUids) {
				$constraints[] = $query->in('sectionAgeGroup', explode(',', $sectionAgeGroupUids));
			}
			if($sectionAgeLevelUids) {
				$constraints[] = $query->in('uid', explode(',', $sectionAgeLevelUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}