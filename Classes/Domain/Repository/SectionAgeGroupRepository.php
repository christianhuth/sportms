<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class SectionAgeGroupRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
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
				$constraints[] = $query->in('section', explode(',', $sections));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}