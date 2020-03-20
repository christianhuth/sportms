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
		
		public function findAll(string $sectionsFilter = NULL, string $sectionAgeGroupsFilter = NULL, string $sectionAgeLevelsFilter = NULL, string $competitionsFilter = NULL, string $competitionTypesFilter = NULL, string $seasonsFilter = NULL, string $competitionSeasonGamedaysFilter = NULL, string $clubsFilter = NULL, string $teamsFilter = NULL) {
			$query = $this->createQuery();
			$constraints = [];
			if($sectionsFilter) {
				$constraints[] = $query->in('competitionSeason.competition.section', explode(',', $sectionsFilter));
			}
			if($sectionAgeGroupsFilter) {
				$constraints[] = $query->in('competitionSeason.competition.sectionAgeGroup', explode(',', $sectionAgeGroupsFilter));
			}
			if($sectionAgeLevelsFilter) {
				$constraints[] = $query->in('competitionSeason.competition.sectionAgeLevel', explode(',', $sectionAgeLevelsFilter));
			}
			if($competitionsFilter) {
				$constraints[] = $query->in('competitionSeason.competition', explode(',', $competitionsFilter));
			}
			if($competitionTypesFilter) {
				$constraints[] = $query->in('competitionSeason.competition.competitionType', explode(',', $competitionTypesFilter));
			}
			if($seasonsFilter) {
				$constraints[] = $query->in('season', explode(',', $seasonsFilter));
			}
			if($competitionSeasonGamedaysFilter) {
				$constraints[] = $query->in('gameday', explode(',', $competitionSeasonGamedaysFilter));
			}
			if($clubsFilter) {
				$constraints[] = $query->logicalOr(
					$query->in('teamSeasonHome.team.club', explode(',', $clubsFilter)),
					$query->in('teamSeasonGuest.team.club', explode(',', $clubsFilter))
				);
			}
			if($teamsFilter) {
				$constraints[] = $query->logicalOr(
					$query->in('teamSeasonHome.team', explode(',', $teamsFilter)),
					$query->in('teamSeasonGuest.team', explode(',', $teamsFilter))
				);
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
	?>