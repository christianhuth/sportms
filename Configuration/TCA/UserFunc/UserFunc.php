<?php
	
	namespace Balumedien\Sportms\Configuration\TCA\UserFunc;
	
	class UserFunc {
		
		public function addressLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['street'] . " " . $record['housenumber'] . " (";
            if($record['zipcode']) {
                $newLabel .= $record['zipcode'] . " ";
            }
            $newLabel .= $record['location'] . ")";
			$parameters['title'] = $newLabel;
		}

		public function clubMembersLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['members'] . " Mitglieder " . "(" . date("d.m.Y", $record['date']) . ")";
			$parameters['title'] = $newLabel;
		}

		public function clubOfficialLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person']);
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_clubofficialjob", $record['club_official_job']);
			$newLabel = $officialJob['label'] . ": " . $person['firstname'] . " " . $person['lastname'];
			$parameters['title'] = $newLabel;
		}
		
		public function clubSectionLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$club = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_club", $record['club']);
			$newLabel = $club['name'] . ": " . $record['label'];
			$parameters['title'] = $newLabel;
		}

		public function clubSectionOfficialLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person']);
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_clubsectionofficialjob", $record['club_section_official_job']);
			$newLabel = $officialJob['label'] . ": " . $person['firstname'] . " " . $person['lastname'];
			$parameters['title'] = $newLabel;
		}

        public function competitionLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $sport = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_sport", $record['sport']);
            $competitionType = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_competitiontype", $record['competition_type']);
            $sportAgeLevel = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_sportagelevel", $record['sport_age_level']);
            $newLabel = $record['name'] . " (" . $sport['label'] . " - " . $competitionType['label'] . " - " . $sportAgeLevel['label'] . ")";
            $parameters['title'] = $newLabel;
        }

        public function competitionSeasonLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $competition = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_competition", $record['competition']);
            $season = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_season", $record['season']);
            $newLabel = $competition['name'] . " (" . $season['season_name'] . ")";
            $parameters['title'] = $newLabel;
        }

		public function competitionSeasonGamedayLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['label'];
			if($record['startdate'] || $record['enddate']) {
				if($record['startdate']) {
					$newLabel .= " (" . date("d.m.Y", $record['startdate']);
					if($record['enddate']) {
						$newLabel .= " - " . date("d.m.Y", $record['enddate']);
					}
					$newLabel .= ")";
				} else {
					$newLabel .= "( - " . date("d.m.Y", $record['enddate']) . ")";
				}
			}
			$parameters['title'] = $newLabel;
		}

        public function gameLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $competitionSeason = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_competitionseason", $record['competition_season']);
            $competition = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_competition", $competitionSeason['competition']);
            $season = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_season", $competitionSeason['season']);
            $teamSeasonHome = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_teamseason", $record['team_season_home']);
            $teamHome = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_team", $teamSeasonHome['team']);
            $teamSeasonGuest = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_teamseason", $record['team_season_guest']);
            $teamGuest = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_team", $teamSeasonGuest['team']);
            $newLabel = $competition['name'] . " (" . $season['season_name_very_short']. "): " . $teamHome['name'] . " - " . $teamGuest['name'];
            $parameters['title'] = $newLabel;
        }

		public function gameChangeLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$personIn = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person_in']);
			$personOut = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person_out']);
			$newLabel = '';
			if($personIn) {
				$newLabel .= $personIn['lastname'] . ', ' . $personIn['firstname'];
			}
			if($personIn && $personOut) {
				$newLabel .= ' <-> ';
			}
			if($personOut) {
				$newLabel .= $personOut;
			}
			$newLabel .= ' (' . $record['minute'] . '.)';
			$parameters['title'] = $newLabel;
		}

		public function gameGoalLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			if($record['scorer']) {
				$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['scorer']);
				$newLabel = $record['goal_home'] . ":" . $record['goal_guest'] . " - " . $person['lastname'] . ", " . $person['firstname'] . " (" . $record['minute'] . ".)";
			} else {
				$newLabel = $record['goal_home'] . ":" . $record['goal_guest'] .  " (" . $record['minute'] . ".)";
			}
			$parameters['title'] = $newLabel;
		}

        public function gameLineupLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
	        $person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person']);
            $newLabel = $person['lastname'] . ", " . $person['firstname'];
            if($record['jersey_number']) {
                $newLabel .= " (" . $record['jersey_number'] . ")";
            }
	        if($record['sport_position']) {
		        $sportPosition = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_sportposition", $record['sport_position']);
		        $newLabel .= " (" . $sportPosition['label_short'] . ")";
	        }
            $parameters['title'] = $newLabel;
        }

		public function gamePeriodLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['label'] . " (" . $record['duration'] . " Minuten)";
			$parameters['title'] = $newLabel;
		}

		public function gamePunishmentLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$gameLineup = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_gamelineup", $record['punished_person']);
			$teamSeasonSquadMemberPunished = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_teamseasonsquadmember", $gameLineup['team_season_squad_member']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $teamSeasonSquadMemberPunished['person']);
			$newLabel = $person['lastname'] . ", " . $person['firstname'];
			if($record['minute']) {
				$newLabel .= " (" . $record['minute'] . ".)";
			}
			if($record['type']) {
				switch ($record['type']) {
					case 1: $newLabel .= ": " . "Gelbe Karte"; break;
					case 2: $newLabel .= ": " . "Gelbrote Karte"; break;
					case 3: $newLabel .= ": " . "Rote Karte"; break;
					case 4: $newLabel .= ": " . "Zeitstrafte"; break;
				}
			}
			$parameters['title'] = $newLabel;
		}

        public function gameRefereeLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $refereeJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_refereejob", $record['referee_job']);
            $person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person']);
            $newLabel = $refereeJob['label'] . ": " . $person['lastname'] . ", " . $person['firstname'];
            $parameters['title'] = $newLabel;
        }

		public function gameResultSetLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['number'] . ".Satz: " . $record['result_home'] . " : " . $record['result_guest'];
			$parameters['title'] = $newLabel;
		}

        public function mailLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['mail'];
            if($record['mail_type']) {
                $mailType = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_mailtype", $record['mail_type']);
                $newLabel .= " (" . $mailType['label'] . ")";
            }
            $parameters['title'] = $newLabel;
        }
		
		public function personProfileLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$sport = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_sport", $record['sport']);
			$profile_type = $record['profile_type'];
			switch($profile_type) {
				case "official": $profile_type = "FunktionärIn"; break;
				case "player": $profile_type = "SpielerIn"; break;
				case "referee": $profile_type = "SchiedsrichterIn"; break;
			}
			$newLabel = $sport['label'] . " (" . $profile_type . ")";
			$parameters['title'] = $newLabel;
		}
		
		public function phoneLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['area_code'] . " / " . $record['calling_number'];
            if($record['phone_type']) {
                $phoneType = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_phonetype", $record['phone_type']);
                $newLabel .= " (" . $phoneType['label'] . ")";
            }
			$parameters['title'] = $newLabel;
		}
		
		public function sportAgeGroupLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['label'];
			if($record['short']) {
				$newLabel .= ' (' . $record['short'] . ')';
			}
			$parameters['title'] = $newLabel;
		}
		
		public function sportAgeLevelLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['label'];
			if($record['short']) {
				$newLabel .= ' (' . $record['short'] . ')';
			}
			$parameters['title'] = $newLabel;
		}
		
		public function sportPositionLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['label'];
			if($record['label_short']) {
				$newLabel .= ' (' . $record['label_short'] . ')';
			}
			$parameters['title'] = $newLabel;
		}

		public function teamSeasonLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$team = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_team", $record['team']);
			$season = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_season", $record['season']);
			$newLabel = $team['name'] . " (" . $season['season_name_short'] . ")";
			$parameters['title'] = $newLabel;
		}

		public function teamSeasonOfficialLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person']);
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_teamseasonofficialjob", $record['team_season_official_job']);
			$newLabel = $officialJob['label'] . ": " . $person['firstname'] . " " . $person['lastname'];
			$parameters['title'] = $newLabel;
		}
		
		public function teamSeasonPracticeLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['day'] . " (" . $record['time_start'] . " - " . $record['time_end'] . " Uhr)";
			$parameters['title'] = $newLabel;
		}
		
		public function teamSeasonSquadMemberLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_person", $record['person']);
            $sportPositionGroup = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_sportpositiongroup", $record['sport_position_group']);
            $newLabel = $sportPositionGroup['label'] . ": " . $person['lastname'] . ", " . $person['firstname'];
            if($record['squad_number'] != null) {
                $newLabel .= " (" . $record['squad_number'] . ")";
            }
			$parameters['title'] = $newLabel;
		}

        public function venueLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = '';
            if($record['club']) {
                $club = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_sportms_domain_model_club", $record['club']);
                $newLabel .= $club['name'] . " - ";
            }
            $newLabel .= $record['name'];
            $parameters['title'] = $newLabel;
        }
		
	}
	
?>