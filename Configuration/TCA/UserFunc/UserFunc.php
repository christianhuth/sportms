<?php
	
	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;
	
	class UserFunc {
		
		public function addressLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['street'] . " " . $record['housenumber'] . " (" . $record['zipcode'] . " " . $record['location'] . ")";
			$parameters['title'] = $newLabel;
		}

		public function clubMembersLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newLabel = $record['members'] . " Mitglieder " . "(" . date("d.m.Y", $record['date']) . ")";
			$parameters['title'] = $newLabel;
		}

		public function clubOfficialLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_clubofficialjob", $record['club_official_job']);
			$newLabel = $officialJob['label'] . ": " . $person['firstname'] . " " . $person['lastname'];
			$parameters['title'] = $newLabel;
		}

		public function clubSectionOfficialLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_clubsectionofficialjob", $record['club_section_official_job']);
			$newLabel = $officialJob['label'] . ": " . $person['firstname'] . " " . $person['lastname'];
			$parameters['title'] = $newLabel;
		}

        public function competitionLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $section = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_section", $record['section']);
            $competitionType = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_competitiontype", $record['competition_type']);
            $sectionAgeLevel = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_sectionagelevel", $record['section_age_level']);
            $newLabel = $record['name'] . " (" . $section['label'] . " - " . $competitionType['label'] . " - " . $sectionAgeLevel['label'] . ")";
            $parameters['title'] = $newLabel;
        }

        public function competitionSeasonLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $competition = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_competition", $record['competition']);
            $season = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_season", $record['season']);
            $newLabel = $competition['name'] . " (" . $season['season_name'] . ")";
            $parameters['title'] = $newLabel;
        }

        public function gameLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $teamSeasonHome = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_teamseason", $record['team_home']);
            $teamHome = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_team", $teamSeasonHome['team']);
            $teamSeasonGuest = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_teamseason", $record['team_guest']);
            $teamGuest = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_team", $teamSeasonGuest['team']);
            $newLabel = $teamHome['name'] . " - " . $teamGuest['name'];
            $parameters['title'] = $newLabel;
        }

        public function gameLineupLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $teamSeasonSquadMember = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_teamseasonsquadmember", $record['team_season_squad_member']);
            $person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $teamSeasonSquadMember['person']);
            $sectionPosition = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_sectionposition", $record['section_position']);
            $newLabel = $sectionPosition['label_short'] . ": " . $person['lastname'] . ", " . $person['firstname'];
            if($record['jersey_number']) {
                $newLabel .= " (" . $record['jersey_number'] . ")";
            }
            $parameters['title'] = $newLabel;
        }

        public function gameRefereeLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $refereeJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_refereejob", $record['referee_job']);
            $person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
            $newLabel = $refereeJob['label'] . ": " . $person['lastname'] . ", " . $person['firstname'];
            $parameters['title'] = $newLabel;
        }

        public function mailLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['mail'];
            if($record['mail_type']) {
                $mailType = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_mailtype", $record['mail_type']);
                $newLabel .= " (" . $mailType['label'] . ")";
            }
            $parameters['title'] = $newLabel;
        }
		
		public function phoneLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['area_code'] . " / " . $record['calling_number'];
            if($record['phone_type']) {
                $phoneType = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_phonetype", $record['phone_type']);
                $newLabel .= " (" . $phoneType['label'] . ")";
            }
			$parameters['title'] = $newLabel;
		}
		
		public function sectionPositionLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['label'] . " (" . $record['label_short'] . ")";
			$parameters['title'] = $newLabel;
		}

		public function teamSeasonLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$team = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_team", $record['team']);
			$season = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_season", $record['season']);
			$newLabel = $team['name'] . " (" . $season['season_name_short'] . ")";
			$parameters['title'] = $newLabel;
		}

		public function teamSeasonOfficialLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_teamseasonofficialjob", $record['team_season_official_job']);
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
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
            $sectionPositionGroup = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_sectionpositiongroup", $record['section_position_group']);
            $newLabel = $sectionPositionGroup['label'] . ": " . $person['lastname'] . ", " . $person['firstname'];
            if($record['squad_number'] != null) {
                $newLabel .= " (" . $record['squad_number'] . ")";
            }
			$parameters['title'] = $newLabel;
		}
		
	}
	
?>