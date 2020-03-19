<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class CompetitionSeasonRepository extends ClubMSBaseRepository {
		
		public function findAll($competitionsFilter = null, $competitionTypesFilter = null, $sectionsFilter = null, $sectionAgeGroupsFilter = null, $sectionAgeLevelsFilter = null, $seasonsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($competitionsFilter) {
				$constraints[] = $query->in('competition', explode(',', $competitionsFilter));
			}
			if($competitionTypesFilter) {
				$constraints[] = $query->in('competition.competitionType', explode(',', $competitionTypesFilter));
			}
			if($sectionsFilter) {
				$constraints[] = $query->in('competition.section', explode(',', $sectionsFilter));
			}
			if($sectionAgeGroupsFilter) {
				$constraints[] = $query->in('competition.sectionAgeGroup', explode(',', $sectionAgeGroupsFilter));
			}
			if($sectionAgeLevelsFilter) {
				$constraints[] = $query->in('competition.sectionAgeLevel', explode(',', $sectionAgeLevelsFilter));
			}
			if($seasonsFilter) {
				$constraints[] = $query->in('season', explode(',', $seasonsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>