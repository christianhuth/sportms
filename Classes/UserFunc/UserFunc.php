<?php
    
    namespace Balumedien\Sportms\UserFunc;
    
    use TYPO3\CMS\Backend\Utility\BackendUtility;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    class UserFunc
    {
        
        public function addressLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['street'] . ' ' . $record['housenumber'] . ' (';
            if ($record['zipcode']) {
                $newLabel .= $record['zipcode'] . ' ';
            }
            $newLabel .= $record['location'] . ')';
            $parameters['title'] = $newLabel;
        }
        
        public function clubMembersLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = date('d.m.Y',
                    $record['date']) . ':' . $record['members'] . ' ' . LocalizationUtility::translate('tx_sportms_domain_model_clubmembers.members',
                    'sportms');
            $parameters['title'] = $newLabel;
        }
        
        public function clubSectionMembersLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = date('d.m.Y',
                    $record['date']) . ':' . $record['members'] . ' ' . LocalizationUtility::translate('tx_sportms_domain_model_clubsectionmembers.members',
                    'sportms');
            $parameters['title'] = $newLabel;
        }
        
        public function clubOfficialLabel(&$parameters, $parentObject): void
        {
            $parameters['title'] = $this->officialLabel($parameters, $parentObject);
        }
        
        private function officialLabel(&$parameters, $parentObject): string
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $profileLabel = $this->profileLabel($record['person_profile']);
            $officialJob = BackendUtility::getRecord('tx_sportms_domain_model_officialjob',
                $record['official_job']);
            return $officialJob['label'] . ': ' . $profileLabel;
        }
        
        private function profileLabel(?int $personProfileUid): string
        {
            if ($personProfileUid) {
                $personProfile = BackendUtility::getRecord('tx_sportms_domain_model_personprofile', $personProfileUid);
                $person = BackendUtility::getRecord('tx_sportms_domain_model_person', $personProfile['person']);
                return $person['lastname'] . ', ' . $person['firstname'];
            } else {
                # TODO: USE LOCALIZATION
                return "Please select Person from dropdown";
            }
        }
        
        public function clubSectionLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $club = BackendUtility::getRecord('tx_sportms_domain_model_club', $record['club']);
            $newLabel = $club['name'] . ': ' . $record['label'];
            $parameters['title'] = $newLabel;
        }
        
        public function clubSectionOfficialLabel(&$parameters, $parentObject): void
        {
            $parameters['title'] = $this->officialLabel($parameters, $parentObject);
        }
        
        public function competitionLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $sport = BackendUtility::getRecord('tx_sportms_domain_model_sport', $record['sport']);
            $sportAgeLevel = BackendUtility::getRecord('tx_sportms_domain_model_sportagelevel',
                $record['sport_age_level']);
            $newLabel = $record['label'] . ' (' . $sport['label'] . ' - ' . $sportAgeLevel['label'] . ')';
            $parameters['title'] = $newLabel;
        }
        
        public function competitionSeasonLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $competition = BackendUtility::getRecord('tx_sportms_domain_model_competition', $record['competition']);
            $season = BackendUtility::getRecord('tx_sportms_domain_model_season', $record['season']);
            $newLabel = $competition['label'] . ' (' . $season['label'] . ')';
            $parameters['title'] = $newLabel;
        }
        
        public function competitionSeasonGamedayLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['label'];
            if ($record['startdate'] || $record['enddate']) {
                if ($record['startdate']) {
                    $newLabel .= ' (' . date('d.m.Y', $record['startdate']);
                    if ($record['enddate']) {
                        $newLabel .= ' - ' . date('d.m.Y', $record['enddate']);
                    }
                    $newLabel .= ')';
                } else {
                    $newLabel .= '( - ' . date('d.m.Y', $record['enddate']) . ')';
                }
            }
            $parameters['title'] = $newLabel;
        }
        
        public function gameLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $competitionSeason = BackendUtility::getRecord('tx_sportms_domain_model_competitionseason',
                $record['competition_season']);
            $competition = BackendUtility::getRecord('tx_sportms_domain_model_competition',
                $competitionSeason['competition']);
            $season = BackendUtility::getRecord('tx_sportms_domain_model_season', $competitionSeason['season']);
            $teamSeasonHome = BackendUtility::getRecord('tx_sportms_domain_model_teamseason',
                $record['team_season_home']);
            $teamHome = BackendUtility::getRecord('tx_sportms_domain_model_team', $teamSeasonHome['team']);
            $teamSeasonGuest = BackendUtility::getRecord('tx_sportms_domain_model_teamseason',
                $record['team_season_guest']);
            $teamGuest = BackendUtility::getRecord('tx_sportms_domain_model_team', $teamSeasonGuest['team']);
            $newLabel = $competition['label'] . ' (' . $season['abbreviation'] . '): ' . $teamHome['label'] . ' - ' . $teamGuest['label'];
            $parameters['title'] = $newLabel;
        }
        
        public function gameChangeLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $personProfileIn = BackendUtility::getRecord('tx_sportms_domain_model_personprofile', $record['person_in']);
            $personIn = BackendUtility::getRecord('tx_sportms_domain_model_person', $personProfileIn['person']);
            $personProfileOut = BackendUtility::getRecord('tx_sportms_domain_model_personprofile',
                $record['person_out']);
            $personOut = BackendUtility::getRecord('tx_sportms_domain_model_person', $personProfileOut['person']);
            $newLabel = '';
            if ($personIn) {
                $newLabel .= $personIn['lastname'];
            }
            if ($personIn && $personOut) {
                $newLabel .= ' <-> ';
            }
            if ($personOut) {
                $newLabel .= $personOut['lastname'];
            }
            $newLabel .= ' (' . $record['minute'] . '.)';
            $parameters['title'] = $newLabel;
        }
        
        public function gameGoalLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            if ($record['scorer']) {
                $profileLabel = $this->profileLabel($record['scorer']);
                $newLabel = $record['goal_home'] . ':' . $record['goal_guest'] . ' - ' . $profileLabel . ' (' . $record['minute'] . '.)';
            } else {
                $newLabel = $record['goal_home'] . ':' . $record['goal_guest'] . ' (' . $record['minute'] . '.)';
            }
            $parameters['title'] = $newLabel;
        }
        
        public function gameLineupLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $profileLabel = $this->profileLabel($record['person_profile']);
            $newLabel = $profileLabel;
            if ($record['sport_position']) {
                $sportPosition = BackendUtility::getRecord('tx_sportms_domain_model_sportposition',
                    $record['sport_position']);
                $newLabel .= ' (' . $sportPosition['label_short'] . ')';
            }
            if ($record['jersey_number']) {
                $newLabel .= ' (' . $record['jersey_number'] . ')';
            }
            $parameters['title'] = $newLabel;
        }
        
        public function gamePeriodLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['label'] . ' (' . $record['duration'] . ' Minuten)';
            $parameters['title'] = $newLabel;
        }
        
        public function gamePunishmentLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $person = BackendUtility::getRecord('tx_sportms_domain_model_person', $record['punished_person']);
            $newLabel = $person['lastname'] . ', ' . $person['firstname'];
            if ($record['minute']) {
                $newLabel .= ' (' . $record['minute'] . '.)';
            }
            if ($record['type']) {
                switch ($record['type']) {
                    # TODO: USE LOCALISATION
                    case 1:
                        $newLabel .= ': ' . 'Gelbe Karte';
                        break;
                    case 2:
                        $newLabel .= ': ' . 'Gelbrote Karte';
                        break;
                    case 3:
                        $newLabel .= ': ' . 'Rote Karte';
                        break;
                    case 4:
                        $newLabel .= ': ' . 'Zeitstrafe';
                        break;
                }
            }
            $parameters['title'] = $newLabel;
        }
        
        public function gameRefereeLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $refereeJob = BackendUtility::getRecord('tx_sportms_domain_model_refereejob', $record['referee_job']);
            $profileLabel = $this->profileLabel($record['person_profile']);
            $newLabel = $refereeJob['label'] . ': ' . $profileLabel;
            $parameters['title'] = $newLabel;
        }
        
        public function gameResultSetLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            # TODO: USE LOCALISATION
            $newLabel = $record['number'] . '.Satz: ' . $record['result_home'] . ' : ' . $record['result_guest'];
            $parameters['title'] = $newLabel;
        }
        
        public function personProfileLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $person = BackendUtility::getRecord('tx_sportms_domain_model_person', $record['person']);
            $newLabel = $person['lastname'] . ', ' . $person['firstname'];
            $parameters['title'] = $newLabel;
        }
        
        public function phoneLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['area_code'] . ' / ' . $record['calling_number'];
            if ($record['phone_type']) {
                $phoneType = BackendUtility::getRecord('tx_sportms_domain_model_phonetype', $record['phone_type']);
                $newLabel .= ' (' . $phoneType['label'] . ')';
            }
            $parameters['title'] = $newLabel;
        }
        
        public function teamSeasonLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $team = BackendUtility::getRecord('tx_sportms_domain_model_team', $record['team']);
            $season = BackendUtility::getRecord('tx_sportms_domain_model_season', $record['season']);
            $newLabel = $team['label'] . ' (' . $season['abbreviation'] . ')';
            $parameters['title'] = $newLabel;
        }
        
        public function teamSeasonOfficialLabel(&$parameters, $parentObject): void
        {
            $parameters['title'] = $this->officialLabel($parameters, $parentObject);
        }
        
        public function teamSeasonPracticeLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = LocalizationUtility::translate('tx_sportms_general.day.' . $record['day'],
                    'sportms') . ' (' . substr($record['time_start'], 0, 5) . ' - ' . substr($record['time_end'], 0,
                    5) . ' ' . LocalizationUtility::translate('tx_sportms_general.clock', 'sportms') . ')';
            $parameters['title'] = $newLabel;
        }
        
        public function teamSeasonSquadMemberLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $profileLabel = $this->profileLabel($record['person_profile']);
            $newLabel = $profileLabel;
            if ($record['sport_position_group']) {
                $sportPositionGroup = BackendUtility::getRecord('tx_sportms_domain_model_sportpositiongroup',
                    $record['sport_position_group']);
                $newLabel .= ' (' . $sportPositionGroup['label'] . ')';
            }
            if ($record['squad_number'] != null) {
                $newLabel .= ' (' . $record['squad_number'] . ')';
            }
            $parameters['title'] = $newLabel;
        }
        
        public function venueLabel(&$parameters, $parentObject): void
        {
            $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = '';
            if ($record['club']) {
                $club = BackendUtility::getRecord('tx_sportms_domain_model_club', $record['club']);
                $newLabel .= $club['name'] . ' - ';
            }
            $newLabel .= $record['name'];
            $parameters['title'] = $newLabel;
        }
        
    }