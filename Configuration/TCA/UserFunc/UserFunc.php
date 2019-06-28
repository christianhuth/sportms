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
            $ageLevel = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_agelevel", $record['age_level']);
            $newLabel = $record['name'] . " (" . $section['label'] . " - " . $competitionType['label'] . " - " . $ageLevel['label'] . ")";
            $parameters['title'] = $newLabel;
        }

        public function competitionSeasonLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $competition = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_competition", $record['competition']);
            $season = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_season", $record['season']);
            $section = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_section", $competition['section']);
            $sectionAgeGroup = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_sectionagegroup", $competition['section_age_group']);
            $sectionAgeLevel = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_sectionagelevel", $competition['section_age_level']);
            $newLabel = $competition['name'] . " - " . $season['season_name'] . " (" . $section['label'] . " - " . $sectionAgeGroup['short'] . " - " . $sectionAgeLevel['label'] . ")";
            $parameters['title'] = $newLabel;
        }

        public function gameLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $teamHome = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_team", $record['team_home']);
            $teamGuest = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_team", $record['team_guest']);
            $newLabel = $teamHome['name'] . " - " . $teamGuest['name'];
            $parameters['title'] = $newLabel;
        }
		
		public function phoneLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['areaCode'] . " / " . $record['callingNumber'];
			$parameters['title'] = $newLabel;
		}
		
		public function sectionPositionLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['label'] . " (" . $record['label_short'] . ")";
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
            $sectionPosition = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_sectionposition", $record['section_position']);
            $newLabel = $person['lastname'] . ", " . $person['firstname'] . " (" . $sectionPositionGroup['label'] . " - " . $sectionPosition['label'] . ")";
			$parameters['title'] = $newLabel;
		}
		
	}
	
?>