<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * GameReferee
     */
    class GameReferee extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Game
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $game;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\PersonProfile
         */
        protected $personProfile;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\RefereeJob
         */
        protected $refereeJob;
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\Game
         */
        public function getGame()
        {
            return $this->game;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\Game $game
         */
        public function setGame(\ChristianKnell\Sportms\Domain\Model\Game $game)
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