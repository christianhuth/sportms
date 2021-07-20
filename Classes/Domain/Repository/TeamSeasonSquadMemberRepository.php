<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	use Balumedien\Sportms\Domain\Model\Person;
	use TYPO3\CMS\Extbase\Persistence\QueryInterface;
	
	class TeamSeasonSquadMemberRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = [
			'teamSeason' => QueryInterface::ORDER_DESCENDING,
			'person.lastname' => QueryInterface::ORDER_ASCENDING,
			'person.firstname' => QueryInterface::ORDER_ASCENDING,
		];
		
		/**
		 * @param Person $person
		 * @return mixed
		 */
		public function findPlayerJerseys(Person $person) {
			$query = $this->createQuery();
			$constraints = [];
			$constraints[] = $query->equals('person', $person->getUid());
			$constraints[] = $query->logicalNot($query->equals('squadNumber', ''));
			$query->matching($query->logicalAnd($constraints));
			return $query->execute();
		}
		
	}
	
	?>