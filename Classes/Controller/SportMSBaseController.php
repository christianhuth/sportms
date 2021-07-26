<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Competition;
    use Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday;
    use Balumedien\Sportms\Domain\Model\Person;
    use Balumedien\Sportms\Domain\Model\Season;
    use Balumedien\Sportms\Domain\Model\Team;
    use Balumedien\Sportms\Domain\Model\TeamSeason;
    use Balumedien\Sportms\PageTitle\PageTitleProvider;
    use TYPO3\CMS\Core\Utility\GeneralUtility;
    use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
    
    class SportMSBaseController extends ActionController
    {
        
        /**
         * @param string $model
         * @param string|null $callingController
         * @throws InvalidQueryException
         */
        protected function assignSelectboxValues(string $model): void
        {
            if ($this->settings[$model]['selectbox']['enabled']) {
                switch ($model) {
                    case "club":
                        $selectBoxValues = $this->clubRepository->findAll($this->getClubsFilter(false));
                        break;
                    case "competition":
                        $selectBoxValues = $this->competitionRepository->findAll($this->getSportsFilter(),
                            $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                            $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(false)
                        );
                        break;
                    case "competitionType":
                        $selectBoxValues = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(false));
                        break;
                    case "season":
                        $selectBoxValues = $this->seasonRepository->findAll($this->getSeasonsFilter(false));
                        break;
                    case "sport":
                        $selectBoxValues = $this->sportRepository->findAll($this->getSportsFilter(false));
                        break;
                    case "sportAgeGroup":
                        $selectBoxValues = $this->sportAgeGroupRepository->findAll($this->getSportsFilter(),
                            $this->getSportAgeGroupsFilter(false));
                        break;
                    case "sportAgeLevel":
                        $selectBoxValues = $this->sportAgeLevelRepository->findAll($this->getSportsFilter(),
                            $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(false));
                        break;
                    case "team":
                        $selectBoxValues = $this->teamRepository->findAll($this->getSportsFilter(),
                            $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getClubsFilter(),
                            $this->getTeamsFilter(false));
                        break;
                }
                $this->view->assign($model . 'SelectboxValues', $selectBoxValues);
            }
        }
        
        protected function getClubsFilter($useSelected = true)
        {
            return $this->getFilter('club', $useSelected);
        }
        
        protected function getFilter($model, $useSelected)
        {
            return ($useSelected && ($this->settings[$model]['selectbox']['selected'])) ? $this->settings[$model]['selectbox']['selected'] : $this->settings[$model][$model . "s"];
        }
        
        protected function getCompetitionsFilter($useSelected = true)
        {
            return $this->getFilter('competition', $useSelected);
        }
        
        protected function getCompetitionTypesFilter($useSelected = true)
        {
            return $this->getFilter('competitionType', $useSelected);
        }
        
        protected function getCompetitionSeasonGamedaysFilter($useSelected = true)
        {
            return $this->getFilter('competitionSeasonGameDay', $useSelected);
        }
        
        protected function getPersonsFilter($useSelected = true)
        {
            return $this->getFilter('person', $useSelected);
        }
        
        protected function getSeasonsFilter($useSelected = true)
        {
            return $this->getFilter('season', $useSelected);
        }
        
        protected function getSportsFilter($useSelected = true)
        {
            return $this->getFilter('sport', $useSelected);
        }
        
        protected function getSportAgeGroupsFilter($useSelected = true)
        {
            return $this->getFilter('sportAgeGroup', $useSelected);
        }
        
        protected function getSportPositionGroupsFilter($useSelected = true)
        {
            return $this->getFilter('sportPositionGroup', $useSelected);
        }
        
        protected function getSportPositionsFilter($useSelected = true)
        {
            return $this->getFilter('sportPosition', $useSelected);
        }
        
        protected function getSportAgeLevelsFilter($useSelected = true)
        {
            return $this->getFilter('sportAgeLevel', $useSelected);
        }
        
        protected function getTeamsFilter($useSelected = true)
        {
            return $this->getFilter('team', $useSelected);
        }
        
        protected function getVenuesFilter($useSelected = true)
        {
            return $this->getFilter('venue', $useSelected);
        }
        
        /**
         * Initializes the controller before invoking an action method.
         * Use this method to solve tasks which all actions have in common.
         */
        public function initializeAction(): void
        {
            $this->mapRequestsToSettings();
        }
        
        protected function mapRequestsToSettings(): void
        {
            /* SelectModel */
            $listOfSelectModels = 'sport,sportAgeGroup,sportAgeLevel,competitionType,competition,club,team,season,competitionSeasonGameday';
            foreach (explode(',', $listOfSelectModels) as $selectModel) {
                if ($this->request->hasArgument($selectModel)) {
                    $selectedValue = $this->request->getArgument($selectModel);
                    if (is_array($selectedValue)) {
                        $this->settings[$selectModel]['selectbox']['selected'] = $selectedValue['__identity'];
                    } else {
                        $this->settings[$selectModel]['selectbox']['selected'] = $selectedValue;
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
        }
        
        /**
         * @return Competition
         */
        protected function determineCompetition(): Competition
        {
            if ($this->settings['competition']['uid']) {
                $competitionUid = $this->settings['competition']['uid'];
                return $this->competitionRepository->findByUid($competitionUid);
            } else {
                if ($this->request->hasArgument('competition')) {
                    return $this->request->getArgument('competition');
                } else {
                    // TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
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
         * @return Person
         */
        protected function determinePerson(): Person
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
         * @return Season|null
         */
        protected function determineSeason(): ?Season
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
         * @return Team
         */
        protected function determineTeam(): Team
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
         * @return TeamSeason
         */
        protected function determineTeamSeason(): TeamSeason
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