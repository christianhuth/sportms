<?php
	
	namespace Balumedien\Sportms\Domain\Repository;
	
	class GameRepository extends SportMSBaseRepository {
		
		protected $defaultOrderings = array(
			'sport.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.sportAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.sportAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'season.seasonName' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'gameday' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'teamSeasonHome.team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'teamSeasonGuest.team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sportUids = NULL, string $sportAgeGroupUids = NULL, string $sportAgeLevelUids = NULL, string $competitionTypeUids = NULL, string $competitionUids = NULL, string $clubUids = NULL, string $teamUids = NULL, string $seasonUids = NULL, string $competitionSeasonGamedayUids = NULL) {
			$query = $this->createQuery();
			$constraints = [];
			if($sportUids) {
				$constraints[] = $query->in('competitionSeason.competition.sport', explode(',', $sportUids));
			}
			if($sportAgeGroupUids) {
				$constraints[] = $query->in('competitionSeason.competition.sportAgeGroup', explode(',', $sportAgeGroupUids));
			}
			if($sportAgeLevelUids) {
				$constraints[] = $query->in('competitionSeason.competition.sportAgeLevel', explode(',', $sportAgeLevelUids));
			}
			if($competitionTypeUids) {
				$constraints[] = $query->in('competitionSeason.competition.competitionType', explode(',', $competitionTypeUids));
			}
			if($competitionUids) {
				$constraints[] = $query->in('competitionSeason.competition', explode(',', $competitionUids));
			}
			if($clubUids) {
				$constraints[] = $query->logicalOr(
					$query->in('teamSeasonHome.team.club', explode(',', $clubUids)),
					$query->in('teamSeasonGuest.team.club', explode(',', $clubUids))
				);
			}
			if($teamUids) {
				$constraints[] = $query->logicalOr(
					$query->in('teamSeasonHome.team', explode(',', $teamUids)),
					$query->in('teamSeasonGuest.team', explode(',', $teamUids))
				);
			}
			if($seasonUids) {
				$constraints[] = $query->in('season', explode(',', $seasonUids));
			}
			if($competitionSeasonGamedayUids) {
				$constraints[] = $query->in('gameday', explode(',', $competitionSeasonGamedayUids));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}