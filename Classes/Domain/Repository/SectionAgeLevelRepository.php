<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionAgeLevelRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		/**
		 * @param string|null $uids
		 * @param string|null $sectionAgeGroupUids
		 * @param string|null $sectionUids
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAll(string $uids = null, string $sectionAgeGroupUids = null, string $sectionUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($uids) {
				$constraints[] = $query->in('uid', explode(',', $uids));
			}
			if($sectionAgeGroupUids) {
				$constraints[] = $query->in('sectionAgeGroup', explode(',', $sectionAgeGroupUids));
			}
			if($sectionUids) {
				$constraints[] = $query->in('sectionAgeGroup.section', explode(',', $sectionUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
	
	}