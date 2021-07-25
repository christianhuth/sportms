<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\CompetitionSeason;
    use Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday;
    use Balumedien\Sportms\Domain\Model\TeamSeason;
    use Balumedien\Sportms\PageTitle\PageTitleProvider;
    use TYPO3\CMS\Core\Utility\GeneralUtility;
    use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

    class SportMSBaseController extends ActionController
    {
        
        protected function getClubsFilter($useSelected = true)
        {
            return $this->getFilter('club', 'clubs', $useSelected);
        }
        
        protected function getFilter($key1, $key2, $useSelected)
        {
            return ($useSelected && ($this->settings[$key1]['selected'])) ? $this->settings[$key1]['selected'] : $this->settings[$key1][$key2];
        }
        
        protected function getCompetitionsFilter($useSelected = true)
        {
            return $this->getFilter('competition', 'competitions', $useSelected);
        }
        
        protected function getCompetitionTypesFilter($useSelected = true)
        {
            return $this->getFilter('competitionType', 'competitionTypes', $useSelected);
        }
        
        protected function getCompetitionSeasonGamedaysFilter($useSelected = true)
        {
            return $this->getFilter('competitionSeasonGameDay', 'competitionSeasonGameDays', $useSelected);
        }
        
        protected function getPersonsFilter($useSelected = true)
        {
            return $this->getFilter('person', 'persons', $useSelected);
        }
        
        protected function getSeasonsFilter($useSelected = true)
        {
            return $this->getFilter('season', 'seasons', $useSelected);
        }
        
        protected function getSportsFilter($useSelected = true)
        {
            return $this->getFilter('sport', 'sports', $useSelected);
        }
        
        protected function getSportAgeGroupsFilter($useSelected = true)
        {
            return $this->getFilter('sportAgeGroup', 'sportAgeGroups', $useSelected);
        }
        
        protected function getSportPositionGroupsFilter($useSelected = true)
        {
            return $this->getFilter('sportPositionGroup', 'sportPositionGroups', $useSelected);
        }
        
        protected function getSportPositionsFilter($useSelected = true)
        {
            return $this->getFilter('sportPosition', 'sportPositions', $useSelected);
        }
        
        protected function getSportAgeLevelsFilter($useSelected = true)
        {
            return $this->getFilter('sportAgeLevel', 'sportAgeLevels', $useSelected);
        }
        
        protected function getTeamsFilter($useSelected = true)
        {
            return $this->getFilter('team', 'teams', $useSelected);
        }
        
        protected function getVenuesFilter($useSelected = true)
        {
            return $this->getFilter('venue', 'venues', $useSelected);
        }
        
        protected function mapRequestsToSettings(): void
        {
            /* SelectModel */
            $listOfSelectModels = 'sport,sportAgeGroup,sportAgeLevel,competitionType,competition,club,team,season,competitionSeasonGameday';
            foreach (explode(',', $listOfSelectModels) as $selectModel) {
                if ($this->request->hasArgument('select' . ucfirst($selectModel))) {
                    $selectedValue = $this->request->getArgument('select' . ucfirst($selectModel));
                    if (is_array($selectedValue)) {
                        $this->settings[$selectModel]['selected'] = $selectedValue['__identity'];
                    } else {
                        $this->settings[$selectModel]['selected'] = $selectedValue;
                    }
                }
            }
            /* BugFix, if the sportAgeGroup has been cleared but not the sportAgeLevel */
            if (!$this->settings['sportAgeGroup']['selected']) {
                $this->settings['sportAgeLevel']['selected'] = '';
            }
            /* BugFix, if the sportPositionGroup has been cleared but not the sportPosition */
            if (!$this->settings['sportPositionGroup']['selected']) {
                $this->settings['sportPosition']['selected'] = '';
            }
            /* ShowView */
            if ($this->request->hasArgument('showView') && $this->request->hasArgument('controller')) {
                $model = lcfirst($this->request->getArgument('controller'));
                $this->settings[$model]['showView']['current'] = $this->request->getArgument('showView');
            }
        }
        
        protected function determineShowViews($model, $listOfPossibleShowViews): void
        {
            foreach (explode(',', $listOfPossibleShowViews) as $showView) {
                $this->settings[$model]['showView'][$showView] = ($this->settings[$model]['showViews']) ? strpos($this->settings[$model]['showViews'],
                        $showView) !== false : true;
            }
        }
        
        protected function determineShowView($model): void
        {
            if (!$this->settings[$model]['showView']['current']) {
                $this->settings[$model]['showView']['current'] = ($this->settings[$model]['showViews']) ? explode(',',
                    $this->settings[$model]['showViews'])[0] : 'profile';
            }
        }
        
        /**
         * @return CompetitionSeason
         */
        protected function determineCompetitionSeason(): CompetitionSeason
        {
            if ($this->settings['competitionseason']['uid']) {
                $competitionSeasonUid = $this->settings['competitionseason']['uid'];
                return $this->competitionSeasonRepository->findByUid($competitionSeasonUid);
            } else {
                if ($this->request->hasArgument('competitionSeason')) {
                    $competitionSeason = $this->request->getArgument('competitionSeason');
                    if ($competitionSeason instanceof CompetitionSeason) {
                        return $competitionSeason;
                    } else {
                        return $this->competitionSeasonRepository->findByUid($competitionSeason);
                    }
                } else {
                    // TODO: DIE IF NO COMPETITIONSEASON IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
            }
        }
        
        /**
         * @return CompetitionSeasonGameday
         */
        protected function determineCompetitionSeasonGameday(): CompetitionSeasonGameday
        {
            if ($this->settings['competitionseasongameday']['uid']) {
                $competitionSeasonGamedayUid = $this->settings['competitionseasongameday']['uid'];
                return $this->competitionSeasonGamedayRepository->findByUid($competitionSeasonGamedayUid);
            } else {
                if ($this->request->hasArgument('competitionSeasonGameday')) {
                    $competitionSeasonGameday = $this->request->getArgument('competitionSeasonGameday');
                    if ($competitionSeasonGameday instanceof CompetitionSeasonGameday) {
                        return $competitionSeasonGameday;
                    } else {
                        return $this->competitionSeasonGamedayRepository->findByUid($competitionSeasonGameday);
                    }
                } else {
                    // TODO: DIE IF NO COMPETITIONSEASONGAMEDAY IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
            }
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Person
         */
        protected function determinePerson(): \Balumedien\Sportms\Domain\Model\Person
        {
            # check if a person is defined via flexform
            if ($this->settings['person']['uid']) {
                $personUid = $this->settings['person']['uid'];
                return $this->personRepository->findByUid($personUid);
            } else {
                if ($this->request->hasArgument('person')) {
                    return $this->request->getArgument('person');
                } else {
                    // TODO: DIE IF NO PERSON IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
            }
        }
    
        /**
         * @return \Balumedien\Sportms\Domain\Model\Season|null
         */
        protected function determineSeason(): ?\Balumedien\Sportms\Domain\Model\Season
        {
            if ($this->settings['season']['uid']) {
                $seasonUid = $this->settings['season']['uid'];
                return $this->seasonRepository->findByUid($seasonUid);
            } else {
                if ($this->request->hasArgument('season')) {
                    return $this->request->getArgument('season');
                } else {
                    return null;
                    // TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
            }
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Team
         */
        protected function determineTeam(): \Balumedien\Sportms\Domain\Model\Team
        {
            if ($this->settings['team']['uid']) {
                $teamUid = $this->settings['team']['uid'];
                return $this->teamRepository->findByUid($teamUid);
            } else {
                if ($this->request->hasArgument('team')) {
                    return $this->request->getArgument('team');
                } else {
                    // TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
            }
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\TeamSeason
         */
        protected function determineTeamSeason(): \Balumedien\Sportms\Domain\Model\TeamSeason
        {
            if ($this->settings['teamseason']['uid']) {
                $teamSeasonUid = $this->settings['teamseason']['uid'];
                return $this->teamSeasonRepository->findByUid($teamSeasonUid);
            } else {
                if ($this->request->hasArgument('teamSeason')) {
                    $teamSeason = $this->request->getArgument('teamSeason');
                    if ($teamSeason instanceof TeamSeason) {
                        return $teamSeason;
                    } else {
                        return $this->teamSeasonRepository->findByUid($teamSeason);
                    }
                } else {
                    if ($this->settings['team']['uid']) {
                        if ($this->settings['season']['uid']) {
                            return $this->teamSeasonRepository->findByTeamUidAndSeasonUid($this->settings['team']['uid'],
                                $this->settings['season']['uid']);
                        } else {
                            return $this->teamSeasonRepository->findCurrentByTeamUid($this->settings['team']['uid']);
                        }
                    } else {
                        // TODO: DIE IF NO TEAMSEASON IS SELECTED VIA FLEXFORM NOR GIVEN VIA REQUEST NOR A TEAM IS SELECTED
                    }
                }
            }
        }
        
        protected function pagetitle(string $part1, string $part2)
        {
            $pagetitle = "";
            if (!is_null($this->settings['pagetitle']['prefix'])) {
                $pagetitle .= $this->settings['pagetitle']['prefix'] . " ";
            }
            $pagetitle .= $part1;
            if (!empty($part2)) {
                $pagetitle .= " " . $this->settings['pagetitle']['seperator'] . " ";
                $pagetitle .= $part2;
            }
            if (!is_null($this->settings['pagetitle']['suffix'])) {
                $pagetitle .= " " . $this->settings['pagetitle']['suffix'];
            }
            $pageTitle = GeneralUtility::makeInstance(PageTitleProvider::class);
            $pageTitle->setTitle($pagetitle);
        }
        
    }