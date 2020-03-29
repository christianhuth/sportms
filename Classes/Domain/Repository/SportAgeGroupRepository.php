<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class SportAgeGroupRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		/**
		 * @param string|null $sportUids
		 * @param string|null $sportAgeGroupUids
		 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function findAll(string $sportUids = null, string $sportAgeGroupUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('sport', explode(',', $sportUids));
			}
			if($sportAgeGroupUids) {
				$constraints[] = $query->in('uid', explode(',', $sportAgeGroupUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}