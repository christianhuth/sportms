<?php
	
	namespace Balumedien\Sportms\ViewHelpers;
	
	use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;
	
	class PersonInTeamSeasonViewHelper extends AbstractConditionViewHelper {
		
		/**
		 * @param array $arguments
		 * @return bool
		 */
		protected static function evaluateCondition($arguments = NULL) {
			$person = $arguments['person'];
			$teamSeason = $arguments['teamSeason'];
			
			$personsInTeamSeasonSquad = [];
			$teamSeasonSquadMembers = $teamSeason->getTeamSeasonSquadMembers();
			
			foreach($teamSeasonSquadMembers as $teamSeasonSquadMember) {
				$personsInTeamSeasonSquad[] = $teamSeasonSquadMember->getPerson();
			}
			
			if(in_array($person, $personsInTeamSeasonSquad)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('teamSeason', 'Balumedien\Sportms\Domain\Model\TeamSeason', 'View helper haystack. Needs to be a TeamSeason', TRUE);
			$this->registerArgument('person', 'Balumedien\Sportms\Domain\Model\Person', 'View helper needle. Needs to be a Person!', TRUE);
		}
		
	}