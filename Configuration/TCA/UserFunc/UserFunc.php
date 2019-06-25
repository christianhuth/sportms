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
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_officialjob", $record['official_job']);
			$newLabel = $officialJob['label'] . ": " . $person['firstname'] . " " . $person['lastname'];
			$parameters['title'] = $newLabel;
		}

		public function clubSectionOfficialLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_officialjob", $record['official_job']);
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
			$officialJob = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_officialjob", $record['official_job']);
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