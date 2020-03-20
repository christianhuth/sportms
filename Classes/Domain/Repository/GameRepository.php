<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class GameRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.sectionAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionSeason.competition.sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'season.seasonName' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'gameday' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'teamSeasonHome.team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'teamSeasonGuest.team.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll(string $sectionUids = NULL, string $sectionAgeGroupUids = NULL, string $sectionAgeLevelUids = NULL, string $competitionTypeUids = NULL, string $competitionUids = NULL, string $clubUids = NULL, string $teamUids = NULL, string $seasonUids = NULL, string $competitionSeasonGamedayUids = NULL) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionUids) {
				$constraints[] = $query->in('competitionSeason.competition.section', explode(',', $sectionUids));
			}
			if($sectionAgeGroupUids) {
				$constraints[] = $query->in('competitionSeason.competition.sectionAgeGroup', explode(',', $sectionAgeGroupUids));
			}
			if($sectionAgeLevelUids) {
				$constraints[] = $query->in('competitionSeason.competition.sectionAgeLevel', explode(',', $sectionAgeLevelUids));
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