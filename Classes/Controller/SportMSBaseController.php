<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Club;
    use ChristianKnell\Sportms\Domain\Model\Competition;
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeason;
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeasonGameday;
    use ChristianKnell\Sportms\Domain\Model\Game;
    use ChristianKnell\Sportms\Domain\Model\Person;
    use ChristianKnell\Sportms\Domain\Model\Season;
    use ChristianKnell\Sportms\Domain\Model\Team;
    use ChristianKnell\Sportms\Domain\Model\TeamSeason;
    use TYPO3\CMS\Core\Utility\GeneralUtility;
    use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

    class SportMSBaseController extends ActionController
    {
        
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
                } else {
                    if ($this->settings[$selectModel]['uid']) {
                        $this->settings[$selectModel]['selectbox']['selected'] = $this->settings[$selectModel]['uid'];
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
                        \TYPO3\CMS\Core\Utility\DebugUtility::debug($selectBoxValues,
                            'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
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
            return ($useSelected && ($this->settings[$model]['selectbox']['selected'])) ? $this->settings[$model]['selectbox']['selected'] : (($this->settings[$model][$model . "s"] != '') ? $this->settings[$model][$model . "s"] : null);
        }
        
        protected function getSportsFilter($useSelected = true)
        {
            return $this->getFilter('sport', $useSelected);
        }
        
        protected function getSportAgeGroupsFilter($useSelected = true)
        {
            return $this->getFilter('sportAgeGroup', $useSelected);
        }
        
        protected function getSportAgeLevelsFilter($useSelected = true)
        {
            return $this->getFilter('sportAgeLevel', $useSelected);
        }
        
        protected function getCompetitionTypesFilter($useSelected = true)
        {
            return $this->getFilter('competitionType', $useSelected);
        }
        
        protected function getCompetitionsFilter($useSelected = true)
        {
            return $this->getFilter('competition', $useSelected);
        }
        
        protected function getSeasonsFilter($useSelected = true)
        {
            return $this->getFilter('season', $useSelected);
        }
        
        protected function getTeamsFilter($useSelected = true)
        {
            return $this->getFilter('team', $useSelected);
        }
        
        protected function getCompetitionSeasonGamedaysFilter($useSelected = true)
        {
            return $this->getFilter('competitionSeasonGameDay', $useSelected);
        }
        
        protected function getPersonsFilter($useSelected = true)
        {
            return $this->getFilter('person', $useSelected);
        }
        
        protected function getSportPositionGroupsFilter($useSelected = true)
        {
            return $this->getFilter('sportPositionGroup', $useSelected);
        }
        
        protected function getSportPositionsFilter($useSelected = true)
        {
            return $this->getFilter('sportPosition', $useSelected);
        }
        
        protected function getVenuesFilter($useSelected = true)
        {
            return $this->getFilter('venue', $useSelected);
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
            return $this->determineDetailModel('person');
        }
        
        protected function determineDetailModel(string $model)
        {
            if ($this->request->hasArgument($model)) {
                return $this->request->getArgument($model);
            } else {
                if ($this->settings[$model]['uid']) {
                    $modelUid = $this->settings[$model]['uid'];
                    switch ($model) {
                        case 'club':
                            $repository = $this->clubRepository;
                            break;
                        case 'competition':
                            $repository = $this->competitionRepository;
                            break;
                        case 'game':
                            $repository = $this->gameRepository;
                            break;
                        case 'person':
                            $repository = $this->personRepository;
                            break;
                        case 'season':
                            $repository = $this->seasonRepository;
                            break;
                        case 'team':
                            $repository = $this->teamRepository;
                            break;
                    }
                    return $repository->findByUid($modelUid);
                } else {
                    // TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM AND GIVEN VIA REQUEST
                }
            }
        }
        
        /**
         * @return Season|null
         */
        protected function determineSeason(): ?Season
        {
            return $this->determineDetailModel('season');
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
            // TODO: SET PAGETITLE
        }
        
        /**
         * @param Club|null $club
         * @return Club
         */
        protected function assignClubToView(Club $club = null): Club
        {
            if ($club === null) {
                $club = $this->determineClub();
            }
            $this->view->assign('club', $club);
            return $club;
        }
        
        /**
         * @return Club
         */
        protected function determineClub(): Club
        {
            return $this->determineDetailModel('club');
        }
        
        protected function assignCompetitionToView(Competition $competition = null): Competition
        {
            if ($competition === null) {
                $competition = $this->determineCompetition();
            }
            $this->view->assign('competition', $competition);
            return $competition;
        }
        
        /**
         * @return Competition
         */
        protected function determineCompetition(): Competition
        {
            return $this->determineDetailModel('competition');
        }
        
        /**
         * @param Competition $competition
         * @param Season $season
         */
        protected function assignCompetitionSeasonToView(Competition $competition, Season $season): CompetitionSeason
        {
            $competitionSeason = $this->competitionSeasonRepository->findByCompetitionAndSeason($competition, $season);
            $this->view->assign('competitionSeason', $competitionSeason);
            return $competitionSeason;
        }
        
        /**
         * @param Game|null $game
         * @return Game
         */
        protected function assignGameToView(Game $game = null): Game
        {
            if ($game === null) {
                $game = $this->determineGame();
            }
            $this->view->assign('game', $game);
            return $game;
        }
        
        /**
         * @return Game
         */
        protected function determineGame(): Game
        {
            return $this->determineDetailModel('game');
        }
        
        /**
         * @param Team|null $team
         * @return Team
         */
        protected function assignTeamToView(Team $team = null): Team
        {
            if ($team === null) {
                $team = $this->determineTeam();
            }
            $this->view->assign('team', $team);
            return $team;
        }
        
        /**
         * @return Team
         */
        protected function determineTeam(): Team
        {
            return $this->determineDetailModel('team');
        }
        
    }
