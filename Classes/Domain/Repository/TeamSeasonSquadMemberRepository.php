<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	use Balumedien\Sportms\Domain\Model\Person;

    class TeamSeasonSquadMemberRepository extends SportMSBaseRepository {

        protected $defaultOrderings = array(
            'teamSeason.season.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
            'teamSeason.team.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        );

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