<?php
    
    namespace Balumedien\Sportms\ViewHelpers\Person;
    
    use Balumedien\Sportms\Domain\Model\PersonProfile;

    class ProfileViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
    {
        
        /**
         * @return void
         */
        public function initializeArguments()
        {
            parent::initializeArguments();
            $this->registerArgument('person', 'Balumedien\Sportms\Domain\Model\Person',
                'the person we should be searching the profile for', true);
            $this->registerArgument('profileType', 'string', 'the desired profile type', true);
            $this->registerArgument('sport', 'Balumedien\Sportms\Domain\Model\Sport', 'the desired sport', false);
        }
        
        /**
         * @return PersonProfile|null
         * @throws \Exception
         */
        public function render(): ?PersonProfile
        {
            $person = $this->arguments['person'];
            $profileType = $this->arguments['profileType'];
            $sport = $this->arguments['sport'];
            
            if ($profileType !== "official" && $profileType !== "player" && $profileType !== "referee") {
                # TODO: proper way to handle this exception
                die("wrong profileType given");
            }
            $possibleProfiles = [];
            $possibleProfiles['byProfileType'] = [];
            $possibleProfiles['bySport'] = [];
            foreach ($person->getPersonProfiles() as $personProfile) {
                if ($personProfile->getProfileType() === $profileType && $personProfile->getSport() === $sport) {
                    return $personProfile;
                }
                if ($personProfile->getProfileType() === $profileType) {
                    $possibleProfiles['byProfileType'][] = $personProfile;
                }
                if ($personProfile->getSport() === $sport) {
                    $possibleProfiles['bySport'][] = $personProfile;
                }
            }
            if (!is_null($possibleProfiles['byProfileType'])) {
                return $possibleProfiles['byProfileType'][0];
            } else {
                if (!is_null($possibleProfiles['bySport'])) {
                    return $possibleProfiles['bySport'][0];
                } else {
                    return null;
                }
            }
        }
        
    }