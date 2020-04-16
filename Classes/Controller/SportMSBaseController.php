<?php
	
	namespace Balumedien\Sportms\Controller;
	
	class SportMSBaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		protected function getClubsFilter($useSelected = TRUE) {
			return $this->getFilter('club', 'clubs', $useSelected);
		}
		
		protected function getCompetitionsFilter($useSelected = TRUE) {
			return $this->getFilter('competition', 'competitions', $useSelected);
		}
		
		protected function getCompetitionTypesFilter($useSelected = TRUE) {
			return $this->getFilter('competitionType', 'competitionTypes', $useSelected);
		}
		
		protected function getCompetitionSeasonGamedaysFilter($useSelected = TRUE) {
			return $this->getFilter('competitionSeasonGameDay', 'competitionSeasonGameDays', $useSelected);
		}
		
		protected function getPersonsFilter($useSelected = TRUE) {
			return $this->getFilter('person', 'persons', $useSelected);
		}
		
		protected function getSeasonsFilter($useSelected = TRUE) {
			return $this->getFilter('season', 'seasons', $useSelected);
		}
		
		protected function getSportsFilter($useSelected = TRUE) {
			return $this->getFilter('sport', 'sports', $useSelected);
		}
		
		protected function getSportAgeGroupsFilter($useSelected = TRUE) {
			return $this->getFilter('sportAgeGroup', 'sportAgeGroups', $useSelected);
		}
		
		protected function getSportAgeLevelsFilter($useSelected = TRUE) {
			return $this->getFilter('sportAgeLevel', 'sportAgeLevels', $useSelected);
		}
		
		protected function getTeamsFilter($useSelected = TRUE) {
			return $this->getFilter('team', 'teams', $useSelected);
		}
		
		protected function getVenuesFilter($useSelected = TRUE) {
			return $this->getFilter('venue', 'venues', $useSelected);
		}
		
		protected function getFilter($key1, $key2, $useSelected) {
			return ($useSelected && ($this->settings[$key1]['selected'])) ? $this->settings[$key1]['selected'] : $this->settings[$key1][$key2];
		}
		
		protected function mapRequestsToSettings(): void {
			/* SelectModel */
			$listOfSelectModels = 'sport,sportAgeGroup,sportAgeLevel,competitionType,competition,club,team,season,competitionSeasonGameday';
			foreach(explode(',', $listOfSelectModels) as $selectModel) {
				if($this->request->hasArgument('select' . ucfirst($selectModel))) {
					$this->settings[$selectModel]['selected'] = $this->request->getArgument('select' . ucfirst($selectModel));
				}
			}
			/* BugFix, if the sportAgeGroup has been cleared but not the sportAgeLevel */
			if(!$this->settings['sportAgeGroup']['selected']) {
				$this->settings['sportAgeLevel']['selected'] = '';
			}
			/* BugFix, if the sportPositionGroup has been cleared but not the sportPosition */
			if(!$this->settings['sportPositionGroup']['selected']) {
				$this->settings['sportPosition']['selected'] = '';
			}
			/* ShowView */
			if($this->request->hasArgument('showView') && $this->request->hasArgument('controller')) {
				$model = lcfirst($this->request->getArgument('controller'));
				$this->settings[$model]['showView']['current'] = $this->request->getArgument('showView');
			}
		}
		
		protected function determineShowViews($model, $listOfPossibleShowViews): void {
			foreach(explode(',', $listOfPossibleShowViews) as $showView) {
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
				foreach(explode(',', $listOfPossibleShowViews) as $showView) {
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
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Team
		 */
		protected function determineTeamFromFlexform(): ?\Balumedien\Sportms\Domain\Model\Team {
			if($this->settings['team']['uid']) {
				$teamUid = $this->settings['team']['uid'];
				return $this->teamRepository->findByUid($teamUid);
			} else {
				// TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM
			}
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\TeamSeason
		 */
		protected function determineTeamSeasonFromFlexform(): ?\Balumedien\Sportms\Domain\Model\TeamSeason {
			if($this->settings['teamseason']['uid']) {
				$teamSeasonUid = $this->settings['teamseason']['uid'];
				return $this->teamSeasonRepository->findByUid($teamSeasonUid);
			} else {
				// TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM
			}
		}
		
	}