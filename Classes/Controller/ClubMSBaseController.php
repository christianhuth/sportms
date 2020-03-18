<?php
	
	namespace Balumedien\Clubms\Controller;
	
	class ClubMSBaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		protected function getClubsFilter($useSelected = TRUE) {
			return $this->getFilter('club', $useSelected);
		}
		
		protected function getCompetitionsFilter($useSelected = TRUE) {
			return $this->getFilter('competition', $useSelected);
		}
		
		protected function getSeasonsFilter() {
			return $this->settings['season']['seasons'];
		}
		
		protected function getSectionsFilter() {
			return $this->settings['section']['sections'];
		}
		
		protected function getSectionAgeGroupsFilter() {
			return $this->settings['section']['sectionAgeGroups'];
		}
		
		protected function getSectionAgeLevelsFilter() {
			return $this->settings['section']['sectionAgeLevels'];
		}
		
		protected function getTeamsFilter() {
			return $this->settings['team']['teams'];
		}
		
		protected function getFilter($model, $useSelected) {
			return ($useSelected) ? $this->settings[$model]['selected'] : $this->settings[$model][$model . 's'];
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