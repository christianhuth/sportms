<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class CompetitionSeasonRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'competition.sport.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.sportAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.sportAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'season.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
		);
		
		public function findAll(string $sportUids = null, string $sportAgeGroupUids = null, string $sportAgeLevelUids = null, string $competitionTypeUids = null, string $competitionUids = null, string $seasonUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('competition.sport', explode(',', $sportUids));
			}
			if($sportAgeGroupUids) {
				$constraints[] = $query->in('competition.sportAgeGroup', explode(',', $sportAgeGroupUids));
			}
			if($sportAgeLevelUids) {
				$constraints[] = $query->in('competition.sportAgeLevel', explode(',', $sportAgeLevelUids));
			}
			if($competitionTypeUids) {
				$constraints[] = $query->in('competition.competitionType', explode(',', $competitionTypeUids));
			}
			if($competitionUids) {
				$constraints[] = $query->in('competition', explode(',', $competitionUids));
			}
			if($seasonUids) {
				$constraints[] = $query->in('season', explode(',', $seasonUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}