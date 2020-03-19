<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class CompetitionRepository extends ClubMSBaseRepository {
		
		// Order by BE sorting
		protected $defaultOrderings = array(
			'section' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'competitionType.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeGroup.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
			'sectionAgeLevel.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		);
		
		public function findAll($competitionsFilter = null, $competitionTypesFilter = null, $sectionsFilter = null, $sectionAgeGroupsFilter = null, $sectionAgeLevelsFilter = null) {
			$query = $this->createQuery();
			$constraints = [];
			if($competitionsFilter) {
				$constraints[] = $query->in('uid', explode(',', $competitionsFilter));
			}
			if($competitionTypesFilter) {
				$constraints[] = $query->in('competition_type', explode(',', $competitionTypesFilter));
			}
			if($sectionsFilter) {
				$constraints[] = $query->in('section', explode(',', $sectionsFilter));
			}
			if($sectionAgeGroupsFilter) {
				$constraints[] = $query->in('section_age_group', explode(',', $sectionAgeGroupsFilter));
			}
			if($sectionAgeLevelsFilter) {
				$constraints[] = $query->in('section_age_level', explode(',', $sectionAgeLevelsFilter));
			}
			if($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			return $query->execute();
		}
		
	}
	
?>