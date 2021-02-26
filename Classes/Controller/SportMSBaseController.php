<?php
	
	namespace Balumedien\Sportms\Controller;

	use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

    class SportMSBaseController extends ActionController {
		
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
		
		protected function getSportPositionGroupsFilter($useSelected = TRUE) {
			return $this->getFilter('sportPositionGroup', 'sportPositionGroups', $useSelected);
		}
		
		protected function getSportPositionsFilter($useSelected = TRUE) {
			return $this->getFilter('sportPosition', 'sportPositions', $useSelected);
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
				$this->settings[$model]['showView']['current'] = ($this->settings[$model]['showViews']) ? explode(',', $this->settings[$model]['showViews'])[0] : 'profile';
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
         * @return \Balumedien\Sportms\Domain\Model\Person
         */
        protected function determinePerson(): \Balumedien\Sportms\Domain\Model\Person {
            # check if a person is defined via flexform
            if($this->settings['person']['uid']) {
                $personUid = $this->settings['person']['uid'];
                return $this->personRepository->findByUid($personUid);
            } else {
                if($this->request->hasArgument('person')) {
                    return $this->request->getArgument('person');
                } else {
                    // TODO: DIE IF NO PERSON IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
            }
        }
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Team
		 */
		protected function determineTeam(): \Balumedien\Sportms\Domain\Model\Team {
			if($this->settings['team']['uid']) {
				$teamUid = $this->settings['team']['uid'];
				return $this->teamRepository->findByUid($teamUid);
			} else {
                if($this->request->hasArgument('team')) {
                    return $this->request->getArgument('team');
                } else {
                    // TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
			}
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\TeamSeason
		 */
		protected function determineTeamSeason(): \Balumedien\Sportms\Domain\Model\TeamSeason {
			if($this->settings['teamseason']['uid']) {
				$teamSeasonUid = $this->settings['teamseason']['uid'];
				return $this->teamSeasonRepository->findByUid($teamSeasonUid);
			} else {
                if($this->request->hasArgument('teamseason')) {
                    return $this->request->getArgument('teamseason');
                } else {
                    // TODO: DIE IF NO TEAMSEASON IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
			}
		}
		
	}