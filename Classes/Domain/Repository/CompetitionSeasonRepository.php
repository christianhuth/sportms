<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class CompetitionSeasonRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'competition.section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.sectionAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competition.sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'season.seasonName' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
		);
		
		public function findAll(string $competitionUids = null, string $competitionTypeUids = null, string $sectionsUids = null, string $sectionAgeGroupUids = null, string $sectionAgeLevelUids = null, string $seasonUids = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($competitionUids) {
				$constraints[] = $query->in('competition', explode(',', $competitionUids));
			}
			if($competitionTypeUids) {
				$constraints[] = $query->in('competition.competitionType', explode(',', $competitionTypeUids));
			}
			if($sectionsUids) {
				$constraints[] = $query->in('competition.section', explode(',', $sectionsUids));
			}
			if($sectionAgeGroupUids) {
				$constraints[] = $query->in('competition.sectionAgeGroup', explode(',', $sectionAgeGroupUids));
			}
			if($sectionAgeLevelUids) {
				$constraints[] = $query->in('competition.sectionAgeLevel', explode(',', $sectionAgeLevelUids));
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