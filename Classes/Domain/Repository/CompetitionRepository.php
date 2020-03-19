<?php
	
	namespace Balumedien\Clubms\Domain\Repository;
	
	class CompetitionRepository extends ClubMSBaseRepository {
		
		protected $defaultOrderings = array(
			'section.label' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
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
			# Folgender Schnippel debugged eine Query, die in der Variable $query gespeichert ist
			$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
			\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
			return $query->execute();
		}
		
	}
	
?>