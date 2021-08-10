<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * GameReferee
     */
    class GameReferee extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Game
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $game;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\PersonProfile
         */
        protected $personProfile;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\RefereeJob
         */
        protected $refereeJob;
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Game
         */
        public function getGame()
        {
            return $this->game;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Game $game
         */
        public function setGame(\Balumedien\Sportms\Domain\Model\Game $game)
        {
            $this->game = $game;
        }
        
        /**
         * @return PersonProfile
         */
        public function getPersonProfile(): PersonProfile
        {
            return $this->personProfile;
        }
        
        /**
         * @param PersonProfile $personProfile
         */
        public function setPersonProfile(PersonProfile $personProfile): void
        {
            $this->personProfile = $personProfile;
        }
        
        /**
         * @return RefereeJob
         */
        public function getRefereeJob()
        {
            return $this->refereeJob;
        }
        
        /**
         * @param RefereeJob $refereeJob
         */
        public function setRefereeJob($refereeJob)
        {
            $this->refereeJob = $refereeJob;
        }
        
    }