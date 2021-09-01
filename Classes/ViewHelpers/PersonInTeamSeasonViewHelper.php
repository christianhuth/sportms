<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\ViewHelpers;
    
    use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

    class PersonInTeamSeasonViewHelper extends AbstractConditionViewHelper
    {
        
        /**
         * @param array $arguments
         * @return bool
         */
        protected static function evaluateCondition($arguments = null)
        {
            $personProfile = $arguments['personProfile'];
            $teamSeason = $arguments['teamSeason'];
            
            $personProfilesInTeamSeasonSquad = [];
            $teamSeasonSquadMembers = $teamSeason->getTeamSeasonSquadMembers();
            
            foreach ($teamSeasonSquadMembers as $teamSeasonSquadMember) {
                $personProfilesInTeamSeasonSquad[] = $teamSeasonSquadMember->getPersonProfile();
            }
            
            if (in_array($personProfile, $personProfilesInTeamSeasonSquad)) {
                return true;
            } else {
                return false;
            }
        }
        
        public function initializeArguments()
        {
            parent::initializeArguments();
            $this->registerArgument('teamSeason', 'ChristianKnell\Sportms\Domain\Model\TeamSeason',
                'View helper haystack. Needs to be a TeamSeason', true);
            $this->registerArgument('personProfile', 'ChristianKnell\Sportms\Domain\Model\PersonProfile',
                'View helper needle. Needs to be a PersonProfile!', true);
        }
        
    }