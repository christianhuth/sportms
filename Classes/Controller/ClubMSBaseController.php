<?php
	
	namespace Balumedien\Clubms\Controller;
	
	class ClubMSBaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		protected function getClubsFilter($useSelected = TRUE) {
			return $this->getFilter('club', 'clubs', $useSelected);
		}
		
		protected function getCompetitionsFilter($useSelected = TRUE) {
			return $this->getFilter('competition', 'competitions', $useSelected);
		}
		
		protected function getCompetitionTypesFilter($useSelected = TRUE) {
			return $this->getFilter('competition', 'competitionTypes', $useSelected);
		}
		
		protected function getCompetitionSeasonGamedaysFilter($useSelected = TRUE) {
			return $this->getFilter('competitionseason', 'competitionSeasonGameDays', $useSelected);
		}
		
		protected function getSeasonsFilter($useSelected = TRUE) {
			return $this->getFilter('season', 'seasons', $useSelected);
		}
		
		protected function getSectionsFilter($useSelected = TRUE) {
			return $this->getFilter('section', 'sections', $useSelected);
		}
		
		protected function getSectionAgeGroupsFilter($useSelected = TRUE) {
			return $this->getFilter('section', 'sectionAgeGroups', $useSelected);
		}
		
		protected function getSectionAgeLevelsFilter($useSelected = TRUE) {
			return $this->getFilter('section', 'sectionAgeLevels', $useSelected);
		}
		
		protected function getTeamsFilter($useSelected = TRUE) {
			return $this->getFilter('team', 'teams', $useSelected);
		}
		
		protected function getFilter($key1, $key2, $useSelected) {
			return ($useSelected && ($this->settings[$key1]['selected'])) ? $this->settings[$key1]['selected']: $this->settings[$key1][$key2];
		}
		
		protected function mapRequestsToSettings(): void {
			/* selectClub */
			if($this->request->hasArgument('selectClub')) {
				$this->settings['club']['selected'] = $this->request->getArgument('selectClub');
			}
			/* ShowView */
			if($this->request->hasArgument('showView') && $this->request->hasArgument('controller')) {
				$model = strtolower($this->request->getArgument('controller'));
				$this->settings[$model]['showView']['current'] = $this->request->getArgument('showView');
			}
		}
		
		protected function determineShowViews($model, $listOfPossibleShowViews): void {
			foreach(explode(',', $listOfPossibleShowViews) AS $showView) {
				$this->settings[$model]['showView'][$showView] = ($this->settings[$model]['showViews']) ? strpos($this->settings[$model]['showViews'], $showView) !== FALSE : TRUE;
			}
		}
		
		protected function determineShowView($model): void {
			if(!$this->settings[$model]['showView']['current']) {
				$this->settings[$model]['showView']['current'] = ($this->settings[$model]['showViews']) ? explode(',', $this->settings[$model]['showViews'])[0] : 'index';
			}
		}
		
		protected function determineShowNavigationViews($model, $listOfPossibleShowViews): void {
			if($this->settings[$model]['showNavigation']['enabled']) {
				$showNavigationEnabled = FALSE;
				foreach(explode(',', $listOfPossibleShowViews) AS $showView) {
					if($this->settings[$model]['showViews']) {
						if(strpos($this->settings[$model]['showViews'], $showView) !== FALSE) {
							if($this->settings[$model]['showNavigation']['views']) {
								$this->settings[$model]['showNavigation'][$showView] = strpos($this->settings[$model]['showNavigation']['views'], $showView) !== FALSE;
							} else {
								$this->settings[$model]['showNavigation'][$showView] = TRUE;
							}
						} else {
							$this->settings[$model]['showNavigation'][$showView] = FALSE;
						}
					} else {
						if($this->settings[$model]['showNavigation']['views']) {
							$this->settings[$model]['showNavigation'][$showView] = strpos($this->settings[$model]['showNavigation']['views'], $showView) !== FALSE;
						} else {
							$this->settings[$model]['showNavigation'][$showView] = TRUE;
						}
					}
					if($this->settings[$model]['showNavigation'][$showView] && !$showNavigationEnabled) {
						$showNavigationEnabled = TRUE;
					}
				}
				$this->settings[$model]['showNavigation']['enabled'] = $showNavigationEnabled;
			}
		}
		
	}